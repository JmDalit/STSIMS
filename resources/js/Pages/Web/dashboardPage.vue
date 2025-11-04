<template>
    <Head title="Dashboard" />
    <AuthLayout>
        <div class="mx-auto">
            <h1 class="text-2xl font-bold mb-4">Welcome to the Dashboard</h1>
            <p class="text-gray-700">
                This is your dashboard where you can manage your activities.
            </p>
        </div>
    </AuthLayout>
</template>
<script setup>
import { Head } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/AuthLayout.vue";
</script>
