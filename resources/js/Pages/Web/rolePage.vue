<template>
    <Head title="Roles" />
    <AuthLayout>
        <div class="flex flex-col w-full h-full gap-10">
            <div class="flex">
                <HeaderModule
                    title="Role Management"
                    description="Manage user roles, permissions, and access levels."
                />
            </div>
            <div class="flex-1 flex flex-col gap-2">
                <ToolbarModule
                    v-model="searchInput"
                    @searchEnter="search"
                    @deleteSearch="clearSearch"
                    @saveForm="submitRoleForm"
                    button-label="Create"
                    dialog-title="Create Role"
                    dialog-description="Define a new role and configure its access permissions."
                    :dialog-button-loading="roleForm.processing"
                    :dialog-icon="IconUserCog"
                    dialog-button-label="Save"
                    :message-has-errors="roleForm.hasErrors"
                    :message-errors="roleForm.errors"
                    message-type="error"
                >
                    <template #form>
                        <div class="flex flex-col gap-3 mt-5">
                            <TextInput
                                v-model="roleForm.name"
                                label="Name"
                                capitalize
                            ></TextInput>
                            <TextInput
                                v-model="roleForm.slug"
                                label="Slug"
                            ></TextInput>
                            <TextInput
                                v-model="roleForm.description"
                                label="Description"
                            ></TextInput>
                            <div>
                                <Divider type="dashed" />
                                <div class="flex justify-between items-center">
                                    <div class="text-sm">
                                        Make this role undeletable?
                                    </div>
                                    <DefaultToggle
                                        v-model="roleForm.isLock"
                                        :check-icon="IconCheck"
                                        :un-check-icon="IconX"
                                    />
                                </div>
                            </div>
                        </div>
                    </template>
                </ToolbarModule>
                <DefaultTable
                    :items="page.props.roles.data"
                    :pagination="{
                        total: page.props.roles.total,
                        perPage: page.props.roles.per_page,
                        currentPage: page.props.roles.current_page,
                    }"
                    @paginate="loadPage"
                >
                    <Column field="name" header="Name">
                        <template #body="props">
                            <div class="flex flex-col">
                                <div class="font-semibold capitalize">
                                    {{ props.data.name }}
                                </div>
                                <div class="text-gray-500 text-xs">
                                    {{ props.data.description }}
                                </div>
                            </div>
                        </template>
                    </Column>

                    <Column field="formatted_date" header="Created Date">
                    </Column>
                    <Column field="created_by" header="Created By" />
                    <Column>
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
                </DefaultTable>
            </div>
        </div>
    </AuthLayout>
</template>
<script setup>
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/AuthLayout.vue";
import HeaderModule from "../../Modules/Others/HeaderModule.vue";
import DefaultTable from "../../Components/tables/DefaultTable.vue";
import ToolbarModule from "../../Modules/Others/ToolbarModule.vue";
import { ref } from "vue";
import TextInput from "../../Components/inputs/TextInput.vue";
import { IconCheck, IconLock, IconUserCog, IconX } from "@tabler/icons-vue";
import DefaultToggle from "../../Components/toggleswitches/DefaultToggle.vue";
const page = usePage();
const searchInput = ref(null);
const roleForm = useForm({
    name: null,
    slug: null,
    description: null,
    isLock: false,
});

const loadPage = () => {
    router.get(
        route("roles"),
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

const search = (val) => {
    console.log(val.value);
};
const clearSearch = () => {
    searchInput.value = null;
};

const submitRoleForm = () => {
    roleForm.post(route("roles.store"), {
        onSuccess: () => {
            roleForm.reset();
            roleForm.clearErrors();
        },
    });
};
</script>
