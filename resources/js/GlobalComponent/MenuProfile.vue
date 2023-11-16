<script setup>
import { user } from "@/Util/auth";
import DropdownLink from "@/Components/DropdownLink.vue";
import CarretIcon from "@/Icons/CarretIcon.vue";
import Dropdown from "@/Components/Dropdown.vue";
</script>
<template>
    <div class="hidden sm:flex sm:items-center sm:ms-6">
        <div class="ms-3 relative">
            <Dropdown align="right" width="48">
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button
                            type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-100 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                        >
                            {{ user.name }}

                            <CarretIcon />
                        </button>
                    </span>
                </template>

                <template #content>
                    <DropdownLink :href="route('profile.edit')">
                        Mis datos
                    </DropdownLink>
                    <DropdownLink
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Cerrar sesión
                    </DropdownLink>
                </template>
            </Dropdown>
        </div>
    </div>
</template>
