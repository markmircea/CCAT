<template>
  <section id="companies-using-ccat" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting }">
    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">Which companies use CCAT assessments?</h2>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
      <p class="mb-4 text-gray-700 dark:text-gray-300">
        CCAT assessments are trusted by hundreds of employers around the world and used for high-level positions in technology, real estate, banking, and even nursing.
      </p>
      <ul class="list-disc list-inside space-y-1 text-gray-700 dark:text-gray-300">
        <li>Crossover</li>
        <li>Lambda School</li>
        <li>Equity Vista</li>
        <li>Hirebridge</li>
        <li>EAB</li>
        <li>Cvent</li>
        <li>Apteam</li>
        <li>Finastra</li>
        <li>Tibco</li>
        <li>Powerschool</li>
        <li>Infoblox</li>
        <li>ICIMS/ Mindbody</li>
        <li>Smuckers</li>
        <li>Beachbody</li>
      </ul>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const isIntersecting = ref(false);

onMounted(() => {
  const observer = new IntersectionObserver(
    ([entry]) => {
      isIntersecting.value = entry.isIntersecting;
    },
    { threshold: 0.1 }
  );

  const section = document.getElementById('companies-using-ccat');
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
