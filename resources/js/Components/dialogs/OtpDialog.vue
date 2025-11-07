<template>
    <div class="flex justify-center">
        <Dialog
            v-model:visible="visible"
            modal
            class="w-[90%] sm:w-1/3 dark:!bg-gray-800 dark:!text-gray-300 dark:!border-gray-600"
        >
            <template #header>
                <div class="flex items-center justify-center gap-2 px-2">
                    <Avatar size="medium">
                        <IconPasswordUser stroke-width="1.5" size="20" />
                    </Avatar>

                    <div class="font-semibold antialiased">
                        OTP Verification
                    </div>
                </div>
            </template>
            <div class="mt-3 px-1">
                <div class="font-semibold text-sm dark:text-gray-200">
                    General Information
                </div>
                <span
                    class="block text-gray-600 font-light indent-5 text-sm dark:text-gray-300"
                >
                    We'll send you a
                    <span class="font-semibold">One Time Password (OTP)</span>
                    to your email for verification.
                </span>
            </div>
            <div class="mt-6">
                <Stepper value="1" linear class="w-full">
                    <StepPanels class="!p-0">
                        <StepPanel
                            v-slot="{ activateCallback }"
                            value="1"
                            class="dark:!bg-gray-800 dark:!text-gray-300"
                        >
                            <div
                                class="flex flex-col gap-5 text-center items-center h-16"
                            >
                                <InputText
                                    placeholder="Enter your email"
                                    type="email"
                                    v-model="sendEmail.email"
                                    @keyup.enter="sendOtp(activateCallback)"
                                    fluid
                                    required
                                    :pt="{
                                        root: {
                                            class: [
                                                'dark:!bg-gray-700 !text-sm  border dark:!border-gray-700 dark:!text-white',
                                            ],
                                        },
                                    }"
                                />
                                <div class="text-xs font-light">
                                    Check your email or spam folder for the OTP
                                    code.
                                </div>
                            </div>
                            <div
                                class="flex pt-6 justify-between items-center gap-10"
                            >
                                <div class="flex-1">
                                    <DefaultMessages
                                        messageType="error"
                                        :message="sendEmail.errors"
                                        v-if="sendEmail.hasErrors"
                                    />
                                </div>

                                <Button
                                    type="button"
                                    size="small"
                                    label="Send OTP"
                                    :loading="sendEmail.processing"
                                    class="!px-5 !rounded-md"
                                    @click="sendOtp(activateCallback)"
                                >
                                </Button>
                            </div>
                        </StepPanel>
                        <StepPanel
                            v-slot="{ activateCallback }"
                            value="2"
                            class="dark:!bg-gray-800 dark:!text-gray-300"
                        >
                            <div
                                class="flex flex-col gap-5 text-center items-center h-16"
                            >
                                <InputOtp
                                    v-model="verifyForm.otp"
                                    :length="6"
                                    integerOnly
                                    :pt="{
                                        pcInputText: {
                                            root: 'dark:!bg-gray-700 !text-sm  dark:!text-white dark:!border-gray-700',
                                        },
                                    }"
                                />

                                <div class="text-xs font-light">
                                    Enter the 6-digit code from your email to
                                    verify your identity.
                                </div>
                            </div>
                            <div
                                class="flex pt-6 justify-between items-center gap-10 mt-6"
                            >
                                <div class="flex-1">
                                    <DefaultMessages
                                        messageType="error"
                                        :message="verifyForm.errors"
                                        v-if="verifyForm.hasErrors"
                                    />
                                </div>

                                <div class="flex gap-4 justify-end">
                                    <Button
                                        type="button"
                                        size="small"
                                        class="w-30 !rounded-md"
                                        :disabled="
                                            countExpired.display ||
                                            sendEmail.processing
                                        "
                                        :label="
                                            countExpired.display
                                                ? countExpired.display
                                                : 'Resend OTP'
                                        "
                                        severity="secondary"
                                        outlined
                                        @click="sendOtp(activateCallback)"
                                    />
                                    <Button
                                        type="button"
                                        size="small"
                                        :loading="verifyForm.processing"
                                        class="!px-5 !rounded-md"
                                        label="Continue"
                                        @click="loginOtp(sendEmail.email)"
                                    />
                                </div>
                            </div>
                        </StepPanel>
                    </StepPanels>
                </Stepper>
            </div>
        </Dialog>
    </div>
</template>

<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import { IconPasswordUser } from "@tabler/icons-vue";
import { ref } from "vue";
import DefaultMessages from "../messages/DefaultMessages.vue";

let countdownTimer = null;
const page = usePage();
const sendEmail = useForm({
    email: "",
    otpRequest: true,
});
const verifyForm = useForm({
    otp: "",
    email: null,
});
const countExpired = ref({
    minutes: null,
    seconds: null,
    display: null,
});

const visible = defineModel("visible");

const sendOtp = (activateCallback) => {
    sendEmail.post(route("otp.check"), {
        onSuccess: () => {
            activateCallback("2");
            const attempts = page.props.flash?.attempts ?? 1;
            sendEmail.clearErrors();
            startCountdown(120 * attempts);
        },
    });
};

const loginOtp = (email) => {
    verifyForm.email = email;
    verifyForm.post(route("otp.store"), {
        onSuccess: () => {
            verifyForm.clearErrors();
            verifyForm.reset();
        },
    });
};

function startCountdown(totalSeconds) {
    let remaining = totalSeconds;

    // Clear previous timer if exists
    if (countdownTimer) clearInterval(countdownTimer);

    countdownTimer = setInterval(() => {
        const min = Math.floor(remaining / 60);
        const sec = remaining % 60;

        countExpired.value.minutes = min;
        countExpired.value.seconds = sec;
        countExpired.value.display = `${String(min).padStart(
            2,
            "0"
        )} : ${String(sec).padStart(2, "0")}`;

        remaining--;

        if (remaining < 0) {
            clearInterval(countdownTimer);
            countdownTimer = null;

            countExpired.value.minutes = 0;
            countExpired.value.seconds = 0;
            countExpired.value.display = null;
        }
    }, 1000);
}
</script>
<style>
.p-dialog-header {
    padding: 10px !important;
}
</style>
