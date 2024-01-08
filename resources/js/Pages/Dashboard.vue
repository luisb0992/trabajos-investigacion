<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SessionMessage from "@/Components/SessionMessage.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <SessionMessage />
        <section class="flex flex-col gap-3">
            <h3
                class="text-gray-900 dark:text-gray-300 text-xl md:text-5xl text-center leading-8 md:leading-[4rem]"
            >
                Bienvenidos al Sistema para la gestión administrativa y
                académica de los proyectos socio-productivos de la UNERG.
            </h3>

            <div class="relative">
                <div class="absolute inset-0 bg-gray-900/50"></div>
                <img
                    src="./../../images/dashboard/project-home.webp"
                    alt="project-home"
                    class="object-cover object-center w-full rounded-md"
                />
            </div>
        </section>
    </AuthenticatedLayout>
</template>
