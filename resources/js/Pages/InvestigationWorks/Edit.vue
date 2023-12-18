<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import useUpdateInvestigationWork from "./composables/useUpdateInvestigationWork";
import WorkForm from "./partials/WorkForm.vue";

const {
    form,
    areas,
    lines,
    update,
    searchArea,
    searchLine,
    authors,
    addAuthor,
    removeAuthor,
    loading,
} = useUpdateInvestigationWork();
</script>

<template>
    <Head title="Actualizar Proyecto" />
    <AuthenticatedLayout>
        <WorkForm
            :areas="areas"
            :lines="lines"
            :authors="authors"
            :form="form"
            :loading="loading"
            :search-line="searchLine"
            :search-area="searchArea"
            :add-author="addAuthor"
            :remove-author="removeAuthor"
            @submit.prevent="update"
        />
    </AuthenticatedLayout>
</template>
