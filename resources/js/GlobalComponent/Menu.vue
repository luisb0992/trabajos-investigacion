<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>
<template>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <NavLink
            :href="route('dashboard')"
            :active="route().current('dashboard')"
        >
            Inicio
        </NavLink>
        <NavLink
            :href="route('users.index')"
            :active="
                route().current('users.index') ||
                route().current('users.create')
            "
            v-if="$page.props.roles.is_admin"
        >
            Usuarios
        </NavLink>
        <NavLink
            :href="route('investigation-works.index')"
            :active="
                route().current('investigation-works.index') ||
                route().current('investigation-works.create')
            "
            v-if="$page.props.roles.is_admin || $page.props.roles.is_user"
        >
            Productos
        </NavLink>
    </div>
</template>
