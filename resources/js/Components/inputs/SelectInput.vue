<template>
  <div class="w-full flex flex-col">
    <span class="text-sm font-medium">{{ label }}</span>
    <Select
      :placeholder="placeholder"
      v-model="modelValue"
      :disabled="disable"
      :filter="filter"
      optionLabel="name"
      @update:modelValue="emit('update-model', $event)"
      :options="options"
      fluid
      :pt="{
        root: {
          class: ['dark:!bg-gray-700 !text-sm dark:!border-gray-700 '],
        },
        option: {
          class: '!text-sm',
        },
        overlay: {
          class: 'dark:!bg-gray-800',
        },
        emptyMessage: {
          class: '!text-sm',
        },
      }"
    />
  </div>
</template>
<script setup>
import { watch } from 'vue'
defineProps({
  label: {
    type: String,
    default: 'Label',
  },
  disable: {
    type: Boolean,
    default: false,
  },
  placeholder: {
    type: String,
    default: 'Select an option',
  },
  options: {
    type: [Object, Array],
    required: true,
  },
  filter: {
    type: [Boolean],
    default: false,
  },
})
const modelValue = defineModel({
  type: [Array, Object],
  required: true,
})
const emit = defineEmits(['update', 'update-model'])

watch(modelValue, (newVal) => {
  emit('update', newVal)
})
</script>
<style scoped>
::v-deep(.p-select-label) {
  font-size: 14px !important;
}
</style>
