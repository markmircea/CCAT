<template>
  <section id="math-and-logic-test" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting }">
    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">CCAT Math & Logic Test</h2>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        CCAT math & logic test usually includes <strong>22 questions</strong>, assessing candidates' fundamental <strong>algebra skills and the ability to solve word problems</strong>. The questions may involve proportions, averages, and percentages, graphs, tables, ratios, etc. NO calculators are allowed. You need to apply <a href="https://www.youtube.com/watch?v=_bktsTc4PLI" class="text-blue-600 dark:text-blue-400 hover:underline">mental math skills</a> to pass the test.
      </p>

      <h2 id="question-types" class="text-2xl text-gray-800 dark:text-gray-300 white font-semibold mt-6 mb-2">Types of Math and Logic Questions</h2>
      <p class="text-gray-800 dark:text-gray-300">Common types of math and logic test questions include:</p>
      <ul class="list-disc text-gray-800 dark:text-gray-300 list-inside space-y-1">
        <li>Basic Arithmetic</li>
        <li>Algebra</li>
        <li>Word Problems</li>
        <li>Data Interpretation (graphs, tables)</li>
        <li>Pattern Recognition</li>
        <li>Logical Reasoning</li>
      </ul>
      <br>

      <p class="mb-4 text-gray-800 dark:text-gray-300">Here are some math & logic from the real CCAT:</p>
      <LazyImage
        src="/storage/img/1669372150373_ccat_assessments_2_1500_x751.png"
        alt="CCAT Math & Logic Example 1"
        :width="1500"
        :height="751"
        class="rounded-lg shadow-md mx-auto mb-4"
      />
      <p class="text-center italic mb-4 text-gray-800 dark:text-gray-300">Source: CCAT</p>
      <p class="mb-4 text-gray-800 dark:text-gray-300"><strong>Answer: </strong>120</p>
      <p class="mb-4 text-gray-800 dark:text-gray-300"><strong>Explanation: </strong>The number of customers the cashier can ring up in eight hours: 15 x 8 = 120.</p>
      <div class="bg-blue-50 dark:bg-blue-900 p-4 rounded-lg my-4">
        <p class="text-gray-800 dark:text-gray-300">
          This type of question is called Word Problem. Word Problem questions are indeed calculation questions with short contexts, which involve addition, subtraction, division, and multiplication. Within our <a href="https://CCATtest.com/numerical-reasoning-test/" class="text-blue-600 dark:text-blue-400 hover:underline">Numerical Reasoning Test Pack</a>, we provide a range of Word Problem questions (easy to hard levels). There are no other ways to improve your speed except by practicing.
        </p>
      </div>
      <LazyImage
        src="/storage/img/1669372162795_ccat_assessments3_1500_x938.png"
        alt="CCAT Math & Logic Example 2"
        :width="1500"
        :height="938"
        class="rounded-lg shadow-md mx-auto mb-4"
      />
      <p class="text-center italic mb-4 text-gray-800 dark:text-gray-300">Source: CCAT</p>
      <p class="mb-4 text-gray-800 dark:text-gray-300"><strong>Answer:</strong> E</p>
      <p class="mb-4 text-gray-800 dark:text-gray-300"><strong>Explanation: </strong>The pattern should be an upside-down triangle followed by a triangle. So, the question mark should be replaced by an upside-down triangle.</p>
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

  const section = document.getElementById('math-and-logic-test');
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
