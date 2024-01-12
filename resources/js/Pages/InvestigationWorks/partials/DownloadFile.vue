<script setup>
import { categories } from "@/Util/const";

const props = defineProps({
    data: {
        type: Object,
    },
    pathInvWork: {
        type: String,
    },
});

// sacar las categorias
const PROJECT = categories.value[0].id;
const DEGREE_WORK = categories.value[1].id;
const DOCTORAL_THESIS = categories.value[2].id;
const PRODUCTIVE_PARTNER = categories.value[3].id;
const SCIENTIFIC_ARTICLE = categories.value[4].id;
</script>
<template>
    <div
        v-if="
            PROJECT === data.category_id ||
            SCIENTIFIC_ARTICLE === data.category_id
        "
    >
        <a
            :href="pathInvWork + '/' + data.file"
            class="inline-flex justify-start items-center p-4 bg-transparent border border-solid rounded-full dark:rounded-full dark:border-blue-600 text-blue-500 border-blue-500 hover:border-blue-600 hover:text-blue-600 hover:bg-blue-300 transition duration-200 ease-in-out"
            target="_blank"
            noopener="true"
            :download="data.file"
            v-if="data.file"
        >
            <span class="pi pi-download"></span>
        </a>
    </div>

    <div v-else>
        <a
            :href="route('investigation-works.downloadFile', data.id)"
            class="inline-flex justify-start items-center p-4 bg-transparent border border-solid rounded-full dark:rounded-full dark:border-sky-600 text-sky-500 border-sky-500 hover:border-sky-600 hover:text-sky-600 hover:bg-sky-300 transition duration-200 ease-in-out"
            target="_blank"
            noopener="true"
            :download="data.file"
        >
            <span class="pi pi-download"></span>
        </a>
    </div>
</template>
