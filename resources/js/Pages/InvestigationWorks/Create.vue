<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import useCreateInvestigationWork from "@/Pages/InvestigationWorks/composables/useCreateInvestigationWork.js";
import Form from "@/Pages/InvestigationWorks/partials/Form.vue";

const {
    form,
    areas,
    lines,
    create,
    searchArea,
    searchLine,
    authors,
    addAuthor,
    removeAuthor,
    loading,
} = useCreateInvestigationWork();
</script>

<template>
    <Head title="Nuevo Trabajo de investigación" />

    <AuthenticatedLayout>
        <Form
            :areas="areas"
            :lines="lines"
            :authors="authors"
            :form="form"
            :loading="loading"
            :search-line="searchLine"
            :search-area="searchArea"
            :add-author="addAuthor"
            :remove-author="removeAuthor"
            @submit.prevent="create"
        />
    </AuthenticatedLayout>
</template>
