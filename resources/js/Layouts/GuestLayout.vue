<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-center bg-gray-100 dark:bg-gradient-to-t dark:from-sky-800 dark:to-sky-900 selection:bg-blue-400 selection:text-white"
    >
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
        >
            <Link href="/" class="flex justify-center">
                <ApplicationLogo class="fill-current text-gray-500 py-5" />
            </Link>
            <slot />
        </div>
    </div>
</template>
