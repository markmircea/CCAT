<script setup>
import { ref, onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import LazyImage from '@/Components/LazyImage.vue';
import { Link } from '@inertiajs/vue3';

const isIntersecting = ref({});

onMounted(() => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            isIntersecting.value[entry.target.id] = entry.isIntersecting;
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-on-scroll').forEach((el) => {
        observer.observe(el);
    });
});
</script>

<template>
    <AppLayout title="CCAT Cognitive Aptitude Assessments">
        <div class="bg-gradient-to-b from-blue-100 to-white dark:from-gray-900 dark:to-gray-800 min-h-screen">
             <header class="relative overflow-hidden bg-blue-600 dark:bg-blue-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
                    <div class="text-center">
                        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white mb-6 animate-fade-in-up">
                            CCAT Cognitive Aptitude Assessments
                        </h1>
                        <p class="mt-3 max-w-md mx-auto text-xl text-blue-200 sm:text-2xl md:mt-5 md:max-w-3xl animate-fade-in-up">
                            Overview and Practice Tests
                        </p>
                    </div>
                </div>
                <svg class="absolute bottom-0 w-full h-16 text-white dark:text-gray-800" preserveAspectRatio="none" viewBox="0 0 1440 54">
                    <path fill="currentColor" d="M0 54L1440 0v54H0z"></path>
                </svg>
            </header>

            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <nav class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 mb-8 animate-fade-in">
                    <p class="font-semibold mb-2 text-lg text-gray-700 dark:text-gray-300">Table of Contents</p>
                    <ul class="space-y-2">
                        <li v-for="(item, index) in ['definition', 'math-and-logic-test', 'verbal-test', 'spatial-reasoning-test', 'companies-using-ccat', 'practice-with-mconsultingprep', 'faqs']" :key="index">
                            <a :href="`#${item}`" class="text-blue-600 dark:text-blue-400 hover:underline transition-colors duration-200 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                {{ item.split('-').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ') }}
                            </a>
                        </li>
                    </ul>
                </nav>

                <section id="definition" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting['definition'] }">
                    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">What are CCAT assessments?</h2>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong class="text-gray-900 dark:text-white">CCAT – Criteria Cognitive Aptitude Test</strong> measures candidates' learning, critical thinking, and problem-solving skills (<strong class="text-gray-900 dark:text-white">50 questions</strong> under a time limit of <strong class="text-gray-900 dark:text-white">15 minutes</strong>). This test has 3 types of questions: <a href="https://mconsultingprep.com/verbal-reasoning-tests-ultimate-guide" class="text-blue-600 dark:text-blue-400 hover:underline"><strong>Verbal</strong></a>, <a href="https://mconsultingprep.com/guide-to-numerical-reasoning-tests" class="text-blue-600 dark:text-blue-400 hover:underline"><strong>Math and Logic</strong></a>, and <a href="https://mconsultingprep.com/what-is-a-spatial-reasoning-test" class="text-blue-600 dark:text-blue-400 hover:underline"><strong>Spatial Reasoning</strong></a>. During the test, English is the only language used, and calculators are NOT allowed. Some leading employers using CCAT in their hiring process include Crossover, Vista Equity, Lambda School, etc.</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300">CCAT is published by <a href="https://www.criteriacorp.com/" class="text-blue-600 dark:text-blue-400 hover:underline">Criteria Corp</a>, which is a reliable assessment provider in Los Angeles. Since its establishment in 2016, the company has provided more than 25 million tests across 60 countries.</p>
                        <LazyImage src="/storage/img/1669372150373_ccat_assessments_2_1500_x751.png" alt="CCAT Assessments Overview" class="rounded-lg shadow-md mx-auto mb-4" />
                    </div>
                </section>

                <section id="math-and-logic-test" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting['math-and-logic-test'] }">
                    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">CCAT math & logic test</h2>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                        <p class="mb-4 text-gray-700 dark:text-gray-300">CCAT math & logic test usually includes <strong>22 questions</strong>, assessing candidates' fundamental <strong>algebra skills and the ability to solve word problems</strong>. The questions may involve proportions, averages, and percentages, graphs, tables, ratios, etc. NO calculators are allowed. You need to apply <a href="https://www.youtube.com/watch?v=_bktsTc4PLI" class="text-blue-600 dark:text-blue-400 hover:underline">mental math skills</a> to pass the test.</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300">Here are some math & logic from the real CCAT:</p>
                        <LazyImage src="/storage/img/1669372150373_ccat_assessments_2_1500_x751.png" alt="CCAT Math & Logic Example 1" class="rounded-lg shadow-md mx-auto mb-4" />
                        <p class="text-center italic mb-4 text-gray-700 dark:text-gray-300">Source: CCAT</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Answer: </strong>120</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Explanation: </strong>The number of customers the cashier can ring up in eight hours: 15 x 8 = 120.</p>
                        <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-lg my-4">
                            <p class="text-gray-700 dark:text-gray-300">This type of question is called Word Problem. Word Problem questions are indeed calculation questions with short contexts, which involve addition, subtraction, division, and multiplication. Within our <a href="https://mconsultingprep.com/numerical-reasoning-test/" class="text-blue-600 dark:text-blue-400 hover:underline">Numerical Reasoning Test Pack</a>, we provide a range of Word Problem questions (easy to hard levels). There are no other ways to improve your speed except by practicing.</p>
                        </div>
                        <LazyImage src="/storage/img/1669372162795_ccat_assessments3_1500_x938.png" alt="CCAT Math & Logic Example 2" class="rounded-lg shadow-md mx-auto mb-4" />
                        <p class="text-center italic mb-4 text-gray-700 dark:text-gray-300">Source: CCAT</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Answer:</strong> E</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Explanation: </strong>The pattern should be an upside-down triangle followed by a triangle. So, the question mark should be replaced by an upside-down triangle.</p>
                    </div>
                </section>

                <section id="verbal-test" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting['verbal-test'] }">
                    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">CCAT verbal test</h2>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Read more:</strong> <a href="https://mconsultingprep.com/verbal-reasoning-tests-ultimate-guide" class="text-blue-600 dark:text-blue-400 hover:underline">What is a Verbal Reasoning Test?</a></p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300">CCAT verbal test typically contains <strong>17 questions</strong>, challenging candidates to <strong>identify a word's correct meaning, recognize relationships between words, and select appropriate words in specific contexts.</strong></p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300">For both native and non-native English speakers, it's necessary to get familiar with different question types in CCAT. If English is not your first language, your English should be properly improved to pass this verbal test.</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300">Here are some verbal questions from the real CCAT:</p>
                        <LazyImage src="/storage/img/1669372162795_ccat_assessments4_1500_x938.png" alt="CCAT Verbal Example 1" class="rounded-lg shadow-md mx-auto mb-4" />
                        <p class="text-center italic mb-4">Source: CCAT</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Answer:</strong> ESTEEMED is to SEEDY</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Explanation:</strong> The relationship between DELUSIONAL (not based in reality) and GROUNDED (based in reality) is antonym because the two words have opposite meanings. So we need to find a pair of words that also has opposite meanings, and that is ESTEEMED (respected and admired) is to SEEDY (bad and terrible).</p>
                        <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-lg my-4">
                            <p class="text-gray-700 dark:text-gray-300">This type of question is also an analogy question requiring you to identify the right relationship (bridge) between words. Keeping practice will help you spot the correct word relationships faster. Luckily, our <a href="https://test.mconsultingprep.com/test-suites/testing/ba0d6ff2-b86b-469f-8514-56bc22ac081c" class="text-blue-600 dark:text-blue-400 hover:underline">free verbal practice test</a> does include this question type – let's give it a try!</p>
                        </div>
                        <LazyImage src="/storage/img/1669372162795_ccat_assessments5_1500_x938.png" alt="CCAT Verbal Example 2" class="rounded-lg shadow-md mx-auto mb-4" />
                        <p class="text-center italic mb-4 text-gray-700 dark:text-gray-300">Source: CCAT</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Answer:</strong> <em>repulsion</em></p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Explanation: </strong><em>"repulsion"</em> means pushing each other away, while <em>"allure"</em> means being attractive.</p>
                        <LazyImage src="/storage/img/1669372162795_ccat_assessments6_1500_x938.png" alt="CCAT Verbal Example 3" class="rounded-lg shadow-md mx-auto mb-4" />
                        <p class="text-center italic mb-4">Source: CCAT</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Answer: </strong>supercilious .. insolence</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Explanation: </strong>"supercilious" means showing other people that you're better than them; "insolence" means showing a lack of respect for other people.</p>
                    </div>
                </section>

                <section id="spatial-reasoning-test" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting['spatial-reasoning-test'] }">
                    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">CCAT spatial reasoning test</h2>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                        <p class="mb-4 text-gray-700 dark:text-gray-300">CCAT spatial tests typically include <strong>11 questions</strong>, requiring you to <strong>flip or rotate objects in your head, spot patterns and find the odd one out</strong>. These spatial reasoning questions measure your innate aptitude and the ability to learn, solve problems, and leverage new information properly.</p>
                        <LazyImage src="/storage/img/1669372162795_ccat_assessments7_1500_x938.png" alt="CCAT Spatial Reasoning Example" class="rounded-lg shadow-md mx-auto mb-4" />
                        <p class="text-center italic mb-4 text-gray-700 dark:text-gray-300">Source: CCAT</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Answer:</strong> C</p>
                        <p class="mb-4 text-gray-700 dark:text-gray-300"><strong>Explanation:</strong> All four options A, B, D, and E have a quadrangle in the center. Only option C contains a square in its center. So, the one that does not belong is option C.</p>
                    </div>
                </section>

                <section id="companies-using-ccat" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting['companies-using-ccat'] }">
                    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">Which companies use CCAT assessments?</h2>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                        <p class="mb-4 text-gray-700 dark:text-gray-300">CCAT assessments are trusted by hundreds of employers around the world and used for high-level positions in technology, real estate, banking, and even nursing.</p>
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

                <section id="practice-with-mconsultingprep" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting['practice-with-mconsultingprep'] }">
                    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">Practice CCAT assessments with MConsultingPrep</h2>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-gray-700 dark:text-gray-300">
                        <p class="mb-4">After months of research on popular test providers (including Criteria Corp), MConsultingPrep has designed an <a href="https://mconsultingprep.com/cr/mcp/courses/bundle/aptitude-test-package" class="text-blue-600 dark:text-blue-400 hover:underline">aptitude test package</a>. Our unique selling point is that these practice questions are comparatively difficult compared to other products on the market. Plus, you'll get the A to Z approach to numerical, verbal and logical reasoning tests with our in-depth study guides into specific assessments.</p>
                        <p class="mb-4">What's more, we keep updating the number of questions – you pay once, you'll have lifetime access to the question bank. MConsultingPrep aims to help candidates get through any aptitude tests.</p>
                        <p class="mb-4">We do offer some <a href="/free-practice-test" class="text-blue-600 dark:text-blue-400 hover:underline">free questions</a> so that you get what our tests look like.</p>
                    </div>
                </section>

                <section id="faqs" class="mb-12 animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting['faqs'] }">
                    <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">FAQs</h2>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-gray-700 dark:text-gray-300">
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-semibold mb-2 text-gray-700 dark:text-gray-300">1. How are CCAT assessments scored?</h3>
                                <p>In CCATs, each correct answer gets you one point. When the test is completed, your employers will receive your raw score – the number of questions you answer correctly (x/50) and your percentile – how your results compared with those who take the test (eg: 70%). If you score 70%, your result is better than 70% of people who have done the test.</p>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">2. How can I answer all 50 questions in the CCAT assessment?</h3>
                                <LazyImage src="/storage/img/1669372162795_ccat_assessments8_1500_x938.png" alt="CCAT Assessment Timing" class="rounded-lg shadow-md mx-auto mb-4" />
                                <p>15 minutes for 50 questions mean that you have less than 20 seconds to answer a question. Pretty challenging, huh? However, don't you worry too much.</p>
                                <p>According to Criteria Corp, <strong>less than 1% of test takers</strong> answer all 50 questions and candidates get 24 questions right on average.</p>
                                <p>It's worth noting that CCAT assessments have no penalty for wrong answers. As under heavy time constraints, you're better off spending 30s for one question. If you cannot solve one, just make a guess and move on.</p>
                                <p>Moreover, Criteria Corp does suggest raw score ranges based on specific positions such as Analyst, Administrative Assistant, Computer Programmer, Accounting/ Finance, etc. Find more information below.</p>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">3. Are CCAT and UCAT the same?</h3>
                                <p>The UCAT (Universal Cognitive Aptitude Test) is a shortened version of the CCAT assessment, which is also provided by Criteria Corp. It covers math and logic, spatial/ abstract reasoning, not including verbal.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="free-practice-test" class="animate-on-scroll" :class="{ 'animate-fade-in-up': isIntersecting['free-practice-test'] }">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow-lg p-8 text-white">
                        <h2 class="text-3xl font-bold mb-4">Try our Free Practice Test</h2>
                        <p class="mb-4">Want to experience what a CCAT is like before committing to a full test? We offer a free practice test that simulates the CCAT experience. This shorter version includes 25 questions to be completed in 7:30 minutes, covering verbal, math and logic, and spatial reasoning questions.</p>
                        <ul class="list-disc list-inside mb-6 space-y-2">
                            <li>25 questions in 7:30 minutes</li>
                            <li>Covers all CCAT question types</li>
                            <li>No registration required</li>
                            <li>Immediate results and explanations</li>
                        </ul>
                        <Link :href="route('free.practice.test')" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                            Start Free Practice Test
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </Link>
                    </div>
                </section>
            </main>
        </div>
    </AppLayout>
</template>

<style scoped>
.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out;
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

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>