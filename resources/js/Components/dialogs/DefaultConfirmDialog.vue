<template>
    <ConfirmDialog class="w-[90%] lg:w-[17%]">
        <template #container="{ message, acceptCallback, rejectCallback }">
            <div
                class="flex flex-col items-center p-8 bg-surface-0 dark:bg-surface-900 rounded"
            >
                <div
                    class="rounded-full bg-red-500 shadow text-white inline-flex justify-center items-center h-24 w-24 -mt-20"
                >
                    <i class="pi pi-question !text-4xl"></i>
                </div>
                <span class="font-bold text-2xl block mb-2 mt-6">{{
                    message.header
                }}</span>
                <p class="mb-0 text-sm font-light">{{ message.message }}</p>
                <div class="flex items-center gap-2 mt-6">
                    <Button
                        label="Cancel"
                        outlined
                        severity="secondary"
                        class="w-20 !rounded-lg"
                        @click="rejectCallback"
                        size="small"
                    ></Button>
                    <Button
                        label="Delete"
                        @click="acceptCallback"
                        size="small"
                        severity="danger"
                        class="w-20 !rounded-lg"
                    ></Button>
                </div>
            </div>
        </template>
    </ConfirmDialog>
</template>
<script setup>
import { useConfirm } from "primevue/useconfirm";
const confirm = useConfirm();

const popupDialog = (onAccept) => {
    confirm.require({
        message: "Do you want to delete this row?",
        header: "Confirmation",
        icon: "pi pi-info-circle",
        rejectLabel: "Cancel",

        accept: () => {
            if (typeof onAccept === "function") {
                onAccept();
            }
        },
    });
};

defineExpose({
    popupDialog,
});
</script>
