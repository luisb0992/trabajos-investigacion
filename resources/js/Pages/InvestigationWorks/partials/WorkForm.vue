<script setup>
import InputText from "primevue/inputtext";
import AutoComplete from "primevue/autocomplete";
import Button from "primevue/button";

const props = defineProps({
    title: {
        type: String,
        default: "Nuevo Proyecto",
    },
    form: {
        type: Object,
        required: true,
    },
    areas: {
        type: Array,
        required: true,
    },
    lines: {
        type: Array,
        required: true,
    },
    searchArea: {
        type: Function,
        required: true,
    },
    searchLine: {
        type: Function,
        required: true,
    },
    authors: {
        type: Array,
        required: true,
    },
    addAuthor: {
        type: Function,
        required: true,
    },
    removeAuthor: {
        type: Function,
        required: true,
    },
    loading: {
        type: Boolean,
        required: true,
    },
});
</script>
<template>
    <form class="flex flex-col gap-3 text-gray-800 dark:text-gray-300">
        <h3 class="text-2xl leading-7 text-center md:text-left">
            {{ title }}
        </h3>
        <hr class="border-gray-300" />
        <div class="flex flex-col gap-2">
            <label for="title" class="text-lg font-semibold">Título</label>
            <InputText
                id="title"
                v-model="form.title"
                aria-describedby="title-help"
            />
            <small id="title-help"> El título del proyecto. </small>
        </div>
        <div class="flex flex-col gap-2">
            <label for="area" class="text-lg font-semibold">
                Área o centro
            </label>
            <AutoComplete
                dropdown
                v-model="form.area"
                :suggestions="areas"
                @complete="searchArea"
                placeholder="Seleccione un área"
                optionLabel="name"
                @change="form.area_id = $event.value.id"
            >
                <template #option="slotProps">
                    {{ slotProps.option.name }}
                </template>
            </AutoComplete>
            <small id="title-help"> Area o centro de investigación. </small>
        </div>
        <div class="flex flex-col gap-2">
            <label for="line" class="text-lg font-semibold">
                Linea de investigación
            </label>
            <AutoComplete
                dropdown
                v-model="form.line"
                :suggestions="lines"
                @complete="searchLine"
                placeholder="Seleccione una linea de investigación"
                optionLabel="name"
                @change="form.line_id = $event.value.id"
            >
                <template #option="slotProps">
                    {{ slotProps.option.name }}
                </template>
            </AutoComplete>
            <small id="title-help"> La linea de investigación. </small>
        </div>
        <div class="flex flex-col gap-2">
            <label for="autor" class="text-lg font-semibold mb-3"> Autores </label>
            <div
                v-for="(author, index) in authors"
                :key="index"
                class="flex flex-col md:flex-row justify-start gap-3 animate-fade-in-down mb-5"
            >
                <span class="p-float-label flex flex-col gap-2">
                    <InputText v-model="author.dni" id="dni" />
                    <label for="dni">Cédula</label>
                    <small id="dni-help"> Cédula del autor. </small>
                </span>
                <span class="p-float-label flex flex-col gap-2">
                    <InputText v-model="author.name" id="name" />
                    <label for="name">Nombre</label>
                    <small id="name-help"> Nombre del autor. </small>
                </span>
                <span class="p-float-label flex flex-col gap-2">
                    <InputText v-model="author.lastname" id="lastname" />
                    <label for="lastname">Apellido</label>
                    <small id="lastname-help"> Apellido del autor. </small>
                </span>
                <Button
                    icon="pi pi-trash"
                    rounded
                    severity="danger"
                    @click="removeAuthor(index)"
                    v-if="authors.length > 1"
                />
                <Button
                    icon="pi pi-plus"
                    rounded
                    severity="info"
                    @click="addAuthor"
                    v-if="index === authors.length - 1"
                />
            </div>
        </div>
        <div class="flex flex-col">
            <label class="block font-semibold" for="file_input">
                Subir archivo
            </label>
            <input
                class="block w-full h-10 text-lg pt-1 pb-1 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-300 focus:outline-none dark:bg-sky-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help"
                id="file_input"
                type="file"
                accept="application/pdf"
                @change="form.file = $event.target.files[0]"
            />
            <p
                class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                id="file_input_help"
            >
                PDF (MAX. 10Mb).
            </p>
        </div>
        <div class="flex justify-end">
            <Button
                label="Guardar"
                icon="pi pi-save"
                class="w-32"
                type="submit"
                :disabled="loading"
                :class="{ 'opacity-25': loading }"
            />
        </div>
    </form>
</template>
