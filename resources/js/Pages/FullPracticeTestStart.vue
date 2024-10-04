<script setup>
import { ref, computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Timer from '@/Components/Timer.vue';
import Question from '@/Components/Question.vue';

const testStarted = ref(false);
const currentQuestionIndex = ref(0);
const userAnswers = ref([]);
const timeRemaining = ref(15 * 60); // 15 minutes in seconds
const testCompleted = ref(false);

const questions = ref([
    // Verbal Questions
    {
        id: 1,
        text: "Choose the word that is most nearly opposite in meaning to 'BENEVOLENT':",
        options: ["Malevolent", "Beneficent", "Munificent", "Magnanimous", "Benign"],
        correctAnswer: "Malevolent"
    },
    {
        id: 2,
        text: "FISH : SCHOOL :: WOLF : ?",
        options: ["Pack", "Herd", "Flock", "Swarm", "Pride"],
        correctAnswer: "Pack"
    },
    {
        id: 3,
        text: "Which word does not belong with the others?",
        options: ["Trombone", "Flute", "Clarinet", "Oboe", "Violin"],
        correctAnswer: "Violin"
    },
    // Math and Logic Questions
    {
        id: 4,
        text: "If a columnist writes 19 articles per month, how many articles does she write in a year?",
        options: ["190", "209", "228", "247", "266"],
        correctAnswer: "228"
    },
    {
        id: 5,
        text: "What is the next number in the sequence: 2, 6, 12, 20, 30, ?",
        options: ["36", "40", "42", "48", "50"],
        correctAnswer: "42"
    },
    {
        id: 6,
        text: "If 5 cats can catch 5 mice in 5 minutes, how long will it take 1 cat to catch 1 mouse?",
        options: ["1 minute", "5 minutes", "25 minutes", "125 minutes", "Not enough information"],
        correctAnswer: "5 minutes"
    },
    // Spatial Reasoning Questions (with images)
    {
        id: 7,
        text: "Which shape would complete the pattern?",
        image: "/storage/img/spatial_pattern.png",
        options: ["Square", "Triangle", "Circle", "Pentagon", "Hexagon"],
        correctAnswer: "Triangle"
    },
    {
        id: 8,
        text: "If a cube is painted red on all sides and then cut into 27 smaller cubes of equal size, how many of the smaller cubes will have paint on exactly two sides?",
        image: "/storage/img/painted_cube.png",
        options: ["4", "8", "12", "16", "24"],
        correctAnswer: "12"
    },
    {
        id: 9,
        text: "Which of the following rotated shapes is identical to the original?",
        image: "/storage/img/rotated_shapes.png",
        options: ["A", "B", "C", "D", "E"],
        correctAnswer: "C"
    },
    // ... Add more questions here to reach a total of 50
]);

const startTest = () => {
    testStarted.value = true;
    shuffleQuestions();
};

const shuffleQuestions = () => {
    for (let i = questions.value.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [questions.value[i], questions.value[j]] = [questions.value[j], questions.value[i]];
    }
};

const submitAnswer = (answer) => {
    userAnswers.value[currentQuestionIndex.value] = answer;
    if (currentQuestionIndex.value < questions.value.length - 1) {
        currentQuestionIndex.value++;
    } else {
        endTest();
    }
};

const endTest = () => {
    testCompleted.value = true;
    timeRemaining.value = 0;
};

const score = computed(() => {
    return userAnswers.value.filter((answer, index) => answer === questions.value[index].correctAnswer).length;
});

const onTimerExpired = () => {
    endTest();
};

const progressPercentage = computed(() => {
    return ((currentQuestionIndex.value + 1) / questions.value.length) * 100;
});
</script>

<template>
    <AppLayout title="Full Practice Test">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Full Practice Test
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div v-if="!testStarted" class="text-left">
                            <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100 text-center">Full Practice Test: 50 Questions</h1>
                            <div class="space-y-4 text-gray-600 dark:text-gray-400">
                                <p class="mb-4">You will have <span class="font-semibold text-gray-800 dark:text-gray-200">15 minutes</span> to complete the test. The assessment measures your aptitude in areas such as critical thinking and problem-solving. This helps you demonstrate your potential to employers, beyond what appears in your resume.</p>
                                
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <h2 class="text-xl font-semibold mb-2 text-gray-800 dark:text-gray-200">Test Instructions:</h2>
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>Answer each question carefully, but do not spend too much time on any one question.</li>
                                        <li>If you can't determine the answer, select your best guess and move on.</li>
                                        <li>You will receive one point for each correct answer. No points are deducted for incorrect answers.</li>
                                        <li>The questions become more difficult as the assessment progresses.</li>
                                        <li>It is unlikely that you will finish all 50 questions before time expires, but do your best to answer as many as you can.</li>
                                    </ul>
                                </div>

                                <div class="bg-yellow-50 dark:bg-yellow-900 p-4 rounded-lg">
                                    
                                    <h2 class="text-xl font-semibold mb-2 text-yellow-800 dark:text-yellow-200">Important Notes:</h2>
                                    <ul class="list-disc list-inside space-y-2 text-yellow-700 dark:text-yellow-300">
                                        <li>You are NOT permitted to use calculators or any other problem-solving device.</li>
                                        <li>Please have a pen and paper with you when you take the assessment.</li>
                                        <li>Ensure your device has a reliable Internet connection.</li>
                                        <li>Leaving the assessment window or switching your browser tab will cause you to be locked out.</li>
                                        <li>Do not click outside of the assessment area once you have started.</li>
                                    </ul>
                                </div>

                                <p class="font-semibold text-gray-800 dark:text-gray-200">Your time will begin as soon as you click the "Begin Test" button.</p>
                            </div>
                            <div class="mt-8 text-center">
                                <button @click="startTest" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Begin Test
                                </button>
                            </div>
                        </div>

                        <div v-else-if="testStarted && !testCompleted" class="text-center">
                            <div class="mb-4">
                                <Timer :initial-time="timeRemaining" @expired="onTimerExpired" />
                            </div>
                            <div class="mb-4">
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-blue-600 h-2.5 rounded-full" :style="{ width: progressPercentage + '%' }"></div>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    Question {{ currentQuestionIndex + 1 }} of {{ questions.length }}
                                </p>
                            </div>
                            <Question 
                                :question="questions[currentQuestionIndex]"
                                :question-number="currentQuestionIndex + 1"
                                :total-questions="questions.length"
                                @answer-submitted="submitAnswer"
                            />
                        </div>

                        <div v-else class="text-center">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Test Completed</h2>
                            <p class="mb-2 text-gray-600 dark:text-gray-400">Your score: {{ score }} / {{ questions.length }}</p>
                            <div v-for="(question, index) in questions" :key="question.id" class="mb-4 text-left">
                                <p class="text-gray-900 dark:text-gray-100"><strong>Question {{ index + 1 }}:</strong> {{ question.text }}</p>
                                <img v-if="question.image" :src="question.image" :alt="'Image for question ' + (index + 1)" class="my-2 max-w-full h-auto">
                                <p class="text-gray-600 dark:text-gray-400">Your answer: {{ userAnswers[index] || 'Not answered' }}</p>
                                <p class="text-gray-600 dark:text-gray-400">Correct answer: {{ question.correctAnswer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
/* Add any additional styles here */
</style>