<template>
  <section id="definition" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting }">
    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">What are CCAT assessments?</h2>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        <strong class="text-gray-800 dark:text-white">CCAT – Criteria Cognitive Aptitude Test</strong>
        measures candidates' learning, critical thinking, and problem-solving skills (<strong class="text-gray-900 dark:text-white">50 questions</strong> under a time limit of
        <strong class="text-gray-900 dark:text-white">15 minutes</strong>). This test has 3 types of questions:
        <a href="https://CCATtest.com/verbal-reasoning-tests-ultimate-guide" class="text-blue-600 dark:text-blue-400 hover:underline"><strong>Verbal</strong></a>,
        <a href="https://CCATtest.com/guide-to-numerical-reasoning-tests" class="text-blue-600 dark:text-blue-400 hover:underline"><strong>Math and Logic</strong></a>, and
        <a href="https://CCATtest.com/what-is-a-spatial-reasoning-test" class="text-blue-600 dark:text-blue-400 hover:underline"><strong>Spatial Reasoning</strong></a>.
        During the test, English is the only language used, and calculators are NOT allowed. Some leading employers using CCAT in their hiring process include Crossover, Vista Equity, Lambda School, etc.
      </p>
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        CCAT is published by <a href="https://www.criteriacorp.com/" class="text-blue-600 dark:text-blue-400 hover:underline">Criteria Corp</a>, which is a reliable assessment provider in Los Angeles. Since its establishment in 2016, the company has provided more than 25 million tests across 60 countries.
      </p>
      <LazyImage
        src="/storage/img/1669372150373_ccat_assessments_2_1500_x751.png"
        alt="CCAT Math & Logic Example 1"
        :width="1500"
        :height="751"
        class="rounded-lg shadow-md mx-auto mb-4"
      />
      <p class="text-center italic mb-4 text-gray-800 dark:text-gray-300">Source: CCAT</p>
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        We will provide you with the tools you need to study and pass the exam! To get hired at Crossover for Work you need to score in the 85 percentile or top 15%. (MINIMUM 35 / 50 CORRECT)
      </p>
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        Signing up for our paid exam will prepare you for ALL the questions on the test, make a small investment today for a greater future tomorrow.
      </p>
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        You will gain access to 10 FULL PRACTICE TESTS, as well as thousands of additional questions from each question category (Math/Logic, Verbal, Spatial). The access is a lifetime membership. You will be able to take the 50 question test as many times as you want, unlimited access, each time the test will provide you with different questions of the same type just like what you will experience on crossover.
      </p>
      <LazyImage
        src="/storage/img/crossoversteps.png"
        alt="Crossover Steps"
        class="rounded-lg shadow-md mx-auto mb-4"
      />
      <p class="text-center italic mb-4 text-gray-800 dark:text-gray-300">Source: CCAT</p>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import LazyImage from './LazyImage.vue';

const isIntersecting = ref(false);

onMounted(() => {
  const observer = new IntersectionObserver(
    ([entry]) => {
      isIntersecting.value = entry.isIntersecting;
    },
    { threshold: 0.1 }
  );

  const section = document.getElementById('definition');
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
</style>
