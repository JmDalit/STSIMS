<template>
    <div class="w-full flex flex-col">
        <div class="flex items-center gap-1">
            <span class="text-sm font-medium">{{ label }}</span>
        </div>

        <InputText
            :type="type"
            :placeholder="placeholder"
            v-model="modelValue"
            fluid
            autocomplete="off"
            :pt="{
                root: {
                    class: [
                        'dark:!bg-gray-700 !text-sm  border dark:!border-gray-700 dark:!text-white',
                        capitalize ? 'capitalize' : '',
                    ],
                },
            }"
        />
    </div>
</template>
<script setup>
defineProps({
    type: {
        type: String,
        default: "text",
    },
    label: {
        type: String,
        default: "Label",
    },
    placeholder: {
        type: String,
    },
    capitalize: { type: Boolean, default: false },
    error: { type: [String, Array, Object], default: "" },
});
const modelValue = defineModel({
    type: [String, Date, Object, null, Number],
    required: true,
});
</script>
<style scoped>
::v-deep(.p-tooltip-text) {
    font-size: 10px !important;
}
</style>
