<template>
    <AppLayout title="Full Practice Test">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Full Practice Test
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900">Welcome to the Full Practice Test</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        This section contains a comprehensive practice test covering all areas.
                    </p>
                    <!-- Add more content specific to full practice tests here -->
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    components: {
        AppLayout,
    },
})
</script>
