<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Button from "primevue/button";
import useDownloadFile from "./composables/useDownloadFile.js";
import Header from "./partials/downloadFile/Header.vue";
import {
    aspects,
    categories,
    projectStatus,
    projectTypes,
    items,
    quarters,
    activities,
} from "@/Util/const";

const { work, downloadFile, showActivities } = useDownloadFile();
</script>
<template>
    <Head title="Descargar archivo" />

    <AuthenticatedLayout>
        <section class="flex flex-col gap-3" id="data_table">
            <Header />

            <h3 class="text-center leading-5 text-base font-bold mb-3">
                PROYECTO DE INVESTIGACIÓN E INNOVACIÓN UNERG
            </h3>

            <div id="authors">
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Datos de los participantes
                    </caption>
                    <thead class="text-sm text-nowrap text-left">
                        <tr>
                            <th class="pb-3 pl-2">Cédula</th>
                            <th class="pb-3 pl-2">Nombre completo</th>
                            <th class="pb-3 pl-2">Dirección</th>
                            <th class="pb-3 pl-2">Teléfono</th>
                            <th class="pb-3 pl-2">Email</th>
                            <th class="pb-3 pl-2">Nivel de instrucción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b border-gray-300 text-sm"
                            v-for="author in work.authors"
                            :key="author.id"
                        >
                            <td class="px-2 pb-4">{{ author.dni ?? "---" }}</td>
                            <td class="px-2 pb-4">
                                {{ author.firstname + " " + author.lastname }}
                            </td>
                            <td class="px-2 pb-4">
                                {{ author.address ?? "---" }}
                            </td>
                            <td class="px-2 pb-4">
                                {{ author.phone ?? "---" }}
                            </td>
                            <td class="px-2 pb-4">
                                {{ author.email ?? "---" }}
                            </td>
                            <td class="px-2 pb-4">
                                {{ author.level_instruction ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="project" class="mt-3">
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Datos del proyecto
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="font-bold px-2 pb-4">
                                Categoria del proyecto
                            </td>
                            <td class="px-2 pb-4">
                                {{
                                    categories[work.category_id]?.name ?? "---"
                                }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="font-bold px-2 pb-4">
                                Tipo de proyecto
                            </td>
                            <td class="px-2 pb-4">
                                {{
                                    projectTypes.find((t) => t.id === work.type)
                                        ?.name ?? "---"
                                }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="font-bold px-2 pb-4">
                                Estado del proyecto
                            </td>
                            <td class="px-2 pb-4">
                                {{
                                    projectStatus.find(
                                        (s) => s.id === work.status
                                    )?.name ?? "---"
                                }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="font-bold px-2 pb-4">
                                Linea de investigación
                            </td>
                            <td class="px-2 pb-4">
                                {{ work.line?.name ?? "---" }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="font-bold px-2 pb-4">Area o centro</td>
                            <td class="px-2 pb-4">
                                {{ work.area?.name ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Título del proyecto
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.title ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Ubicación Geográfica del Proyecto
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.location ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Resumen del Proyecto
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                <p class="font-bold">Español</p>
                                {{ work.es_summary ?? "---" }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                <p class="font-bold">Ingles</p>
                                {{ work.en_summary ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Planteamiento del Proyecto
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.approach ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Justificación del proyecto
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.justification ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Antecedentes del proyecto
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.background ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Objetivo General
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.general_objective ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Objetivos Específicos
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.specific_objective ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Resultados Esperados
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.expected_results ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Metodología
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.methodology ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="bibliography" class="mt-3">
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        BIBLIOGRAFÍA
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{ work.bibliography ?? "---" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="homeland" class="mt-3">
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        PLAN DE LA PATRIA
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{
                                    work.homeland_plan?.homeland_plans ?? "---"
                                }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        OBJETIVOS HISTÓRICOS
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{
                                    work.homeland_plan?.historical_objectives ??
                                    "---"
                                }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        OBJETIVOS NACIONALES
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{
                                    work.homeland_plan?.national_objectives ??
                                    "---"
                                }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        OBJETIVOS ESTRATÉGICOS
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{
                                    work.homeland_plan?.strategic_objectives ??
                                    "---"
                                }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        OBJETIVOS GENERALES
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{
                                    work.homeland_plan?.general_objectives ??
                                    "---"
                                }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        RELACIÓN CON LOS OBJETIVOS DEL PLAN DE LA PATRIA
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4">
                                {{
                                    work.homeland_plan
                                        ?.relationship_objectives ?? "---"
                                }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="activities" class="mt-3">
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Cronograma de actividades
                    </caption>
                    <thead class="text-sm text-nowrap">
                        <tr>
                            <th class="pb-3">#</th>
                            <th class="pb-3">Actividad</th>
                            <th class="pb-3">
                                <div class="flex flex-col">
                                    <p class="mb-2">Meses del año</p>
                                    <div class="flex justify-start gap-8">
                                        <p
                                            class="uppercase text-xs font-semibold"
                                        >
                                            {{ quarters.one }}
                                        </p>
                                        <p
                                            class="uppercase text-xs font-semibold"
                                        >
                                            {{ quarters.two }}
                                        </p>
                                        <p
                                            class="uppercase text-xs font-semibold"
                                        >
                                            {{ quarters.three }}
                                        </p>
                                        <p
                                            class="uppercase text-xs font-semibold"
                                        >
                                            {{ quarters.four }}
                                        </p>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b border-gray-300"
                            v-for="act in activities"
                            :key="act.id"
                        >
                            <td class="px-2 pb-4">
                                {{ act.id }}
                            </td>
                            <td class="px-2 pb-4">
                                {{ act.activity }}
                            </td>
                            <td class="px-2 pb-4">
                                <div
                                    class="flex gap-5 justify-start"
                                    v-html="
                                        showActivities(
                                            work.schedule_activity[act.value]
                                        )
                                    "
                                ></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="aspects" class="mt-3">
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        Aspectos éticos
                    </caption>
                    <thead class="text-sm text-nowrap">
                        <tr>
                            <th class="pb-3">Norma del código de bioética</th>
                            <th class="pb-3">Selección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b border-gray-300"
                            v-for="aspect in aspects"
                            :key="aspect.id"
                        >
                            <td class="px-2 pb-4">
                                {{ aspect.norma }}
                            </td>
                            <td class="px-2 pb-4">
                                {{
                                    work.ethical_aspect[aspect.value]
                                        ? "SI"
                                        : "NO"
                                }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="items" class="mt-3">
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        DATOS GENERALES DE RUBROS
                    </caption>
                    <thead class="text-sm text-nowrap">
                        <tr>
                            <th class="pb-3">Rubro</th>
                            <th class="pb-3">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b border-gray-300"
                            v-for="item in items"
                            :key="item.id"
                        >
                            <td class="px-2 pb-4">
                                {{ item.name }}
                            </td>
                            <td class="px-2 pb-4">
                                {{ work.item_service[item.value] ?? "0.00" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <div class="flex justify-end mt-5">
            <Button
                label="Imprimir pdf"
                icon="pi pi-download"
                severity="help"
                @click="downloadFile"
            />
        </div>
    </AuthenticatedLayout>
</template>
