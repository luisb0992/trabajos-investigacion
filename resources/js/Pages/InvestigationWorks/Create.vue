<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import useCreateInvestigationWork from "@/Pages/InvestigationWorks/composables/useCreateInvestigationWork.js";
import WorkForm from "@/Pages/InvestigationWorks/partials/WorkForm.vue";
import DegreeWorkForm from "@/Pages/InvestigationWorks/partials/DegreeWorkForm.vue";
import SelectButton from "primevue/selectbutton";
import useWorkCategory from "./composables/useWorkCategory.js";

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

const { categories, selectCategory, showForm } = useWorkCategory();
</script>

<template>
    <Head title="Nuevo Trabajo de investigación" />

    <AuthenticatedLayout>
        <section class="pb-10">
            <h3
                class="text-2xl leading-7 text-center md:text-left text-gray-800 dark:text-gray-300 pb-3"
            >
                Seleccione una categoría para continuar
            </h3>
            <SelectButton
                v-model="selectCategory"
                :options="categories"
                optionLabel="name"
                dataKey="id"
                aria-labelledby="custom"
                class="flex flex-col lg:flex-row gap-2"
                @change="showForm"
            >
                <template #option="p">
                    <span>{{ p.option.name }}</span>
                </template>
            </SelectButton>
        </section>

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
            @submit.prevent="create"
            v-if="selectCategory?.id === categories[0].id"
            class="animate-swing-in-top-fwd"
        />

        <DegreeWorkForm
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
            v-if="selectCategory?.id === categories[1].id"
            class="animate-swing-in-top-fwd"
        />
    </AuthenticatedLayout>
</template>
