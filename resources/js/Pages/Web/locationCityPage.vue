<template>
    <Head title="Cities" />
    <AuthLayout>
        <div class="flex flex-col w-full h-full gap-10">
            <div class="flex">
                <HeaderModule
                    title="List of cities"
                    description="Cities information and management"
                />
            </div>
            <div class="flex-1 flex flex-col gap-2">
                <ToolbarModule
                    v-model="searchInput"
                    @deleteSearch="clearSearch"
                    @saveForm="submitForm"
                    button-label="Create"
                    :dialog-title="!citiesForm.id ? 'Create Role' : 'Edit Role'"
                    dialog-description="Define a new role and configure its access permissions."
                    :dialog-button-loading="citiesForm.processing"
                    :dialog-icon="IconUserCog"
                    dialog-button-label="Save"
                    :message-has-errors="citiesForm.hasErrors"
                    :message-errors="citiesForm.errors"
                    @buttonOpenModal="toggleModal({ type: 'create' })"
                    message-type="error"
                    ref="toolbarRef"
                >
                    <template #form>
                        <div class="flex flex-col gap-3 mt-5">
                            <TextInput
                                v-model="citiesForm.name"
                                label="Name"
                            ></TextInput>
                            <TextInput
                                v-model="citiesForm.district"
                                label="District"
                            ></TextInput>
                            <TextInput
                                v-model="citiesForm.zipCode"
                                label="Zipcode"
                            ></TextInput>
                            <TextInput
                                v-model="citiesForm.oldName"
                                label="Old Name"
                            ></TextInput>
                            <TextInput
                                v-model="citiesForm.code"
                                label="Code"
                            ></TextInput>
                            <SelectInput
                                label="Province"
                                v-model="citiesForm.province"
                                :options="page.props.cityOption"
                                :clearable="true"
                                capitalize
                                filter
                            ></SelectInput>
                        </div>
                        <div class="flex flex-col">
                            <Divider type="dashed" />
                            <div class="flex justify-between items-center">
                                <div class="text-sm">Is municipalities?</div>

                                <DefaultToggle
                                    v-model="citiesForm.isMunicipalities"
                                    :check-icon="IconCheck"
                                    :un-check-icon="IconX"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <Divider type="dashed" />
                            <div class="flex justify-between items-center">
                                <div class="text-sm">Is chartered?</div>

                                <DefaultToggle
                                    v-model="citiesForm.isChartered"
                                    :check-icon="IconCheck"
                                    :un-check-icon="IconX"
                                />
                            </div>
                        </div>
                    </template>
                </ToolbarModule>
                <DefaultTable
                    :items="page.props.cities.data"
                    :pagination="{
                        total: page.props.cities.total,
                        perPage: page.props.cities.per_page,
                        currentPage: page.props.cities.current_page,
                    }"
                    @paginate="loadPage"
                >
                    <Column field="name" header="Name"> </Column>

                    <Column field="old_name">
                        <template #header>
                            <div class="w-full flex justify-start">
                                <p class="font-semibold">Old Name</p>
                            </div>
                        </template>
                        <template #body="props">
                            <div class="flex justify-start w-full">
                                <div v-if="props.data.old_name">
                                    {{ props.data.old_name }}
                                </div>
                                <div
                                    class="text-gray-400 text-xs font-light"
                                    v-else
                                >
                                    not set yet
                                </div>
                            </div>
                        </template>
                    </Column>
                    <Column field="code">
                        <template #header>
                            <div class="w-full flex justify-center">
                                <p class="font-semibold">Municipality Code</p>
                            </div>
                        </template>
                        <template #body="props">
                            <div
                                class="flex items-center justify-center w-full"
                            >
                                <div class="text-xs font-semibold">
                                    {{ props.data.code }}
                                </div>
                            </div>
                        </template>
                    </Column>
                    <Column field="province_code">
                        <template #header>
                            <div class="w-full flex justify-start">
                                <p class="font-semibold">Province</p>
                            </div>
                        </template>
                        <template #body="props">
                            <div class="flex justify-start w-full">
                                <div>{{ props.data.province_code.name }}</div>
                            </div>
                        </template>
                    </Column>
                    <Column field="status" class="w-[5%]">
                        <template #header>
                            <div class="w-full flex justify-center">
                                <p class="font-semibold">Status</p>
                            </div>
                        </template>
                        <template #body="props">
                            <div
                                class="flex items-center justify-center w-full"
                            >
                                <DefaultToggle
                                    :check-icon="IconCheck"
                                    :un-check-icon="IconX"
                                    v-model="props.data.is_active"
                                    :disabled="props.data.is_lock"
                                    v-if="!props.data.is_lock"
                                    @update-value="updateStatus(props.data)"
                                />
                                <div
                                    v-else
                                    v-tooltip.top="'Cant deactive this role.'"
                                >
                                    <IconLock size="18" />
                                </div>
                            </div>
                        </template>
                    </Column>
                    <Column field="options" class="w-[5%]">
                        <template #body="prop">
                            <div class="flex w-full justify-end">
                                <Button
                                    text
                                    v-tooltip.top="'Options'"
                                    rounded
                                    size="small"
                                    severity="secondary"
                                    icon="pi pi-ellipsis-v"
                                    @click="(e) => toggleOption(e, prop.data)"
                                />
                                <Menu
                                    ref="menu"
                                    :model="menuItems"
                                    :popup="true"
                                >
                                    <template #item="{ item, props }">
                                        <a
                                            v-ripple
                                            class="flex items-center"
                                            v-bind="props.action"
                                            @click="item.command"
                                        >
                                            <div>
                                                <component
                                                    :is="item.icon"
                                                    :class="item.class"
                                                    size="20"
                                                    stroke-width="1.5"
                                                ></component>
                                            </div>
                                            <span class="ml-2 text-xs">{{
                                                item.label
                                            }}</span>
                                        </a>
                                    </template>
                                </Menu>
                            </div>
                        </template>
                    </Column>
                </DefaultTable>
            </div>
        </div>
        <DefaultToast ref="toastRef" />
        <DefaultConfirmDialog ref="confirmRef" />
    </AuthLayout>
</template>
<script setup>
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/AuthLayout.vue";
import HeaderModule from "../../Modules/Others/HeaderModule.vue";
import DefaultTable from "../../Components/tables/DefaultTable.vue";
import ToolbarModule from "../../Modules/Others/ToolbarModule.vue";
import TextInput from "../../Components/inputs/TextInput.vue";
import DefaultToggle from "../../Components/toggleswitches/DefaultToggle.vue";
import { computed, ref, watch } from "vue";
import {
    IconCheck,
    IconLock,
    IconUserCog,
    IconX,
    IconPencilCog,
    IconTrash,
} from "@tabler/icons-vue";
import DefaultToast from "../../Components/messages/DefaultToast.vue";
import DefaultConfirmDialog from "../../Components/dialogs/DefaultConfirmDialog.vue";
import SelectInput from "../../Components/inputs/SelectInput.vue";

const page = usePage();
const searchInput = ref(null);
const timerBounce = ref(null);
const selectedRow = ref(null);
const toolbarRef = ref(null);
const toastRef = ref(null);
const confirmRef = ref(null);
const menu = ref(null);
const citiesForm = useForm({
    id: null,
    name: null,
    district: null,
    zipCode: null,
    oldName: null,
    code: null,
    province: null,
    isMunicipalities: false,
    isChartered: false,
    isActive: false,
});

const toggleOption = (event, rowData) => {
    selectedRow.value = rowData;
    menu.value.toggle(event);
};

const menuItems = computed(() => {
    if (!selectedRow.value) return [];

    return [
        {
            label: "Edit",
            icon: IconPencilCog,
            class: "text-blue-500",
            command: () => {
                toggleModal({
                    type: "edit",
                    data: selectedRow.value,
                });
            },
        },
        {
            label: "Delete",
            icon: IconTrash,
            class: "text-red-500",
            command: () => {
                deleteRow(selectedRow.value.id);
            },
        },
    ];
});

const toggleModal = (res) => {
    citiesForm.resetAndClearErrors();

    if (res.type == "edit") {
        citiesForm.id = res.data.id;
        citiesForm.name = res.data.name;
        citiesForm.district = res.data.district;
        citiesForm.zipCode = res.data.zipcode;
        citiesForm.oldName = res.data.old_name;
        citiesForm.code = res.data.code;
        citiesForm.province = res.data.province_array;
        citiesForm.isChartered = res.data.is_chartered;
        citiesForm.isMunicipalities = res.data.is_municipality;
    }

    toolbarRef.value.openModal();
};

const deleteRow = (id) => {
    confirmRef.value.popupDialog(() => {
        citiesForm.delete(
            route("location.cities.destroy", { id: id, type: "delete" }),
            {
                onSuccess: () => {
                    citiesForm.resetAndClearErrors();
                    toastRef.value.show(page.props.flash);
                },
            }
        );
    });
};

const submitForm = () => {
    if (!citiesForm.id) {
        citiesForm.post(route("location.cities.store"), {
            onSuccess: () => {
                citiesForm.resetAndClearErrors();
                toastRef.value.show(page.props.flash);
            },
        });
    } else {
        citiesForm.put(
            route("location.cities.update", {
                id: citiesForm.id,
                type: "form",
            }),
            {
                onSuccess: () => {
                    toolbarRef.value.closeModal();
                    citiesForm.resetAndClearErrors();
                    toastRef.value.show(page.props.flash);
                },
            }
        );
    }
};
const updateStatus = (result) => {
    citiesForm.isActive = result.is_active;
    citiesForm.put(
        route("location.cities.update", { id: result.id, type: "status" }),
        {
            onSuccess: () => {
                citiesForm.clearErrors();
                toastRef.value.show(page.props.flash);
            },
        }
    );
};

const clearSearch = () => {
    searchInput.value = null;
};

const loadPage = (page) => {
    router.get(
        route("location.cities"),
        {
            page,
            search: searchInput.value,
        },
        {
            preserveState: true,
            preserveScroll: true,
        }
    );
};

watch(
    () => searchInput.value,
    () => {
        clearTimeout(timerBounce.value);
        timerBounce.value = setTimeout(() => {
            loadPage(1);
        }, 300);
    }
);
</script>
