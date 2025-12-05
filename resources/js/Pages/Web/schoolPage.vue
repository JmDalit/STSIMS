<template>
    <Head title="Schools" />
    <AuthLayout>
        <div class="flex flex-col w-full h-full gap-5">
            <div class="flex">
                <HeaderModule
                    title="Schools"
                    description="School information and management"
                />
            </div>
            <div class="flex-1 flex flex-col gap-2">
                <ToolbarModule
                    v-model="searchInput"
                    @deleteSearch="clearSearch"
                    @saveForm="submitForm"
                    button-label="Create"
                    :dialog-title="
                        !universityForm.id ? 'Create Role' : 'Edit Role'
                    "
                    dialog-description="Define a new role and configure its access permissions."
                    :dialog-button-loading="universityForm.processing"
                    :dialog-icon="IconUserCog"
                    dialog-button-label="Save"
                    :message-has-errors="universityForm.hasErrors"
                    :message-errors="universityForm.errors"
                    @buttonOpenModal="toggleModal({ type: 'create' })"
                    message-type="error"
                    ref="toolbarRef"
                >
                    <template #form>
                        <div class="flex flex-col gap-3 mt-5 mb-2">
                            <TextInput
                                v-model="universityForm.name"
                                label="Name"
                                capitalize
                            ></TextInput>
                            <TextInput
                                v-model="universityForm.abbreviation"
                                label="Abbreviation"
                            ></TextInput>
                            <SelectInput
                                v-model="universityForm.class"
                                :options="page.props.classOption"
                                label="Class"
                                clearable
                            >
                            </SelectInput>
                        </div>
                        <Divider type="dashed" />
                        <div class="overflow-y-auto max-h-90 px-2">
                            <div class="flex items-center justify-between">
                                <div class="font-semibold">Campus</div>
                                <!-- <div class="flex gap-3">
                                    <Button
                                        size="small"
                                        class="!text-xs"
                                        rounded
                                        @click="addCampus"
                                    >
                                        <div class="flex items-center gap-2">
                                            <IconCirclePlusFilled
                                                size="18"
                                            ></IconCirclePlusFilled>
                                            <div>Add Campus</div>
                                        </div>
                                    </Button>
                                </div> -->
                            </div>
                            <div
                                class="flex flex-col gap-2 mt-4"
                                v-for="(item, index) in universityForm.campuses"
                                :key="index"
                            >
                                <div class="flex justify-between items-center">
                                    <div
                                        class="text-xs bg-blue-100 dark:text-gray-700 w-fit font-semibold px-2 py-1 rounded-lg"
                                    >
                                        <span
                                            v-if="index == 0"
                                            class="uppercase font-bold"
                                            >Main</span
                                        >
                                        <span v-else> {{ index + 1 }}#</span>
                                        Campus
                                    </div>

                                    <Button
                                        v-show="
                                            index != 0 &&
                                            (hideRemoveButton == 'create' ||
                                                universityForm.campuses[index]
                                                    .id == null)
                                        "
                                        size="small"
                                        class="!text-xs"
                                        rounded
                                        severity="danger"
                                        outlined
                                        @click="removeCampus(index)"
                                    >
                                        <div class="flex items-center gap-2">
                                            <IconCircleXFilled
                                                size="20"
                                            ></IconCircleXFilled>
                                            <div>Remove</div>
                                        </div>
                                    </Button>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="flex items-center gap-3">
                                        <SelectInput
                                            v-model="
                                                universityForm.campuses[index]
                                                    .semester
                                            "
                                            :options="
                                                page.props.classificationOption
                                            "
                                            label="Semester"
                                            clearable
                                        >
                                        </SelectInput>
                                        <SelectInput
                                            v-model="
                                                universityForm.campuses[index]
                                                    .grading
                                            "
                                            :options="page.props.gradingOption"
                                            label="Grading"
                                            clearable
                                        >
                                        </SelectInput>
                                    </div>
                                    <SelectInput
                                        v-model="
                                            universityForm.campuses[index]
                                                .agency
                                        "
                                        :options="page.props.agencyOption"
                                        label="Regional Office"
                                        clearable
                                    >
                                    </SelectInput>
                                    <TextInput
                                        v-model="
                                            universityForm.campuses[index]
                                                .street
                                        "
                                        label="Address"
                                        placeholder="Street"
                                        capitalize
                                    ></TextInput>
                                    <AutoCompleteInput
                                        v-model="
                                            universityForm.campuses[index]
                                                .address
                                        "
                                        :options="page.props.resultSearch"
                                        placeholder="Find by Barangay, City, Province, or Region"
                                        @complete="autoSearch"
                                    ></AutoCompleteInput>
                                </div>
                                <Divider type="dashed" />
                            </div>
                            <Button
                                size="small"
                                class="!text-xs !rounded-xl"
                                fluid
                                @click="addCampus"
                            >
                                <div class="flex items-center gap-2">
                                    <IconCirclePlusFilled
                                        size="18"
                                    ></IconCirclePlusFilled>
                                    <div>Add Campus</div>
                                </div>
                            </Button>
                        </div>
                    </template>
                </ToolbarModule>
                <DefaultTable
                    :items="page.props.universities.data"
                    :pagination="{
                        total: page.props.universities.total,
                        perPage: page.props.universities.per_page,
                        currentPage: page.props.universities.current_page,
                    }"
                    group-rows-by="school.name"
                    row-group-mode="subheader"
                    @paginate="loadPage"
                >
                    <template #groupheader="slotProps">
                        <div class="flex w-full items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="">
                                    <Avatar
                                        v-if="
                                            slotProps.data.school.photo == null
                                        "
                                        :label="
                                            slotProps.data.school.name
                                                .charAt(0)
                                                .toUpperCase()
                                        "
                                        style="
                                            background-color: #dee9fc;
                                            color: #1a2551;
                                        "
                                        shape="circle"
                                        class="!w-[40px] !h-[40px]"
                                    />

                                    <Avatar
                                        v-else
                                        style="
                                            background-color: #dee9fc;
                                            color: #1a2551;
                                        "
                                        shape="circle"
                                        :image="page.props.user.avatar"
                                    />
                                </div>

                                <div class="flex flex-col">
                                    <div class="font-bold">
                                        {{ slotProps.data.school.name }}
                                    </div>
                                    <div class="text-xs">
                                        Shortcut :
                                        <span class="font-semibold">{{
                                            slotProps.data.school.shortcut
                                        }}</span>
                                        | Classification:
                                        <span class="font-semibold">{{
                                            slotProps.data.school.reference.name
                                        }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <Button
                                    text
                                    v-tooltip.top="'Options'"
                                    rounded
                                    size="small"
                                    severity="secondary"
                                    icon="pi pi-ellipsis-v"
                                    @click="
                                        (e) => toggleOption(e, slotProps.data)
                                    "
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
                        </div>
                    </template>
                    <Column
                        field="school.name"
                        header="Representative"
                    ></Column>
                    <Column header="Name">
                        <template #body="prop">
                            <div class="flex items-center gap-2">
                                <div class="indent-5">
                                    {{ prop.data.address.municipality.name }}
                                </div>

                                <div
                                    v-show="prop.data.is_main"
                                    class="text-[10px] font-semibold bg-rose-100 px-2 rounded-lg text-red-700"
                                >
                                    MAIN
                                </div>
                            </div>
                        </template>
                    </Column>
                    <Column header="Term">
                        <template #body="prop">
                            <div class="text-xs">
                                {{ prop.data.term.name }}
                            </div>
                        </template>
                    </Column>
                    <Column header="Grading">
                        <template #body="prop">
                            <div class="text-xs">
                                {{ prop.data.grading.name }}
                            </div>
                        </template>
                    </Column>
                    <Column header="Regional Office">
                        <template #body="prop">
                            <div class="text-xs">
                                {{ prop.data.agency.name }}
                            </div>
                        </template>
                    </Column>
                    <Column field="options" class="w-[5%]">
                        <template #body="props">
                            <div class="flex w-full justify-end">
                                <DefaultButton
                                    size="small"
                                    rounded
                                    class-name="!p-0 !m-0"
                                    :icon="IconArrowRight"
                                    :icon-size="18"
                                    @click="openDrawer(props)"
                                    text
                                    severity="secondary"
                                />
                            </div>
                        </template>
                    </Column>
                </DefaultTable>
            </div>
        </div>
        <DefaultToast ref="toastRef" />
        <DefaultConfirmDialog ref="confirmRef" />
        <DefaultDrawer v-model:visible="drawerComponent" size="!w-[50rem]">
            <template #header>
                <div class="flex items-center gap-2">
                    <div class="">
                        <Avatar
                            v-if="dataDrawer.school.photo == null"
                            :label="
                                dataDrawer.school.name.charAt(0).toUpperCase()
                            "
                            style="background-color: #dee9fc; color: #1a2551"
                            shape="circle"
                            class="!w-[50px] !h-[50px] font-extrabold !text-2xl"
                        />

                        <Avatar
                            v-else
                            style="background-color: #dee9fc; color: #1a2551"
                            shape="circle"
                            :image="dataDrawer.school.photo"
                            class="!w-[50px] !h-[50px]"
                        />
                    </div>

                    <div class="flex flex-col">
                        <div class="font-bold">
                            {{ dataDrawer.fullname_campus }}
                        </div>
                        <div
                            class="text-xs flex items-center gap-1 text-gray-500"
                        >
                            <IconMapPin size="18" />
                            <div>
                                {{ dataDrawer.address.full_address.name }}
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <template #body>
                <div class="flex items-center justify-end px-5">
                    <DefaultButton
                        size="small"
                        label="Update"
                        :icon="IconPencil"
                        :icon-size="18"
                        raised
                        class-name="!rounded-xl w-30 !text-xs"
                    />
                </div>
                <div class="flex flex-col gap-5 px-5 py-2">
                    <div class="flex justify-between gap-2">
                        <div class="w-[50%] flex items-center gap-2">
                            <div class="bg-slate-200 p-2 shadow rounded-xl">
                                <IconUserStar size="20" />
                            </div>
                            <div class="flex flex-col flex-1">
                                <div
                                    class="text-xs font-semibold flex items-center"
                                >
                                    <div>DEAN:</div>
                                </div>
                                <div class="text-sm font-light">
                                    John Doe Reverse
                                </div>
                            </div>
                        </div>
                        <div class="w-[50%] flex items-center gap-2">
                            <div class="bg-slate-200 p-2 shadow rounded-xl">
                                <IconUserQuestion size="20" />
                            </div>
                            <div class="flex flex-col flex-1">
                                <div
                                    class="text-xs font-semibold flex items-center"
                                >
                                    <div>REGISTRAR:</div>
                                </div>
                                <div class="text-sm font-light">
                                    John Doe Reverse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between gap-2">
                        <div class="w-[50%] flex items-center gap-2">
                            <div class="bg-slate-200 p-2 shadow rounded-xl">
                                <IconPhone size="20" />
                            </div>
                            <div class="flex flex-col flex-1">
                                <div
                                    class="text-xs font-semibold flex items-center"
                                >
                                    <div>CONTACT NO:</div>
                                </div>
                                <div class="text-sm font-light">
                                    973123613236
                                </div>
                            </div>
                        </div>
                        <div class="w-[50%] flex items-center gap-2">
                            <div class="bg-slate-200 p-2 shadow rounded-xl">
                                <IconAt size="20" />
                            </div>
                            <div class="flex flex-col flex-1">
                                <div
                                    class="text-xs font-semibold flex items-center"
                                >
                                    <div>EMAIL:</div>
                                </div>
                                <div class="text-sm font-light">
                                    JohnDoe@gmail.com
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between gap-2">
                        <div class="w-[50%] flex items-center gap-2">
                            <div class="bg-slate-200 p-2 shadow rounded-xl">
                                <IconWorldWww size="20" />
                            </div>
                            <div class="flex flex-col flex-1">
                                <div
                                    class="text-xs font-semibold flex items-center"
                                >
                                    <div>VISIT PAGE:</div>
                                </div>
                                <div class="text-sm font-light">
                                    dost.gov.ph
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Divider align="left" type="dashed" class="!m-0">
                    <span class="text-xs font-semibold">Courses</span>
                </Divider>
                <div class="px-5 py-2 gap-5 flex flex-col">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 flex items-center gap-2">
                            <IconTextInput
                                :icon="IconSearch"
                                placeholder="Search keywords..."
                                class="w-64 lg:w-96"
                            />
                        </div>

                        <div class="flex items-center gap-2">
                            <DefaultButton
                                :icon="IconCirclePlusFilled"
                                :icon-size="18"
                                label="Course"
                                @click="courseDialog = true"
                                size="small"
                                class-name="w-30 !rounded-xl w-26 !text-xs"
                                raised
                            />
                        </div>
                    </div>
                    <DefaultScrollTable></DefaultScrollTable>
                </div>
                <Divider align="left" type="dashed" class="!m-0">
                    <span class="text-xs font-semibold">Gradings</span>
                </Divider>
                <div class="px-5 py-2 gap-5 flex flex-col">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 flex items-center gap-2">
                            <IconTextInput
                                :icon="IconSearch"
                                placeholder="Search keywords..."
                                class="w-64 lg:w-96"
                            />
                        </div>

                        <div class="flex items-center gap-2">
                            <DefaultButton
                                :icon="IconCirclePlusFilled"
                                :icon-size="18"
                                label="Grade"
                                size="small"
                                class-name="w-30  !rounded-xl  w-26 !text-xs"
                                raised
                            />
                        </div>
                    </div>
                    <DefaultScrollTable></DefaultScrollTable>
                </div>
            </template>
        </DefaultDrawer>
        <DefaultDialog v-model:visible="courseDialog"></DefaultDialog>
    </AuthLayout>
</template>
<script setup>
import AuthLayout from "../../Layouts/AuthLayout.vue";
import HeaderModule from "../../Modules/Others/HeaderModule.vue";
import DefaultTable from "../../Components/tables/DefaultTable.vue";
import ToolbarModule from "../../Modules/Others/ToolbarModule.vue";
import TextInput from "../../Components/inputs/TextInput.vue";
import DefaultButton from "../../Components/buttons/DefaultButton.vue";
import AutoCompleteInput from "../../Components/inputs/AutoCompleteInput.vue";
import DefaultToast from "../../Components/messages/DefaultToast.vue";
import DefaultDrawer from "../../Components/dialogs/DefaultDrawer.vue";
import DefaultConfirmDialog from "../../Components/dialogs/DefaultConfirmDialog.vue";
import IconTextInput from "../../Components/inputs/IconTextInput.vue";
import SelectInput from "../../Components/inputs/SelectInput.vue";
import DefaultScrollTable from "../../Components/tables/DefaultScrollTable.vue";
import DefaultDialog from "../../Components/dialogs/DefaultDialog.vue";

import { computed, ref, watch } from "vue";
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import {
    IconUserCog,
    IconPencilCog,
    IconTrash,
    IconCirclePlusFilled,
    IconCircleXFilled,
    IconArrowRight,
    IconMapPin,
    IconPencil,
    IconUserStar,
    IconUserQuestion,
    IconPhone,
    IconAt,
    IconWorldWww,
    IconSearch,
} from "@tabler/icons-vue";

const drawerComponent = ref(false);
const gradeDialog = ref(false);
const courseDialog = ref(false);
const page = usePage();
const searchInput = ref(null);
const dataDrawer = ref(null);
const timerBounce = ref(null);
const hideRemoveButton = ref("create");
const selectedRow = ref(null);
const toolbarRef = ref(null);
const toastRef = ref(null);
const confirmRef = ref(null);
const menu = ref(null);
const universityForm = useForm({
    id: null,
    name: null,
    abbreviation: null,
    class: null,
    campuses: [
        {
            id: null,
            semester: null,
            grading: null,
            agency: null,
            street: null,
            address: null,
            main: true,
        },
    ],
    isActive: false,
});

const addCampus = () => {
    universityForm.campuses.push({
        main: false,
        semester: null,
        agency: null,
        grading: null,
        street: null,
        address: null,
    });
};

const removeCampus = (index) => {
    if (index == 0) {
        return;
    }
    universityForm.campuses.splice(index, 1);
};

const toggleOption = (event, rowData) => {
    selectedRow.value = rowData;
    menu.value.toggle(event);
};

const openDrawer = (res) => {
    dataDrawer.value = res.data;
    console.log(res.data);
    drawerComponent.value = true;
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
    universityForm.resetAndClearErrors();
    hideRemoveButton.value = res.type;

    if (res.type === "edit") {
        universityForm.campuses = [];
        universityForm.id = res.data.school.id;
        universityForm.name = res.data.school.name;
        universityForm.abbreviation = res.data.school.shortcut;

        universityForm.class = res.data.school.reference.reference_array;
        res.data.school.campuses.forEach((element) => {
            universityForm.campuses.push({
                id: element.id,
                semester: element.term_array,
                grading: element.grading_array,
                agency: element.agency_array,
                street: element.address.address,
                address: element.address.full_address,
                main: element.is_main,
            });
        });
    }

    toolbarRef.value.openModal();
};

const deleteRow = (id) => {
    confirmRef.value.popupDialog(() => {
        universityForm.delete(
            route("academic.courses.destroy", { id: id, type: "delete" }),
            {
                onSuccess: () => {
                    universityForm.resetAndClearErrors();
                    toastRef.value.show(page.props.flash);
                },
            }
        );
    });
};

const submitForm = () => {
    if (!universityForm.id) {
        universityForm.post(route("academic.universities.store"), {
            onSuccess: () => {
                universityForm.resetAndClearErrors();
                toastRef.value.show(page.props.flash);
            },
        });
    } else {
        universityForm.put(
            route("academic.universities.update", {
                id: universityForm.id,
                type: "form",
            }),
            {
                onSuccess: () => {
                    toolbarRef.value.closeModal();
                    universityForm.resetAndClearErrors();
                    toastRef.value.show(page.props.flash);
                },
            }
        );
    }
};
const updateStatus = (result) => {
    universityForm.isActive = result.is_active;
    universityForm.put(
        route("academic.courses.update", { id: result.id, type: "status" }),
        {
            onSuccess: () => {
                toastRef.value.show(page.props.flash);
            },
        }
    );
};

const clearSearch = () => {
    searchInput.value = null;
};

const autoSearch = (event) => {
    router.visit(
        route("academic.universities", {
            autosuggest: event,
        }),
        {
            preserveState: true,
            preserveScroll: true,
            replace: false,
        }
    );
};

const loadPage = (page) => {
    router.get(
        route("academic.universities"),
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
