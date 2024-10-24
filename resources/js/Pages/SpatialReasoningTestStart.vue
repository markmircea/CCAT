<script setup>
import { ref, onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Question from '@/Components/Question.vue';
import axios from 'axios';

const testStarted = ref(false);
const currentQuestion = ref(null);
const userAnswer = ref(null);
const explanation = ref('');
const loadingQuestion = ref(false);
const loadingExplanation = ref(false);
const error = ref('');
const answerSubmitted = ref(false);
const previousQuestions = ref([]);

const startTest = () => {
  testStarted.value = true;
  fetchNextQuestion();
};

const fetchNextQuestion = async () => {
  loadingQuestion.value = true;
  answerSubmitted.value = false;
  userAnswer.value = null;
  explanation.value = '';
  error.value = '';
  currentQuestion.value = null; // Clear current question while loading new one

  try {
    const response = await axios.post('/api/generate-question', {
      prompt: `Generate a verbal Spatial reasoning question with multiple choice answers a, b, c, d similar to the CCAT spatial reasoning portion do NOT reference any sort of text or passage, include ALL of the information in the question. I want you to randomize the questions and categories as much as possible, never start with the same one that the user may have seen before from a previous prompt. Format the response as JSON with fields: question, options (array), correctAnswer. ensure this question is different from the following previously asked questions: ${JSON.stringify(previousQuestions.value)}`
    });

    const data = response.data;
    if (!data.choices?.[0]?.message?.content) {
      throw new Error('Invalid response format');
    }

    const questionData = JSON.parse(data.choices[0].message.content);
    if (!questionData.question || !Array.isArray(questionData.options) || !questionData.correctAnswer) {
      throw new Error('Invalid question data format');
    }

    currentQuestion.value = {
      text: questionData.question,
      options: questionData.options,
      correctAnswer: questionData.correctAnswer
    };
    previousQuestions.value.push(questionData.question);
  } catch (error) {
    console.error('Error fetching question:', error);
    error.value = error.response?.data?.error || error.message || 'Error fetching question. Please try again.';
  }
  loadingQuestion.value = false;
};

const submitAnswer = async (answer) => {
  userAnswer.value = answer;
  answerSubmitted.value = true;
  loadingExplanation.value = true;
  error.value = '';

  try {
    const response = await axios.post('/api/generate-explanation', {
      prompt: `The question was: "${currentQuestion.value.text}". The correct answer is "${currentQuestion.value.correctAnswer}". The user answered "${answer}". The options were: ${JSON.stringify(currentQuestion.value.options)}. Provide a brief explanation of why the correct answer is correct and, if the user's answer is incorrect, why it's incorrect.`
    });

    const data = response.data;
    if (!data.choices?.[0]?.message?.content) {
      throw new Error('Invalid response format');
    }

    explanation.value = data.choices[0].message.content;
    if (explanation.value.includes('Please provide the answer choices')) {
      explanation.value = `I apologize, but I couldn't generate a proper explanation. Here's what we know:\n\n` +
                         `Your answer: ${answer}\n` +
                         `Correct answer: ${currentQuestion.value.correctAnswer}\n\n` +
                         `Please compare your answer with the correct one and review the question.`;
    }
  } catch (error) {
    console.error('Error fetching explanation:', error);
    error.value = error.response?.data?.error || error.message || 'Error fetching explanation. Please try again.';
    explanation.value = '';
  }
  loadingExplanation.value = false;
};
</script>

<template>
  <AppLayout title="Spatial Reasoning Practice Test">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Spatial Reasoning Practice Test
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
          <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
            <!-- Start Screen -->
            <div v-if="!testStarted" class="text-center">
              <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Spatial Reasoning Practice Test</h1>
              <p class="mb-4 text-gray-600 dark:text-gray-400">This practice test will help you prepare for the Spatial Reasoning portion of the CCAT. Questions will be generated dynamically, and you can practice as many as you like.</p>
              <button @click="startTest" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Start Practice
              </button>
            </div>

            <!-- Test Content -->
            <div v-else class="text-center">
              <!-- Loading Initial Question -->
              <div v-if="loadingQuestion && !currentQuestion" class="my-4 flex flex-col items-center">
                <p class="text-gray-600 dark:text-gray-400">Loading question...</p>
                <div class="loader"></div>
              </div>

              <!-- Error State -->
              <div v-if="error" class="my-4 text-red-600">
                {{ error }}
              </div>

              <!-- Question and Answer Section -->
              <div v-if="currentQuestion">
                <!-- Question Component -->
                <div class="mb-6">
                  <Question
                    :question="currentQuestion"
                    @answer-submitted="submitAnswer"
                    :disabled="answerSubmitted"
                  />
                </div>

                <!-- Loading Explanation -->
                <div v-if="loadingExplanation" class="my-4 flex flex-col items-center">
                  <p class="text-gray-600 dark:text-gray-400">Loading explanation...</p>
                  <div class="loader"></div>
                </div>

                <!-- Answer Results -->
                <div v-if="answerSubmitted && !loadingExplanation" class="mt-4">
                  <p class="text-gray-900 dark:text-gray-100">Your answer: {{ userAnswer }}</p>
                  <p class="text-gray-900 dark:text-gray-100">Correct answer: {{ currentQuestion.correctAnswer }}</p>
                  <div class="mt-2 text-gray-600 dark:text-gray-400">
                    <strong>Explanation:</strong>
                    <p>{{ explanation }}</p>
                  </div>
                  <button
                    @click="fetchNextQuestion"
                    class="mt-6 w-full inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-150"
                  >
                    Next Question
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style>
.loader {
  width: 50px;
  aspect-ratio: 1;
  display: grid;
  border-radius: 50%;
  background: conic-gradient(#25b09b 25%,#f03355 0 50%,#514b82 0 75%,#ffa516 0);
  animation: l22 2s infinite linear;
}
.loader::before,
.loader::after {
   content: "";
   grid-area: 1/1;
   margin: 15%;
   border-radius: 50%;
   background: inherit;
   animation: inherit;
}
.loader::after {
   margin: 25%;
   animation-duration: 3s;
}
@keyframes l22 {
  100% {transform: rotate(1turn)}
}
</style>
