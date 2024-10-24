<template>
  <section id="upgrade-account" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting }">
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow-xl p-8 text-white overflow-hidden relative">
      <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-yellow-300 rounded-full opacity-20 animate-pulse"></div>
      <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-32 h-32 bg-pink-400 rounded-full opacity-20 animate-pulse"></div>

      <h1 class="text-4xl font-bold text-white dark:text-white mb-2">
        <u>Checkout what we offer!</u>
      </h1>

      <p class="mb-6 text-lg">
        Supercharge your CCAT preparation with unlimited lifetime access to all our practice tests and questions!
      </p>

      <ul class="space-y-3 mb-8">
        <li v-for="(feature, index) in features" :key="index" class="flex items-center">
          <svg class="h-5 w-5 text-green-300 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>{{ feature }}</span>
        </li>
      </ul>

      <p class="mb-6 text-xl font-semibold">
        <span class="text-yellow-300">98%</span> OF OUR USERS REPORTED PASSING THEIR EXAMS USING OUR PREP SOLUTION
      </p>

      <p class="mb-4 text-lg">
        LATEST VERSION CCAT <strong class="text-pink-300">{{ currentMonthYear }}</strong> EXAMS!
      </p>

      <p class="mb-8 text-lg font-semibold bg-green-600 p-3 rounded-lg">
        As a bonus, you get a 3-month subscription to <a href="https://easyace.ai">EasyAce.AI</a> PRO membership!
      </p>

      <Link
        :href="route('upgrade.account')"
        class="relative z-10 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-blue-700 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105 group"
      >
        Upgrade Now
        <svg class="ml-2 -mr-1 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </Link>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

const isIntersecting = ref(false);
const currentMonthYear = ref("");

const features = [
 "10 Full Practice tests with timers (500 Questions, Answers and Explanations) from the current CCAT",
"10 Additional Full PDF files with Questions and Answers (500 Questions and Answers)",
"1000+ Verbal practice questions with AI assisted explanations",
"1000+ Math & Logic practice questions with AI assisted explanations",
"1000+ Spatial Reasoning practice questions with AI assisted explanations",
"Detailed Explanations for ALL Questions, (if the answer you selected is incorrect, the AI model will explain to you why its incorrect)",
  "Original Tests",
  "Same Practice Conditions",
  "Weekly updates with new questions",
  "24/7 Support via E-mail or Chat!",
];

onMounted(() => {
  const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];

  const now = new Date();
  const month = monthNames[now.getMonth()];
  const year = now.getFullYear();

  currentMonthYear.value = `${month.toUpperCase()} ${year}`;

  const observer = new IntersectionObserver(
    ([entry]) => {
      isIntersecting.value = entry.isIntersecting;
    },
    { threshold: 0.1 }
  );

  const section = document.getElementById('upgrade-account');
  if (section) {
    observer.observe(section);
  }

  return () => observer.disconnect();
});
</script>

<style scoped>
.animate-fade-in-up {
  animation: fadeInUp 0.6s ease-out;
}

.animate-pulse {
  animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes pulse {
  0%, 100% {
    opacity: 0.2;
  }
  50% {
    opacity: 0.5;
  }
}
</style>
