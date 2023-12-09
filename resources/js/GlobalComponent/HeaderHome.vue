<script setup>
import { isUserLogged } from "@/Util/auth.js";
import { Link } from "@inertiajs/vue3";
import LogoUnerg from "./LogoUnerg.vue";
</script>

<template>
    <header
        class="text-gray-600 dark:text-gray-300 dark:bg-sky-800 bg-gray-300"
    >
        <section
            class="flex flex-wrap p-5 flex-col md:flex-row items-center max-w-7xl mx-auto"
        >
            <Link
                class="flex font-medium items-center justify-center text-gray-800 dark:text-gray-300 mb-4 md:mb-0 w-40"
                :href="route('home')"
            >
                <LogoUnerg/>
                <span
                    class="ml-3 text-xl dark:hover:text-white transition duration-150 ease-in"
                >
                    UNERG
                </span>
            </Link>
            <nav
                class="md:ml-auto flex flex-wrap items-center text-base justify-center"
            >
                <Link
                    v-if="isUserLogged"
                    :href="route('dashboard')"
                    class="font-semibold text-gray-800 dark:text-gray-300 hover:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 transition duration-150 ease-in"
                >
                    Dashboard
                </Link>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="font-semibold dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 transition duration-150 ease-in"
                    >
                        Iniciar sesión
                    </Link>

                    <!-- <Link
                        :href="route('register')"
                        class="ms-4 font-semibold dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 transition duration-150 ease-in"
                    >
                        Regístrate
                    </Link> -->
                </template>
            </nav>
        </section>
    </header>
</template>
