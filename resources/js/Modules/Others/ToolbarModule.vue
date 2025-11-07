<template>
    <div class="flex items-center justify-between">
        <div class="flex-1 flex items-center gap-2">
            <IconTextInput
                :icon="IconSearch"
                placeholder="Search keywords..."
                v-model="modelValue"
                class="w-96"
                @enter="triggerEnter"
            />
            <DefaultButton
                rounded
                size="small"
                severity="secondary"
                :icon="IconX"
                v-show="modelValue"
                @click="triggerDelete"
                :icon-size="18"
            />
        </div>

        <div class="flex items-center gap-2">
            <DefaultButton
                :icon="IconCirclePlusFilled"
                :label="buttonLabel"
                size="small"
                @click="openModal"
                class-name="w-30  !rounded-xl"
                raised
            />
        </div>
    </div>
    <DefaultDialog
        v-model:visible="modal"
        :icon="dialogIcon"
        :title="dialogTitle"
        :description="dialogDescription"
        :button-label="dialogButtonLabel"
        @submit-form="triggerSave"
    >
        <slot name="form" />
    </DefaultDialog>
</template>
<script setup>
import { IconCirclePlusFilled, IconSearch, IconX } from "@tabler/icons-vue";
import DefaultButton from "../../Components/buttons/DefaultButton.vue";
import IconTextInput from "../../Components/inputs/IconTextInput.vue";
import DefaultDialog from "../../Components/dialogs/DefaultDialog.vue";
import { ref } from "vue";

const modal = ref(false);
const emit = defineEmits(["searchEnter", "deleteSearch", "saveForm"]);

defineProps({
    dialogDescription: String,
    dialogTitle: String,
    dialogIcon: Function,
    dialogButtonLabel: String,
    buttonLabel: String,
});

const modelValue = defineModel({
    type: [String, Date, Object, null, Number],
    required: true,
});

const openModal = () => {
    modal.value = true;
};

const triggerEnter = () => {
    emit("searchEnter", modelValue);
};
const triggerDelete = () => {
    emit("deleteSearch");
};
const triggerSave = () => {
    emit("saveForm");
};
</script>
