<script setup>
import InputText from "primevue/inputtext";
import AutoComplete from "primevue/autocomplete";
import Button from "primevue/button";
import Textarea from "primevue/textarea";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Checkbox from "primevue/checkbox";
import InputNumber from "primevue/inputnumber";

import { aspects, items } from "@/Util/const.js";
import SectionActivities from "./scheduleActivities/SectionActivities.vue";

const props = defineProps({
    title: {
        type: String,
        default: "Nueva Tesis doctoral",
    },
    form: {
        type: Object,
        required: true,
    },
    areas: {
        type: Array,
        required: true,
    },
    types: {
        type: Array,
        required: true,
    },
    statuses: {
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
    searchStatus: {
        type: Function,
        required: true,
    },
    searchType: {
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
    assignActivity: {
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
        <section id="project" class="flex flex-col gap-3">
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
                <label for="title" class="text-lg font-semibold"
                    >Ubicación</label
                >
                <InputText
                    id="title"
                    v-model="form.location"
                    aria-describedby="title-help"
                />
                <small id="title-help">
                    Ubicación Geográfica Del Proyecto
                </small>
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
                <label for="line" class="text-lg font-semibold">
                    Tipo de proyecto
                </label>
                <AutoComplete
                    dropdown
                    v-model="form.type"
                    :suggestions="types"
                    @complete="searchType"
                    placeholder="Seleccione un tipo"
                    optionLabel="name"
                    @change="form.type.id = $event.value.id"
                >
                    <template #option="p">
                        {{ p.option.name }}
                    </template>
                </AutoComplete>
                <small id="title-help"> Tipo de proyecto. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="line" class="text-lg font-semibold">
                    Estatus del proyecto
                </label>
                <AutoComplete
                    dropdown
                    v-model="form.status"
                    :suggestions="statuses"
                    @complete="searchStatus"
                    placeholder="Seleccione un estatus"
                    optionLabel="name"
                    @change="form.status.id = $event.value.id"
                >
                    <template #option="p">
                        {{ p.option.name }}
                    </template>
                </AutoComplete>
                <small id="title-help"> Estatus del proyecto. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="es_summary" class="text-lg font-semibold">
                    Resumen en español
                </label>
                <Textarea
                    v-model="form.es_summary"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="es_summary"> Resumen en español. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="en_summary" class="text-lg font-semibold">
                    Resumen en ingles
                </label>
                <Textarea
                    v-model="form.en_summary"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="en_summary"> Resumen en ingles. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="approach" class="text-lg font-semibold">
                    Planteamiento del proyecto
                </label>
                <Textarea
                    v-model="form.approach"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="approach"> Planteamiento del proyecto. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="justification" class="text-lg font-semibold">
                    Justificación del proyecto
                </label>
                <Textarea
                    v-model="form.justification"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="justification"> Justificación del proyecto. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="background" class="text-lg font-semibold">
                    Antecedentes del proyecto
                </label>
                <Textarea
                    v-model="form.background"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="background"> Antecedentes del proyecto. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="general_objective" class="text-lg font-semibold">
                    Objetivos generales del proyecto
                </label>
                <Textarea
                    v-model="form.general_objective"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="general_objective">
                    Objetivos generales del proyecto.
                </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="specific_objective" class="text-lg font-semibold">
                    Objetivos específicos del proyecto
                </label>
                <Textarea
                    v-model="form.specific_objective"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="specific_objective">
                    Objetivos específicos del proyecto.
                </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="expected_results" class="text-lg font-semibold">
                    Resultados esperados del proyecto
                </label>
                <Textarea
                    v-model="form.expected_results"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="expected_results">
                    Resultados esperados del proyecto.
                </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="methodology" class="text-lg font-semibold">
                    Metodologías del proyecto
                </label>
                <Textarea
                    v-model="form.methodology"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="methodology"> Metodologías del proyecto. </small>
            </div>
        </section>

        <section id="authors">
            <div class="flex flex-col gap-2">
                <h3 class="text-xl font-semibold">Autores</h3>
                <div
                    v-for="(author, index) in authors"
                    :key="index"
                    class="flex flex-col md:flex-row justify-start gap-3 animate-fade-in-down"
                >
                    <span class="p-float-label flex flex-col gap-2 w-full md:w-36">
                        <InputText v-model="author.dni" id="cedula" />
                        <!-- <label for="cedula">Cédula</label> -->
                        <small id="cedula-help"> Cédula del autor. </small>
                    </span>
                    <span class="p-float-label flex flex-col gap-2 w-full md:w-36">
                        <InputText v-model="author.name" id="name" />
                        <!-- <label for="name">Nombre</label> -->
                        <small id="name-help"> Nombre del autor. </small>
                    </span>
                    <span class="p-float-label flex flex-col gap-2 w-full md:w-36">
                        <InputText v-model="author.lastname" id="lastname" />
                        <!-- <label for="lastname">Apellido</label> -->
                        <small id="lastname-help"> Apellido del autor. </small>
                    </span>
                    <span class="p-float-label flex flex-col gap-2 w-full md:w-36">
                        <InputText v-model="author.email" id="lastname" />
                        <!-- <label for="email">Correo</label> -->
                        <small id="email-help"> Email del autor. </small>
                    </span>
                    <span class="p-float-label flex flex-col gap-2 w-full md:w-36">
                        <InputText v-model="author.phone" id="lastname" />
                        <!-- <label for="phone">Teléfono</label> -->
                        <small id="phone-help"> Teléfono del autor. </small>
                    </span>
                    <span class="p-float-label flex flex-col gap-2 w-full md:w-36">
                        <InputText
                            v-model="author.level_instruction"
                            id="lastname"
                        />
                        <!-- <label for="level_instruction">Nivel de instrucción</label> -->
                        <small id="level_instruction-help">
                            Nivel de instrucción del autor.
                        </small>
                    </span>
                    <span class="p-float-label flex flex-col gap-2 w-full md:w-36">
                        <InputText v-model="author.address" id="lastname" />
                        <!-- <label for="address">Dirección</label> -->
                        <small id="address-help"> Dirección del autor. </small>
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
        </section>

        <section id="plan" class="flex flex-col gap-3">
            <h3 class="text-xl font-semibold">Plan de la patria</h3>
            <div class="flex flex-col gap-2">
                <label for="plan" class="text-lg font-semibold">
                    Plan de la patria
                </label>
                <Textarea
                    v-model="form.homeland_plans"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="plan"> Plan de la patria. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="bibliography" class="text-lg font-semibold">
                    Bibliografía
                </label>
                <Textarea
                    v-model="form.bibliography"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="bibliography"> Bibliografía. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label
                    for="historical_objectives"
                    class="text-lg font-semibold"
                >
                    Objetivos Históricos
                </label>
                <Textarea
                    v-model="form.historical_objectives"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="historical_objectives">
                    Objetivos Históricos.
                </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="national_objectives" class="text-lg font-semibold">
                    Objetivos Nacionales
                </label>
                <Textarea
                    v-model="form.national_objectives"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="national_objectives"> Objetivos Nacionales. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="strategic_objectives" class="text-lg font-semibold">
                    Objetivos Estratégicos
                </label>
                <Textarea
                    v-model="form.strategic_objectives"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="strategic_objectives">
                    Objetivos Estratégicos.
                </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="general_objectives" class="text-lg font-semibold">
                    Objetivos Generales
                </label>
                <Textarea
                    v-model="form.general_objectives"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="general_objectives"> Objetivos Generales. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label
                    for="relationship_objectives"
                    class="text-lg font-semibold"
                >
                    Relación con los objetivos del plan
                </label>
                <Textarea
                    v-model="form.relationship_objectives"
                    autoResize
                    rows="5"
                    cols="30"
                />
                <small id="relationship_objectives">
                    Relación con los objetivos del plan.
                </small>
            </div>
        </section>

        <SectionActivities :assign-activity="assignActivity" />

        <section id="ethics">
            <h3 class="text-xl font-semibold">Aspectos éticos</h3>
            <small>
                En esta sección deberá seleccionar cada uno de los siguientes
                aspectos éticos de su proyecto
            </small>

            <div class="py-2">
                <DataTable :value="aspects" tableStyle="min-width: 50rem">
                    <Column field="id" header="#"></Column>
                    <Column
                        field="norma"
                        header="Norma del Código Bioetica"
                    ></Column>
                    <Column field="select" header="Selección">
                        <template #body="p">
                            <div class="flex justify-center">
                                <div class="p-field-checkbox">
                                    <Checkbox
                                        v-model="p.data.select"
                                        binary="true"
                                        style="transform: scale(2)"
                                        @change="
                                            form.aspects[p.data.id] =
                                                p.data.select
                                        "
                                    />
                                </div>
                            </div>
                        </template>
                    </Column>
                </DataTable>
            </div>
        </section>

        <section id="items" class="flex flex-col gap-3">
            <h3 class="text-xl font-semibold">Rubros</h3>
            <small>En caso que aplique solicitud de rubros.</small>

            <div class="py-2">
                <DataTable :value="items" tableStyle="min-width: 50rem">
                    <Column field="name" header="Rubro"></Column>
                    <Column
                        field="amount"
                        header="Monto en bs"
                        class="text-center"
                    >
                        <template #body="p">
                            <div class="flex justify-center">
                                <div class="p-field-checkbox">
                                    <InputNumber
                                        v-model="p.data.amount"
                                        :maxFractionDigits="2"
                                        @update:model-value="
                                            form.items[p.data.id] =
                                                p.data.amount
                                        "
                                    />
                                </div>
                            </div>
                        </template>
                    </Column>
                </DataTable>
            </div>
        </section>

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
