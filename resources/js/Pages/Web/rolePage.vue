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
                    @saveForm="saveRole"
                >
                    <template #form>
                        <div class="flex flex-col gap-3 mt-5">
                            <TextInput
                                v-model="roleForm.name"
                                label="Name"
                            ></TextInput>
                            <TextInput
                                v-model="roleForm.name"
                                label="Slug"
                            ></TextInput>
                            <TextInput
                                v-model="roleForm.name"
                                label="Description"
                            ></TextInput>
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
                                <div class="font-semibold">
                                    {{ props.data.name }}
                                </div>
                                <div class="text-gray-500 text-xs">
                                    {{ props.data.description }}
                                </div>
                            </div>
                        </template>
                    </Column>

                    <Column field="page_visit" header="Pages">
                        <template #body="props">
                            <div class="flex gap-2">
                                <div
                                    v-for="item in props.data.page_visit"
                                    :key="item.id"
                                >
                                    <span
                                        class="bg-blue-100 px-2 rounded-2xl text-xs capitalize"
                                        >{{ item }}</span
                                    >
                                </div>
                            </div>
                        </template>
                    </Column>
                    <Column field="formatted_date" header="Created Date">
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
const page = usePage();
const searchInput = ref(null);
const roleForm = useForm({
    name: null,
    slug: null,
    description: null,
    pages: null,
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

const saveRole = () => {
    console.log("test");
};
</script>
