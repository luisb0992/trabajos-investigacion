<script setup>
import { Head } from "@inertiajs/vue3";
import { categories } from "@/Util/const";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import useUpdateInvestigationWork from "./composables/useUpdateInvestigationWork";
import WorkForm from "./partials/WorkForm.vue";
import DegreeWorkForm from "./partials/DegreeWorkForm.vue";
import DoctoralThesisForm from "./partials/DoctoralThesisForm.vue";
import ProductivePartnerForm from "./partials/ProductivePartnerForm.vue";
import ScientificArticleForm from "./partials/ScientificArticleForm.vue";

const {
    form,
    areas,
    lines,
    loading,
    authors,
    types,
    statuses,
    update,
    searchArea,
    searchLine,
    searchStatus,
    searchType,
    addAuthor,
    removeAuthor,
    assignActivity,
} = useUpdateInvestigationWork();
</script>

<template>
    <Head title="Actualizar Trabajo de investigación" />
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
            :title="'Categoria: ' + categories[0].name"
            @submit.prevent="update"
            class="animate-swing-in-top-fwd"
            v-if="form.category_id === categories[0].id"
        />

        <DegreeWorkForm
            :areas="areas"
            :lines="lines"
            :statuses="statuses"
            :types="types"
            :authors="authors"
            :form="form"
            :loading="loading"
            :title="'Categoria: ' + categories[1].name"
            :search-line="searchLine"
            :search-area="searchArea"
            :search-status="searchStatus"
            :search-type="searchType"
            :add-author="addAuthor"
            :remove-author="removeAuthor"
            :assign-activity="assignActivity"
            @submit.prevent="update"
            v-if="form.category_id === categories[1].id"
            class="animate-swing-in-top-fwd"
        />

        <DoctoralThesisForm
            :areas="areas"
            :lines="lines"
            :statuses="statuses"
            :types="types"
            :authors="authors"
            :form="form"
            :loading="loading"
            :title="'Categoria: ' + categories[2].name"
            :search-line="searchLine"
            :search-area="searchArea"
            :search-status="searchStatus"
            :search-type="searchType"
            :add-author="addAuthor"
            :remove-author="removeAuthor"
            :assign-activity="assignActivity"
            @submit.prevent="update"
            v-if="form.category_id === categories[2].id"
            class="animate-swing-in-top-fwd"
        />

        <ProductivePartnerForm
            :areas="areas"
            :lines="lines"
            :statuses="statuses"
            :types="types"
            :authors="authors"
            :form="form"
            :loading="loading"
            :title="'Categoria: ' + categories[3].name"
            :search-line="searchLine"
            :search-area="searchArea"
            :search-status="searchStatus"
            :search-type="searchType"
            :add-author="addAuthor"
            :remove-author="removeAuthor"
            :assign-activity="assignActivity"
            @submit.prevent="update"
            v-if="form.category_id === categories[3].id"
            class="animate-swing-in-top-fwd"
        />

        <ScientificArticleForm
            :areas="areas"
            :lines="lines"
            :authors="authors"
            :form="form"
            :loading="loading"
            :title="'Categoria: ' + categories[4].name"
            :search-line="searchLine"
            :search-area="searchArea"
            :add-author="addAuthor"
            :remove-author="removeAuthor"
            @submit.prevent="update"
            v-if="form.category_id === categories[4].id"
            class="animate-swing-in-top-fwd"
        />
    </AuthenticatedLayout>
</template>
