<template>
    <DataTable
        :value="items"
        paginator
        :rows="pagination.perPage"
        :totalRecords="pagination.total"
        removableSort
        :lazy="true"
        :first="(pagination.currentPage - 1) * pagination.perPage"
        :loading="loading"
        @page="onPageChange"
        responsiveLayout="scroll"
        :showGridlines="grid"
        class="bg-transparent"
        :pt="{
            root: {
                class: '!text-sm ',
            },
            headerRow: {
                class: '!text-xs !font-bold !text-blue-300',
            },
            pcPaginator: {
                root: 'dark:!bg-transparent ',
            },
            tableContainer: {
                class: ' border-t border-x rounded-xl !border-gray-200 dark:!border-gray-700 ',
            },
            bodycell: {
                class: 'dark:!border-gray-700',
            },
            column: {
                root: { class: 'dark:!border-gray-700 dark:text-gray-300' },
            },
            bodyRow: {
                class: '!bg-transparent dark:!border-gray-700',
            },
        }"
    >
        <slot></slot>

        <template #paginatorstart>
            <div class="text-gray-500 text-sm">
                Showing
                <span class="font-semibold">{{
                    (pagination.currentPage - 1) * pagination.perPage + 1
                }}</span>
                to
                <span class="font-semibold">{{
                    Math.min(
                        pagination.currentPage * pagination.perPage,
                        pagination.total
                    )
                }}</span>
                of
                <span class="font-semibold">{{ pagination.total }}</span>
                entries
            </div>
        </template>
        <template #empty>
            <div class="flex justify-center font-semibold items-center gap-2">
                <IconZoomExclamation class="text-slate-400" />
                <div>No records available.</div>
            </div>
        </template>
    </DataTable>
</template>

<script setup>
import { IconZoomExclamation } from "@tabler/icons-vue";
import { defineProps, defineEmits } from "vue";

const props = defineProps({
    items: [Array, Object],
    pagination: Object,
    loading: Boolean,
    grid: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(["paginate"]);

function onPageChange(event) {
    const page = event.page + 1;
    emit("paginate", page);
}
</script>

<style scoped>
::v-deep(.p-paginator) {
    justify-content: right;
}

::v-deep(.p-paginator .p-paginator-page),
::v-deep(.p-paginator .p-paginator-first),
::v-deep(.p-paginator .p-paginator-prev),
::v-deep(.p-paginator .p-paginator-next),
::v-deep(.p-paginator .p-paginator-last) {
    border-radius: 10px !important;
    padding: 0.5rem 0.75rem;
}

::v-deep(.p-datatable-paginator-bottom) {
    margin-top: 1rem;
    border: none !important;
}

::v-deep(.p-paginator-current) {
    order: -1;
    margin-right: 1rem !important;
    display: block;
}
::v-deep(.p-datatable-header-cell) {
    background-color: transparent !important;
}
::v-deep(.p-datatable-column-header-content) {
    &:where(.dark, .dark *) {
        color: #d1d1d1;
    }
}
/* ::v-deep(.p-datatable-tbody) {
    background-color: transparent !important;
} */
</style>
