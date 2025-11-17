<template>
    <Head title="Routes" />
    <AuthLayout>
        <div class="flex flex-col w-full h-full gap-10">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <HeaderModule
                    title="Menu Management"
                    description="Create, organize, and manage navigation menus in the system."
                    class="flex-1"
                />
            </div>

            <div class="flex-1 flex flex-col gap-2">
                <ToolbarModule
                    v-model="searchInput"
                    @deleteSearch="clearSearch"
                    button-label="Create"
                    dialog-title="Create Route"
                    dialog-description="Add a new navigation route to the system and configure its path and display settings."
                    :dialog-icon="IconCategory"
                    :dialog-button-loading="routeForm.processing"
                    dialog-button-label="Save"
                    @saveForm="submitRouterForm"
                    :message-has-errors="routeForm.hasErrors"
                    :message-errors="routeForm.errors"
                    message-type="error"
                >
                    <template #form>
                        <div class="flex flex-col gap-2 mt-5">
                            <SelectMultiInput
                                label="Role"
                                v-model="routeForm.role"
                                :options="page.props.roleOption"
                                :clearable="true"
                                filter
                                capitalize
                            ></SelectMultiInput>
                            <TextInput
                                v-model="routeForm.label"
                                label="Label"
                                capitalize
                            ></TextInput>
                            <TextInput
                                v-model="routeForm.slug"
                                label="Slug"
                            ></TextInput>
                            <TextInput
                                v-model="routeForm.icon"
                                label="Icon"
                                message="Check TablerIcon website for the list of available icons."
                            ></TextInput>

                            <TextInput
                                v-model="routeForm.route"
                                label="Route"
                                message="Check the route path inside your routes folder."
                            ></TextInput>

                            <TextInput
                                v-model="routeForm.component"
                                label="Component"
                                message="Specify the Vue component that should render for this route."
                            ></TextInput>
                            <div class="">
                                <Divider type="dashed" />
                                <div class="flex justify-between items-center">
                                    <div class="text-sm">
                                        Is this a sub-menu?
                                    </div>
                                    <DefaultToggle
                                        v-model="routeForm.isSubmenu"
                                        :check-icon="IconCheck"
                                        :un-check-icon="IconX"
                                    />
                                </div>
                                <SelectInput
                                    class="mt-3"
                                    v-show="routeForm.isSubmenu"
                                    v-model="routeForm.submenu"
                                    :options="page.props.routeOption"
                                ></SelectInput>
                            </div>
                        </div>
                    </template>
                </ToolbarModule>

                <DefaultTreeTable :items="page.props.routes">
                    <Column header="Name" expander style="width: 40%">
                        <template #body="slotProps">
                            <div class="flex items-center gap-2">
                                <component
                                    :is="TablerIcons[slotProps.node.icon]"
                                />
                                <div class="capitalize">
                                    {{ slotProps.node.name }}
                                </div>
                            </div>
                        </template>
                    </Column>

                    <Column
                        header="Route"
                        field="route"
                        class="text-xs"
                    ></Column>
                    <Column header="Roles" class="text-xs">
                        <template #body="slotProps">
                            <div
                                v-for="(item, index) in slotProps.node.roles"
                                :key="index"
                            >
                                <div
                                    class="bg-blue-100 px-3 dark:text-gray-700 capitalize py-1 rounded-xl"
                                >
                                    {{ item.name }}
                                </div>
                            </div>
                        </template>
                    </Column>
                    <Column
                        header="Created By"
                        field="created_by"
                        class="text-xs"
                    ></Column>
                </DefaultTreeTable>
            </div>
        </div>
    </AuthLayout>
</template>
<script setup>
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
import { IconCategory, IconCheck, IconX } from "@tabler/icons-vue";
import * as TablerIcons from "@tabler/icons-vue";
import AuthLayout from "../../Layouts/AuthLayout.vue";
import HeaderModule from "../../Modules/Others/HeaderModule.vue";
import SelectInput from "../../Components/inputs/SelectInput.vue";
import ToolbarModule from "../../Modules/Others/ToolbarModule.vue";
import TextInput from "../../Components/inputs/TextInput.vue";
import DefaultToggle from "../../Components/toggleswitches/DefaultToggle.vue";
import DefaultTreeTable from "../../Components/tables/DefaultTreeTable.vue";
import SelectMultiInput from "../../Components/inputs/SelectMultiInput.vue";

const page = usePage();
const searchInput = ref(null);
const routeForm = useForm({
    icon: null,
    label: null,
    route: null,
    role: null,
    isSubmenu: false,
    submenu: null,
    component: null,
    slug: null,
    order_no: null,
});

const submitRouterForm = () => {
    routeForm.post(route("routes.store"), {
        onSuccess: () => {
            routeForm.reset();
            routeForm.clearErrors();
        },
    });
};

const loadPage = () => {
    router.get(
        route("routes"),
        {
            page: 1,
            search: null,
        },
        {
            preserveState: true,
            preserveScroll: true,
        }
    );
};

const clearSearch = () => {
    searchInput.value = null;
};
</script>
