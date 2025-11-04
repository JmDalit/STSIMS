<template>
    <Button
        fluid
        :type="type"
        :label="label"
        :disabled="disabled"
        :size="size"
        :loading="loading"
        :severity="severity"
        @click="onClick"
        :raised="raised"
        :variant="variant"
        :outlined="outlined"
        :rounded="rounded"
    >
        <template #icon>
            <component
                :is="icon"
                :size="size == 'small' ? 20 : 22"
                v-if="icon"
            ></component>
        </template>
    </Button>
</template>
<script setup>
const emit = defineEmits(["click"]);

defineProps({
    label: {
        type: [String],
        default: null,
    },
    type: {
        type: [String],
        default: "submit",
    },
    disabled: {
        type: [Boolean],
        default: false,
    },
    size: {
        type: [String],
        default: "",
    },
    loading: {
        type: [Boolean],
        default: false,
    },
    icon: {
        type: [Object, String, Function],
        default: null,
    },
    outlined: {
        type: [Boolean],
        default: false,
    },
    severity: {
        type: [String],
        default: "primary",
    },
    raised: {
        type: [Boolean],
        default: false,
    },
    variant: {
        type: [String],
        default: null,
    },
    rounded: {
        type: [Boolean],
        default: false,
    },
});

function onClick() {
    emit("click");
}
</script>
