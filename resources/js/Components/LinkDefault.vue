<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
});

const classes = computed(
    () =>
        "inline-flex gap-1 items-center p-4 bg-sky-800 hover:bg-sky-700 border-sky-800 dark:border-sky-900 text-sm font-medium leading-5 text-gray-100 focus:outline-none focus:border-sky-900 transition duration-150 ease-in-out rounded-md"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
