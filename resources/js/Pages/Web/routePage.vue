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

            <div class="flex-1 flex flex-col gap-5">
                <ToolbarModule
                    v-model="searchInput"
                    @deleteSearch="clearSearch"
                    button-label="Create"
                    dialog-title="Create new route"
                    dialog-description="Add a new navigation route to the system and configure its path and display settings."
                    :dialog-icon="IconCategory"
                    dialog-button-label="Save"
                />
                <DefaultTable
                    :items="page.props.routes.data"
                    :pagination="{
                        total: page.props.routes.total ?? 0,
                        perPage: page.props.routes.per_page ?? 0,
                        currentPage: page.props.routes.current_page ?? 0,
                    }"
                    @paginate="loadPage"
                >
                    <Column header="Icon"></Column>
                    <Column header="Name"></Column>
                    <Column header="Route"></Column>
                    <Column header="Sub menu"></Column>
                </DefaultTable>
            </div>
        </div>
    </AuthLayout>
</template>
<script setup>
import { Head, router, usePage } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/AuthLayout.vue";
import HeaderModule from "../../Modules/Others/HeaderModule.vue";
import DefaultTable from "../../Components/tables/DefaultTable.vue";
import ToolbarModule from "../../Modules/Others/ToolbarModule.vue";
import { ref } from "vue";
import { IconCategory } from "@tabler/icons-vue";

const page = usePage();
const searchInput = ref(null);
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
