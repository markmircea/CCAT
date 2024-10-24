<template>
  <section id="spatial-reasoning-test" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting }">
    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">CCAT Spatial Reasoning Test</h2>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
      <p class="mb-4 text-gray-700 dark:text-gray-300">
        CCAT spatial tests typically include <strong>11 questions</strong>, requiring you to <strong>flip or rotate objects in your head, spot patterns and find the odd one out</strong>. These spatial reasoning questions measure your innate aptitude and the ability to learn, solve problems, and leverage new information properly.
      </p>

      <h2 id="question-types" class="text-2xl text-gray-700 dark:text-gray-300 font-semibold mt-6 mb-2">Types of Spatial Reasoning Questions</h2>
      <p class="text-gray-700 dark:text-gray-300">Common types of spatial reasoning test questions include:</p>
      <ul class="list-disc text-gray-700 dark:text-gray-300 list-inside space-y-1">
        <li>Mental Rotation</li>
        <li>Mirror Images</li>
        <li>Paper Folding</li>
        <li>Pattern Recognition</li>
        <li>Spatial Visualization</li>
        <li>Block Counting</li>
      </ul>
      <br>
      <LazyImage
        src="/storage/img/1669372162795_ccat_assessments7_1500_x938.png"
        alt="CCAT Spatial Reasoning Example"
        :width="1500"
        :height="938"
        class="rounded-lg shadow-md mx-auto mb-4"
      />
      <p class="text-center italic mb-4 text-gray-700 dark:text-gray-300">Source: CCAT</p>
      <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Answer:</strong> C</p>
      <p class="mb-4 text-gray-700 dark:text-gray-300">
        <strong>Explanation:</strong> All four options A, B, D, and E have a quadrangle in the center. Only option C contains a square in its center. So, the one that does not belong is option C.
      </p>
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

  const section = document.getElementById('spatial-reasoning-test');
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
