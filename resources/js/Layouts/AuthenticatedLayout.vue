<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import MobileMenu from "@/GlobalComponent/MobileMenu.vue";
import HamburgerIcon from "@/Icons/HamburgerIcon.vue";
import MenuLinks from "@/GlobalComponent/Menu.vue";
import MenuProfile from "@/GlobalComponent/MenuProfile.vue";
import Footer from "@/GlobalComponent/Footer.vue";

const showNav = ref(false);
</script>

<template>
    <div>
        <div
            class="min-h-screen bg-gray-100 dark:bg-gradient-to-t dark:from-sky-800 dark:to-sky-900"
        >
            <nav
                class="bg-white dark:bg-sky-800 border-b border-gray-100 dark:border-gray-700"
            >
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                                    />
                                </Link>
                            </div>

                            <MenuLinks />
                        </div>

                        <MenuProfile />

                        <!-- HamburgerIcon -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showNav = !showNav"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                            >
                                <HamburgerIcon :show="showNav" />
                            </button>
                        </div>
                        <!-- /HamburgerIcon -->
                    </div>
                </div>

                <!-- Responsive Menu -->
                <div
                    :class="{
                        block: showNav,
                        hidden: !showNav,
                    }"
                    class="sm:hidden animate-fade-in-down"
                >
                    <MobileMenu />
                </div>
                <!-- /Responsive Menu -->
            </nav>

            <header
                class="bg-white dark:bg-gray-800 shadow"
                v-if="$slots.header"
            >
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <main>
                <section class="py-12">
                    <div
                        class="max-w-7xl mx-auto p-3 sm:px-6 lg:px-8 sm:py-6 lg:py-8 bg-white dark:bg-sky-800 shadow-lg rounded-lg"
                    >
                        <slot />
                    </div>
                </section>
            </main>
        </div>
    </div>

    <Footer />
</template>
