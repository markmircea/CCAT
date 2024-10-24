<template>
  <section id="practice-with-CCATtest" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting }">
    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">Practice CCAT assessments with CCATtest</h2>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-gray-700 dark:text-gray-300">
      <p class="mb-4">
        After months of research on popular test providers (including Criteria Corp), CCATtest has designed an <a href="https://CCATtest.com/cr/mcp/courses/bundle/aptitude-test-package" class="text-blue-600 dark:text-blue-400 hover:underline">aptitude test package</a>. Our unique selling point is that these practice questions are comparatively difficult compared to other products on the market. Plus, you'll get the A to Z approach to numerical, verbal and logical reasoning tests with our in-depth study guides into specific assessments.
      </p>
      <p class="mb-4">
        What's more, we keep updating the number of questions – you pay once, you'll have lifetime access to the question bank. CCATtest aims to help candidates get through any aptitude tests.
      </p>
      <p class="mb-4">
        We do offer some <a href="/free-practice-test" class="text-blue-600 dark:text-blue-400 hover:underline">free questions</a> so that you get what our tests look like.
      </p>

      <LazyImage
        src="/storage/img/1669372162795_ccat_assessments8_1500_x938.png"
        alt="CCAT Assessment Timing"
        :width="1500"
        :height="938"
        class="rounded-lg shadow-md mx-auto mb-4"
      />
      <p class="text-center italic mb-4 text-gray-700 dark:text-gray-300">Source: CCAT</p>
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

  const section = document.getElementById('practice-with-CCATtest');
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
