<template>
    <div class="flex-1">
        <div class="text-2xl font-semibold">{{ title }}</div>
        <div class="text-sm text-gray-500 mt-1">
            {{ description }}
        </div>
    </div>
</template>

<script setup>
defineProps({
    title: {
        type: String,
        default: null,
    },
    description: {
        type: String,
        default: null,
    },
});
</script>
