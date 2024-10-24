<template>
  <section id="verbal-test" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting }">
    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">CCAT Verbal Test</h2>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        <strong>Read more:</strong> <a href="https://CCATtest.com/verbal-reasoning-tests-ultimate-guide" class="text-blue-600 dark:text-blue-400 hover:underline">What is a Verbal Reasoning Test?</a>
      </p>
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        CCAT verbal test typically contains <strong>17 questions</strong>, challenging candidates to <strong>identify a word's correct meaning, recognize relationships between words, and select appropriate words in specific contexts.</strong>
      </p>
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        For both native and non-native English speakers, it's necessary to get familiar with different question types in CCAT. If English is not your first language, your English should be properly improved to pass this verbal test.
      </p>

      <h2 id="question-types" class="text-2xl text-gray-800 dark:text-gray-300 font-semibold mt-6 mb-2">Types of Verbal Test Questions</h2>
      <p class="text-gray-800 dark:text-gray-300">Common types of verbal test questions include:</p>
      <ul class="list-disc list-inside space-y-1 text-gray-800 dark:text-gray-300">
        <li>Synonyms and Antonyms</li>
        <li>Analogies</li>
        <li>Sentence Completion</li>
        <li>Reading Comprehension</li>
      </ul>
      <br>
      <p class="mb-4 text-gray-800 dark:text-gray-300">Here are some verbal questions from the real CCAT:</p>
      <LazyImage
        src="/storage/img/1669372162795_ccat_assessments4_1500_x938.png"
        alt="CCAT Verbal Example 1"
        :width="1500"
        :height="938"
        class="rounded-lg shadow-md mx-auto mb-4"
      />
      <p class="text-center mb-4 text-gray-800 dark:text-gray-300">Source: CCAT</p>
      <p class="mb-4 text-gray-800 dark:text-gray-300"><strong>Answer:</strong> ESTEEMED is to SEEDY</p>
      <p class="mb-4 text-gray-800 dark:text-gray-300">
        <strong>Explanation:</strong> The relationship between DELUSIONAL (not based in reality) and GROUNDED (based in reality) is antonym because the two words have opposite meanings. So we need to find a pair of words that also has opposite meanings, and that is ESTEEMED (respected and admired) is to SEEDY (bad and terrible).
      </p>
      <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-lg my-4">
        <p class="text-gray-700 dark:text-gray-300">
          This type of question is also an analogy question requiring you to identify the right relationship (bridge) between words. Keeping practice will help you spot the correct word relationships faster. Luckily, our <a href="https://test.CCATtest.com/test-suites/testing/ba0d6ff2-b86b-469f-8514-56bc22ac081c" class="text-blue-600 dark:text-blue-400 hover:underline">free verbal practice test</a> does include this question type – let's give it a try!
        </p>
      </div>
      <LazyImage
        src="/storage/img/1669372162795_ccat_assessments5_1500_x938.png"
        alt="CCAT Verbal Example 2"
        :width="1500"
        :height="938"
        class="rounded-lg shadow-md mx-auto mb-4"
      />
      <p class="text-center italic mb-4 text-gray-700 dark:text-gray-300">Source: CCAT</p>
      <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Answer:</strong> <em>repulsion</em></p>
      <p class="mb-4 text-gray-700 dark:text-gray-300">
        <strong>Explanation:</strong> <em>"repulsion"</em> means pushing each other away, while <em>"allure"</em> means being attractive.
      </p>
      <LazyImage
        src="/storage/img/1669372162795_ccat_assessments6_1500_x938.png"
        alt="CCAT Verbal Example 3"
        :width="1500"
        :height="938"
        class="rounded-lg shadow-md mx-auto mb-4"
      />
      <p class="text-center italic mb-4">Source: CCAT</p>
      <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Answer: </strong>supercilious .. insolence</p>
      <p class="mb-4 text-gray-700 dark:text-gray-300">
        <strong>Explanation: </strong>"supercilious" means showing other people that you're better than them; "insolence" means showing a lack of respect for other people.
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

  const section = document.getElementById('verbal-test');
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
