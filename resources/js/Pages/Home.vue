<script setup>
import { Head } from "@inertiajs/vue3";
import HeaderHome from "@/GlobalComponent/HeaderHome.vue";
import Footer from "@/GlobalComponent/Footer.vue";
import Body from "@/Components/Home/Body.vue";
</script>

<template>
    <Head title="Inicio" />

    <main
        class="bg-center bg-gray-100 dark:bg-gradient-to-t dark:from-sky-800 dark:to-sky-900 selection:bg-blue-400 selection:text-white min-h-screen"
    >
        <HeaderHome />

        <Body />
    </main>

    <Footer />
</template>
