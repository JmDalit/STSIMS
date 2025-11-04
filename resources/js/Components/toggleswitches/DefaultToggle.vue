<template>
    <ToggleSwitch
        v-model="model"
        v-tooltip.bottom="tooltip"
        @update:model-value="updateValue()"
    >
        <template #handle="{ checked }">
            <component :is="checkIcon" v-if="checked" size="12" />
            <component :is="unCheckIcon" v-else size="12" />
        </template>
    </ToggleSwitch>
</template>
<script setup>
const model = defineModel();
const emit = defineEmits(["updateValue"]);
defineProps({
    checkIcon: {
        type: Function,
        default: null,
    },
    unCheckIcon: {
        type: Function,
        default: null,
    },
    tooltip: { type: String, default: null },
});

function updateValue() {
    emit("updateValue", model.value);
}
</script>
