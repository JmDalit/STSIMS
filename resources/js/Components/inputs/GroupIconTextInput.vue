<template>
    <InputGroup class="!rounded-xl">
        <IconField>
            <InputIcon class="flex items-center h-fit">
                <IconSearch size="17" />
            </InputIcon>
            <InputText
                :type="type"
                :placeholder="placeholder"
                v-model="modelValue"
                fluid
                class="!rounded-l-xl"
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
        <InputGroupAddon class="!rounded-r-xl">
            <Button
                fluid
                :type="buttonType"
                :label="buttonLabel"
                :disabled="buttonDisabled"
                :size="buttonSize"
                :loading="buttonLoading"
                :severity="buttonSeverity"
                @click="onClick"
                :raised="buttonRaised"
                :text="buttonText"
                :outlined="buttonOutlined"
                :class="[
                    buttonSeverity === 'primary' &&
                    !buttonOutlined &&
                    !buttonText
                        ? '!bg-blue-600 !border-blue-600 '
                        : '',
                    buttonClassName,
                ]"
                :rounded="buttonRounded"
            >
                <template #icon>
                    <component
                        :is="buttonIcon"
                        :size="buttonSize == 'small' ? 20 : 22"
                        v-if="buttonIcon"
                    ></component>
                </template>
            </Button>
        </InputGroupAddon>
    </InputGroup>
</template>
<script setup>
import { IconSearch } from "@tabler/icons-vue";

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

    buttonLabel: {
        type: [String],
        default: null,
    },
    buttonType: {
        type: [String],
        default: "submit",
    },
    buttonDisabled: {
        type: [Boolean],
        default: false,
    },
    buttonSize: {
        type: [String],
        default: "",
    },
    buttonLoading: {
        type: [Boolean],
        default: false,
    },
    buttonIcon: {
        type: [Object, String, Function],
        default: null,
    },
    buttonOutlined: {
        type: [Boolean],
        default: false,
    },
    buttonSeverity: {
        type: [String],
        default: "primary",
    },
    buttonRaised: {
        type: [Boolean],
        default: false,
    },
    buttonText: {
        type: [Boolean],
        default: false,
    },
    buttonRounded: {
        type: [Boolean],
        default: false,
    },
    buttonClassName: {
        type: String,
        default: null,
    },
});

const emit = defineEmits(["click"]);

const modelValue = defineModel({
    type: [String, Date, Object, null, Number],
    required: true,
});

const onClick = () => {
    emit("click");
};
</script>
