<template>
    <AppLayout title="Upgrade Account">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Upgrade Account
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                            Upgrade to Lifetime Access
                        </h1>

                        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                            Upgrade your account to get lifetime access to:
                        </p>

                        <ul class="mt-4 list-disc list-inside text-gray-500 dark:text-gray-400">
                            <li>10 Full Practice tests (500 Questions)</li>
                            <li>380 Verbal practice questions</li>
                            <li>326 Math & Logic practice questions</li>
                            <li>260 Spatial Reasoning practice questions</li>
                        </ul>

                        <p class="mt-4 text-gray-500 dark:text-gray-400">
                            More practice questions are added weekly.
                        </p>

                        <div class="mt-8">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    paypalClientId: String,
});

const form = useForm({
    paypal_order_id: null,
});

const initPayPalButton = () => {
    paypal.Buttons({
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '99.99' // Set your price here
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                form.paypal_order_id = orderData.id;
                form.post(route('upgrade.account.process'));
            });
        }
    }).render('#paypal-button-container');
}

onMounted(() => {
    const script = document.createElement('script');
    script.src = `https://www.paypal.com/sdk/js?client-id=${props.paypalClientId}`;
    script.addEventListener('load', initPayPalButton);
    document.body.appendChild(script);
});
</script>