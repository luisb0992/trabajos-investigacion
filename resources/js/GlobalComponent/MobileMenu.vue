<script setup>
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { user } from "@/Util/auth";
</script>
<template>
    <section class="">
        <!-- links -->
        <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
            >
                Dashboard
            </ResponsiveNavLink>
        </div>
        <!-- /links -->

        <!-- profile -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div
                    class="font-medium text-base text-gray-800 dark:text-gray-200"
                >
                    {{ user.name }}
                </div>
                <div class="font-medium text-sm text-gray-500">
                    {{ user.email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <ResponsiveNavLink :href="route('profile.edit')">
                    Mis datos
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    :href="route('logout')"
                    method="post"
                    as="button"
                >
                    Cerrar sesión
                </ResponsiveNavLink>
            </div>
        </div>
    </section>
</template>
