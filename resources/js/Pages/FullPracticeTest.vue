<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import LazyImage from '@/Components/LazyImage.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout title="Full Practice Test">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Full Practice Test: Comprehensive Assessment
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-3xl font-bold mb-4">Full Practice Test: Comprehensive Assessment</h1>
                        <hr class="mb-4">
                        <div class="space-y-4">
                            <p>Welcome to the Full Practice Test. This comprehensive assessment covers all areas of the CCAT, including verbal reasoning, math and logic, and spatial reasoning. It's designed to give you a complete practice experience similar to the actual test.</p>

                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="font-semibold mb-2">Table of Contents</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li><a href="#overview" class="text-blue-600 dark:text-blue-400 hover:underline">Test Overview</a></li>
                                    <li><a href="#structure" class="text-blue-600 dark:text-blue-400 hover:underline">Test Structure</a></li>
                                    <li><a href="#instructions" class="text-blue-600 dark:text-blue-400 hover:underline">Test Instructions</a></li>
                                    <li><a href="#tips" class="text-blue-600 dark:text-blue-400 hover:underline">Tips for Taking the Full Practice Test</a></li>
                                    <li><a href="#start-test" class="text-blue-600 dark:text-blue-400 hover:underline">Start the Test</a></li>
                                </ul>
                            </div>

                            <h2 id="overview" class="text-2xl font-semibold mt-6 mb-2">Test Overview</h2>
                            <p>This Full Practice Test mirrors the structure and difficulty of the actual CCAT. It includes questions from all three main areas: Verbal, Math and Logic, and Spatial Reasoning. The test is timed and scored, providing you with a realistic assessment of your preparedness.</p>

                            <h2 id="structure" class="text-2xl font-semibold mt-6 mb-2">Test Structure</h2>
                            <ul class="list-disc list-inside space-y-1">
                                <li>Total Questions: 50</li>
                                <li>Time Limit: 15 minutes</li>
                                <li>Question Types: Verbal, Math and Logic, Spatial Reasoning</li>
                                <li>Scoring: One point per correct answer, no penalty for wrong answers</li>
                            </ul>

                            <h2 id="instructions" class="text-2xl font-semibold mt-6 mb-2">Test Instructions</h2>
                            <ol class="list-decimal list-inside space-y-1">
                                <li>Read each question carefully before answering.</li>
                                <li>You have 15 minutes to complete all 50 questions.</li>
                                <li>You can skip questions and return to them later if time allows.</li>
                                <li>Guess if you're unsure - there's no penalty for wrong answers.</li>
                                <li>Your score will be displayed immediately after completing the test.</li>
                            </ol>

                            <h2 id="tips" class="text-2xl font-semibold mt-6 mb-2">Tips for Taking the Full Practice Test</h2>
                            <ul class="list-disc list-inside space-y-1">
                                <li>Find a quiet place where you won't be interrupted.</li>
                                <li>Use a timer to keep track of your 15 minutes.</li>
                                <li>Answer easier questions first to maximize your score.</li>
                                <li>Practice your pacing - aim to spend no more than 18 seconds per question.</li>
                                <li>Review your answers and analyze your performance after the test.</li>
                            </ul>

                            <h2 id="start-test" class="text-2xl font-semibold mt-6 mb-2">Start the Test</h2>
                            <p>When you're ready to begin, click the button below. Remember, you'll have 15 minutes to complete all 50 questions. Good luck!</p>
<div class="mt-8 flex justify-center">
                            <Link :href="route('full-practice-test-start')" class="mt-4 px-4 py-2  bg-blue-500 text-white rounded hover:bg-blue-700 transition duration-300 inline-block">
                                Start Full Practice Test
                            </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.content-image {
    max-width: 80%;
    height: auto;
    margin: 1rem auto;
    display: block;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
