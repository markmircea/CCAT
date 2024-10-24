<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import DashboardHeader from '@/Components/DashboardHeader.vue';
import UpgradeAccount from '@/Components/UpgradeAccount.vue';
import LifetimePlan from '@/Components/LifetimePlan.vue';
import Definition from '@/Components/Definition.vue';
import MathLogicTest from '@/Components/MathLogicTest.vue';
import VerbalTest from '@/Components/VerbalTest.vue';
import SpatialReasoningTest from '@/Components/SpatialReasoningTest.vue';
import CompaniesUsingCCAT from '@/Components/CompaniesUsingCCAT.vue';
import PracticeWithCCATtest from '@/Components/PracticeWithCCATtest.vue';
import GetHiredAtCrossover from '@/Components/GetHiredAtCrossover.vue';

import FAQ from '@/Components/FAQ.vue';

const props = defineProps({
    isSubscribed: Boolean
});

const isIntersecting = ref({});
</script>

<template>
    <AppLayout title="CCAT Cognitive Aptitude Assessments">
        <div class="bg-gradient-to-b from-gray-200 to-gray-50 dark:from-gray-900 dark:to-gray-800 min-h-screen">
            <DashboardHeader :isSubscribed="props.isSubscribed" />
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <nav class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 mb-8 animate-fade-in">
                    <p class="font-semibold mb-2 text-lg text-gray-800 dark:text-gray-300">Table of Contents</p>
                    <ul class="space-y-2">
                        <li v-for="(item, index) in ['lifetime-plan','get-hired-at-crossover', 'definition', 'math-and-logic-test', 'verbal-test', 'spatial-reasoning-test', 'companies-using-ccat', 'practice-with-CCATtest', 'FAQ']"
                            :key="index">
                            <a :href="`#${item}`"
                                class="text-blue-600 dark:text-blue-400 hover:underline transition-colors duration-200 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ item.split('-').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')
                                }}
                            </a>
                        </li>
                    </ul>
                </nav>

                <UpgradeAccount v-if="!props.isSubscribed" />
                <LifetimePlan v-if="props.isSubscribed" :subscriptionStartDate="$page.props.auth.user.subscription_started_at" />
                <get-hired-at-crossover/>
                <Definition />
                <MathLogicTest />
                <VerbalTest />
                <SpatialReasoningTest />
                <CompaniesUsingCCAT />
                <PracticeWithCCATtest />

                <section id="FAQ" class="mb-12 animate-on-scroll"
                    :class="{ 'animate-fade-in-up': isIntersecting['faqs'] }">
                    <FAQ />
                </section>

                <section id="free-practice-test" class="animate-on-scroll"
                    :class="{ 'animate-fade-in-up': isIntersecting['free-practice-test'] }">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow-lg p-8 text-white">
                        <h2 class="text-3xl font-bold mb-4">Try our Free Practice Test</h2>
                        <p class="mb-4">Want to experience what a CCAT is like before committing to a full test? We
                            offer a free practice test that simulates the CCAT experience. This shorter version includes
                            25 questions to be completed in 7:30 minutes, covering verbal, math and logic, and spatial
                            reasoning questions.</p>
                        <ul class="list-disc list-inside mb-6 space-y-2">
                            <li>25 questions in 7:30 minutes</li>
                            <li>Covers all CCAT question types</li>
                            <li>No registration required</li>
                            <li>Immediate results and explanations</li>
                        </ul>
                        <Link :href="route('free.practice.test')"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                        Start Free Practice Test
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
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

.group:hover .group-hover\:translate-x-1 {
    transform: translateX(0.25rem);
}

.group {
    transition: background-color 0.3s ease;
}
</style>
