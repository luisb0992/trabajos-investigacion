<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import useCreateInvestigationWork from "@/Pages/InvestigationWorks/composables/useCreateInvestigationWork.js";
import WorkForm from "@/Pages/InvestigationWorks/partials/WorkForm.vue";
import DegreeWorkForm from "@/Pages/InvestigationWorks/partials/DegreeWorkForm.vue";
import SelectButton from "primevue/selectbutton";
import useWorkCategory from "./composables/useWorkCategory.js";
import DoctoralThesisForm from "./partials/DoctoralThesisForm.vue";
import ProductivePartnerForm from "./partials/ProductivePartnerForm.vue";
import ScientificArticleForm from "./partials/ScientificArticleForm.vue";

const {
    form,
    areas,
    lines,
    authors,
    loading,
    types,
    statuses,
    create,
    searchArea,
    searchLine,
    searchStatus,
    searchType,
    addAuthor,
    removeAuthor,
    assignActivity,
} = useCreateInvestigationWork();

const { categories, selectCategory } = useWorkCategory();
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
                @change="form.category_id = selectCategory?.id"
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
            :statuses="statuses"
            :types="types"
            :authors="authors"
            :form="form"
            :loading="loading"
            :search-line="searchLine"
            :search-area="searchArea"
            :search-status="searchStatus"
            :search-type="searchType"
            :add-author="addAuthor"
            :remove-author="removeAuthor"
            :assign-activity="assignActivity"
            @submit.prevent="create"
            v-if="selectCategory?.id === categories[1].id"
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
            :search-line="searchLine"
            :search-area="searchArea"
            :search-status="searchStatus"
            :search-type="searchType"
            :add-author="addAuthor"
            :remove-author="removeAuthor"
            :assign-activity="assignActivity"
            @submit.prevent="create"
            v-if="selectCategory?.id === categories[2].id"
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
            :search-line="searchLine"
            :search-area="searchArea"
            :search-status="searchStatus"
            :search-type="searchType"
            :add-author="addAuthor"
            :remove-author="removeAuthor"
            :assign-activity="assignActivity"
            @submit.prevent="create"
            v-if="selectCategory?.id === categories[3].id"
            class="animate-swing-in-top-fwd"
        />

        <ScientificArticleForm
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
            v-if="selectCategory?.id === categories[4].id"
            class="animate-swing-in-top-fwd"
        />
    </AuthenticatedLayout>
</template>
