<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import useUpdate from "@/Pages/Users/composables/useUpdate.js";
import Form from "@/Pages/Users/partials/Form.vue";

const { form, roles, loading, searchRole, update } = useUpdate();
</script>

<template>
    <Head title="Actualizar datos de usuario" />

    <AuthenticatedLayout>
        <Form
            @submit.prevent="update"
            :form="form"
            :roles="roles"
            :loading="loading"
            :is-update="true"
            title="Actualizar datos de usuario"
            button-label="Actualizar"
            :searchRole="searchRole"
        />
    </AuthenticatedLayout>
</template>
