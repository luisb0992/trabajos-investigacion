<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
// import { useToast } from "primevue/usetoast";

import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Toolbar from "primevue/toolbar";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import LinkDefault from "@/Components/LinkDefault.vue";
import useIndex from "./composables/useIndex";

const { filters, items, confirmDeleteItem, loading } = useIndex();
</script>

<template>
    <Head title="Trabajos de investigación" />

    <AuthenticatedLayout>
        <section class="flex flex-col gap-3">
            <div>
                <Toolbar class="mb-4 bg-gray-600">
                    <template #start>
                        <LinkDefault
                            :href="route('investigation-works.create')"
                        >
                            <span class="pi pi-plus"></span>
                            Nuevo Trabajo
                        </LinkDefault>
                    </template>

                    <template #end>
                        <Button
                            label="Export"
                            icon="pi pi-upload"
                            severity="help"
                            @click=""
                        />
                    </template>
                </Toolbar>

                <DataTable
                    ref="dt"
                    :value="items"
                    dataKey="id"
                    :paginator="true"
                    :rows="10"
                    :filters="filters"
                    :loading="loading"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Mostrando {first} a {last} de {totalRecords} trabajos"
                >
                    <template #header>
                        <div
                            class="flex flex-wrap gap-2 items-center justify-between"
                        >
                            <h3 class="m-0">Trabajos de investigación</h3>
                            <span class="p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText
                                    v-model="filters['global'].value"
                                    placeholder="Buscar..."
                                    class="w-44 md:w-full"
                                />
                            </span>
                        </div>
                    </template>

                    <Column
                        field="title"
                        header="Título"
                        sortable
                        style="min-width: 12rem"
                    ></Column>
                    <Column
                        field="authors"
                        header="Autores"
                        sortable
                        style="min-width: 16rem"
                    >
                        <template #body="slotProps">
                            <ul class="list-disc list-inside">
                                <li
                                    v-for="author in slotProps.data.authors"
                                    :key="author.id"
                                >
                                    {{ author.firstname }} {{ author.lastname }}
                                </li>
                            </ul>
                        </template>
                    </Column>
                    <Column
                        field="area.name"
                        header="Area o Centro"
                        sortable
                        style="min-width: 10rem"
                    ></Column>
                    <Column
                        field="line.name"
                        header="Linea de investigación"
                        sortable
                        style="min-width: 10rem"
                    ></Column>
                    <Column
                        field="file"
                        header="Archivo"
                        sortable
                        style="min-width: 10rem"
                    ></Column>
                    <Column :exportable="false" style="min-width: 10rem">
                        <template #body="slotProps">
                            <div class="flex gap-3">
                                <LinkDefault
                                    :href="
                                        route(
                                            'investigation-works.edit',
                                            slotProps.data.id
                                        )
                                    "
                                    class="bg-transparent border border-solid rounded-full dark:rounded-full dark:border-yellow-600 text-yellow-500 border-yellow-500 hover:border-yellow-600 hover:text-yellow-600 hover:bg-transparent"
                                >
                                    <span class="pi pi-pencil"></span>
                                </LinkDefault>
                                <Button
                                    icon="pi pi-trash"
                                    outlined
                                    rounded
                                    severity="danger"
                                    @click="
                                        confirmDeleteItem(slotProps.data.id)
                                    "
                                />
                            </div>
                        </template>
                    </Column>
                </DataTable>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
