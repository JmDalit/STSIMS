<template>
    <TreeTable
        :value="items"
        :pt="{
            root: {
                class: '!text-sm ',
            },
            headerRow: {
                class: '!text-xs !font-bold !text-blue-300 ',
            },
            pcPaginator: {
                root: 'dark:!bg-transparent ',
            },
            tableContainer: {
                class: ' border-t border-x rounded-xl !border-gray-200 dark:!border-gray-700 ',
            },
            bodycell: {
                class: 'dark:!border-gray-700 ',
            },
            column: {
                root: {
                    class: 'dark:!border-gray-700 dark:text-gray-300',
                },
            },
            bodyRow: {
                class: '!bg-transparent dark:!border-gray-700',
            },
        }"
    >
        <slot></slot>
    </TreeTable>
</template>
<script setup>
defineProps({
    items: [Array, Object],
});
</script>
<style scoped>
::v-deep(.p-treetable-header-cell) {
    background-color: transparent !important;
}
::v-deep(.p-treetable-column-header-content) {
    &:where(.dark, .dark *) {
        color: #d1d1d1;
    }
}
::v-deep(.p-treetable-tbody > tr) {
    &:where(.dark, .dark *) {
        background-color: #d1d1d100 !important;
    }
}
</style>
admin
