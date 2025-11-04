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
                        <component :is="icon" size="20"></component>
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
                <!-- <div class="flex item-center justify-center gap-5">
                    <div class="!w-[70%]">
                        <InputText
                            placeholder="Enter your email"
                            type="email"
                            v-model="sendEmail.email"
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
                    </div>

                    <Button
                        type="button"
                        size="small"
                        class="!px-5 !rounded-md"
                    >
                        <div class="flex items-center justify-center gap-2">
                            <div>Send</div>
                            <IconSend2 stroke-width="1.5" size="18" />
                        </div>
                    </Button>
                </div>
                <div
                    class="w-full text-center flex flex-col items-center mt-5 gap-3"
                >
                    <Divider type="dashed"> </Divider>

                    <div class="text-sm">
                        Enter the 6-digit code from your email to verify your
                        identity.
                    </div>
                    <InputOtp
                        v-model="verifyForm.otp"
                        :length="6"
                        integerOnly
                    />
                </div> -->

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
                            <div class="flex pt-6 justify-end">
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
                            <div class="flex mt-6 gap-4 justify-end">
                                <Button
                                    type="button"
                                    size="small"
                                    class="!px-5 !rounded-md"
                                    label="Back"
                                    severity="secondary"
                                    outlined
                                    @click="activateCallback('1')"
                                />
                                <Button
                                    type="button"
                                    size="small"
                                    class="!px-5 !rounded-md"
                                    label="Login"
                                    @click="activateCallback('3')"
                                />
                            </div>
                        </StepPanel>
                    </StepPanels>
                </Stepper>
            </div>
        </Dialog>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { IconSend2 } from "@tabler/icons-vue";
import { InputText } from "primevue";
defineProps({
    description: String,
    title: String,
    icon: Function,
    loading: Boolean,
    buttonLabel: {
        type: String,
        default: "Submit",
    },
    buttonIcon: {
        type: [Object, String, Function],
        default: null,
    },
});

const sendEmail = useForm({
    email: "",
});
const verifyForm = useForm({
    otp: "",
});

const visible = defineModel("visible");
const sendOtp = (activateCallback) => {
    activateCallback("2");
};
</script>
<style>
.p-dialog-header {
    padding: 10px !important;
}
</style>
