<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import InputText from "primevue/inputtext";
import AutoComplete from "primevue/autocomplete";

import useCreateInvestigationWork from "@/Pages/InvestigationWorks/composables/useCreateInvestigationWork.js";
import Button from "primevue/button";

// const {
//     form,
//     areas,
//     lines,
//     createInvestigationWork,
//     searchArea,
//     searchLine,
//     authors,
//     addAuthor,
//     removeAuthor,
//     loading,
// } = useCreateInvestigationWork();
</script>

<template>
    <Head title="Editar Trabajo de investigación" />

    <AuthenticatedLayout>
        <form
            class="flex flex-col gap-3 text-gray-800 dark:text-gray-300"
            @submit.prevent=""
        ></form>
    </AuthenticatedLayout>
</template>
