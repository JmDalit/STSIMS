<template>
    <IconField>
        <InputIcon class="flex items-center fixed">
            <component :is="icon" size="16" />
        </InputIcon>
        <InputText
            :type="type"
            :placeholder="placeholder"
            v-model="modelValue"
            fluid
            class="!rounded-xl"
            @keyup.enter="emitEnter"
            autocomplete="off"
            :pt="{
                root: {
                    class: [
                        'dark:!bg-gray-700 !text-sm  border dark:!border-gray-700 dark:!text-white !shadow-none',
                        capitalize ? 'capitalize' : '',
                    ],
                },
            }"
        />
    </IconField>
</template>
<script setup>
defineProps({
    type: {
        type: String,
        default: "text",
    },
    placeholder: {
        type: String,
    },
    icon: {
        type: Function,
    },
    capitalize: { type: Boolean, default: false },
});

const emit = defineEmits(["update:modelValue", "enter"]);

const modelValue = defineModel({
    type: [String, Date, Object, null, Number],
    required: true,
});

const emitEnter = () => {
    emit("enter", modelValue);
};
</script>
