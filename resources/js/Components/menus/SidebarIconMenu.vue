<template>
    <TieredMenu
        :model="list"
        class="flex-1 !bg-transparent !min-w-1 z-1000 !border-0"
        :pt="{
            submenu: { class: '!min-w-[200px] dark:!bg-gray-600 !border-0' },
            separator: {
                class: 'my-2 !border-gray-400 dark:border-gray-600',
            },
        }"
    >
        <template #item="{ item }">
            <Link
                v-if="item.route"
                :href="item.route"
                :class="[
                    'flex items-center gap-3 px-[0.7rem] py-[10px] rounded hover:text-blue-600 w-full dark:text-white',
                    page.url === item.route
                        ? ' text-blue-600 dark:!text-blue-400 font-semibold'
                        : '',
                ]"
                v-tooltip.top="item.subItem ? '' : item.label"
            >
                <component
                    :is="item.icons"
                    :size="item.subItem ? '20px' : '23px'"
                    :stroke-width="1.5"
                />
                <span class="text-[12px]" v-if="item.subItem">{{
                    item.label
                }}</span>
            </Link>
            <a
                v-ripple
                :class="[
                    'flex items-center py-[10px] px-[0.7rem] !bg-transparent hover:text-blue-600 cursor-pointer dark:text-white',
                    active === item.active
                        ? ' text-blue-600 dark:!text-blue-400 font-semibold'
                        : '',
                ]"
                v-else
                v-tooltip.top="item.label"
            >
                <component
                    :is="item.icons"
                    :size="item.subItem ? '20px' : '23px'"
                    :stroke-width="1.5"
                />
            </a>
        </template>
    </TieredMenu>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();

const active = page.component.split("/")[0];
const componentActive = page.url;
defineProps({
    list: {
        required: true,
        type: Array,
    },
});
</script>
