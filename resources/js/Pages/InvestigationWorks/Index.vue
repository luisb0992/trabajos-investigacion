<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Toolbar from "primevue/toolbar";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import LinkDefault from "@/Components/LinkDefault.vue";
import useIndex from "./composables/useIndex";
import DownloadFile from "./partials/DownloadFile.vue";

const {
    filters,
    items,
    loading,
    pathInvWork,
    dtworks,
    confirmDeleteItem,
    exportCSV,
} = useIndex();
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
                            Nuevo Producto
                        </LinkDefault>
                    </template>

                    <template #end>
                        <Button
                            label="Exportar datos"
                            icon="pi pi-download"
                            severity="help"
                            @click="exportCSV($event)"
                        />
                    </template>
                </Toolbar>

                <DataTable
                    ref="dtworks"
                    :value="items"
                    dataKey="id"
                    :paginator="true"
                    :rows="10"
                    :filters="filters"
                    :loading="loading"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Mostrando {first} a {last} de {totalRecords} trabajos"
                    id="table_index"
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
                        :exportable="false"
                        style="min-width: 16rem"
                    >
                        <template #body="p">
                            <ul class="list-disc list-inside">
                                <li
                                    v-for="author in p.data.authors"
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
                        field="category"
                        header="Categoria"
                        sortable
                        style="min-width: 10rem"
                    >
                    </Column>
                    <Column :exportable="false" style="min-width: 10rem">
                        <template #body="props">
                            <div class="flex gap-3">
                                <LinkDefault
                                    :href="
                                        route(
                                            'investigation-works.edit',
                                            props.data.id
                                        )
                                    "
                                    class="bg-transparent border border-solid rounded-full dark:rounded-full dark:border-yellow-600 text-yellow-500 border-yellow-500 hover:border-yellow-600 hover:text-yellow-600 hover:bg-yellow-300 transition duration-200 ease-in-out"
                                    v-if="$page.props.roles.is_admin"
                                >
                                    <span class="pi pi-pencil"></span>
                                </LinkDefault>
                                <Button
                                    icon="pi pi-trash"
                                    outlined
                                    rounded
                                    severity="danger"
                                    @click="confirmDeleteItem(props.data.id)"
                                    v-if="$page.props.roles.is_admin"
                                />
                                <DownloadFile
                                    :data="props.data"
                                    :pathInvWork="pathInvWork"
                                />
                            </div>
                        </template>
                    </Column>
                </DataTable>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
