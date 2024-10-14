<template>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
      <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">Frequently Asked Questions</h2>
      <div class="space-y-4">
        <div v-for="(faq, index) in faqItems" :key="index" class="border-b border-gray-200 dark:border-gray-700">
          <button
            @click="toggleFaq(index)"
            class="flex justify-between items-center w-full py-4 text-left text-lg font-semibold text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 focus:outline-none transition-colors duration-300"
          >
            <span>{{ faq.question }}</span>
            <ChevronDown
              :class="{'transform rotate-180': expandedFaq === index}"
              class="w-6 h-6 text-gray-500 transition-transform duration-300"
            />
          </button>
          <transition
            enter-active-class="transition duration-300 ease-out"
            enter-from-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-200 ease-in"
            leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0"
          >
            <div v-show="expandedFaq === index" class="pb-4 text-gray-600 dark:text-gray-400">
              <p>{{ faq.answer }}</p>
            </div>
          </transition>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import { ChevronDown } from 'lucide-vue-next';

  const expandedFaq = ref(null);

  const faqItems = [
  {
        question: "1. How are CCAT assessments scored?",
        answer: "In CCATs, each correct answer gets you one point. When the test is completed, your employers will receive your raw score – the number of questions you answer correctly (x/50) and your percentile – how your results compared with those who take the test (eg: 70%). If you score 70%, your result is better than 70% of people who have done the test."
    },
    {
        question: "2. How can I answer all 50 questions in the CCAT assessment?",
        answer: "15 minutes for 50 questions mean that you have less than 20 seconds to answer a question. Pretty challenging, huh? However, don't you worry too much. According to Criteria Corp, less than 1% of test takers answer all 50 questions and candidates get 24 questions right on average. It's worth noting that CCAT assessments have no penalty for wrong answers. As under heavy time constraints, you're better off spending 30s for one question. If you cannot solve one, just make a guess and move on. Moreover, Criteria Corp does suggest raw score ranges based on specific positions such as Analyst, Administrative Assistant, Computer Programmer, Accounting/ Finance, etc."
    },
    {
        question: "3. Are CCAT and UCAT the same?",
        answer: "The UCAT (Universal Cognitive Aptitude Test) is a shortened version of the CCAT assessment, which is also provided by Criteria Corp. It covers math and logic, spatial/ abstract reasoning, not including verbal."
    },
    {
        question: "4. What happens if I fail my first CCAT test with Crossover?",
        answer: "You will need to wait 6 months before being able to re-apply and retake the exam."
    },
    {
        question: "5. What study material will I receive?",
        answer: "You will receive access to the 3 individual sections and the 10 Full Practice Tests. Each individual section will allow you to study each of the subsections seperately or all together. (For Example the Verbal portion has subsection: Synonyms and Antonyms, Analogies, Sentence Completion, Reading Comprehension) You will also have access to the full practice tests and a randomization generator that serves up questions randomly."
    },
    {
        question: "6. How is the CCAT structured, what does it look like?",
        answer: "The CCAT is structured into 3 separate groups, Verbal Questions, Math and Logic, Spatial Reasoning. CCAT presents the questions in a certain order, (MATH, SPATIAL, LOGIC, MATH SPATIAL, LOGIC ETC.) by studying our exam you will get used to the type of questions and where they will show up on the test, ultimately increasing your completion time."
    },
    {
        question: "7. What is the UCAT test?",
        answer: "The Universal Cognitive Aptitude Test (UCAT) measures general cognitive aptitude, which includes the ability to solve problems, digest and apply information, learn new skills, and think critically. As a language-independent test, the UCAT does not test verbal ability, making it easily translatable and ideal for international use."
    },
    {
        question: "8. How can I pay?",
        answer: "Payment can be made through PayPal / Stripe with Credit/Debit card, Bitcoin, and IBAN (International Bank Transfer SEPA for EU) contact support for payment other than PayPal"
    },
    {
        question: "9. I used my calculator on the first Crossover CCAT, why can't I use it again?",
        answer: "The first CCAT at Crossover for work was un-proctored. After your initial hiring interviews you will be asked to take the exam again. They will require that you place 2 cameras in your room, one facing your face and one on your phone facing your hands. Using a calculator at this stage would be impossible."
    },
    {
        question: "10. Why should I choose your test prep instead of from another test prep site?",
        answer: "We are previous employees of Crossover so we know exactly what you need to know to get hired. We have taken a good look at our competitions material, none of them are offering what we are. We provide you with the same test that you will be taking to practice on, our competition offers tests that are not made by Crossover's test provider and the questions are not even remotely similar to what you see."
    },
    {
        question: "11. Is my information safe? I don't want to get caught.",
        answer: "We will NEVER release your data to any third party, under any circumstance. You also have the ability to pay via bitcoin."
    }
  ];

  const toggleFaq = (index) => {
    expandedFaq.value = expandedFaq.value === index ? null : index;
  };
  </script>
