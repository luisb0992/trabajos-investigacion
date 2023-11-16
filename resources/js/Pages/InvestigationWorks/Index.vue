<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import { FilterMatchMode } from "primevue/api";
import { useToast } from "primevue/usetoast";

import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Toolbar from "primevue/toolbar";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import LinkDefault from "@/Components/LinkDefault.vue";

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});

const items = ref([
    {
        title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
        authors: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
        area: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
        line: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
        file: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
    },
    {
        title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
        authors: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
        area: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
        line: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
        file: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
    },
]);

const goToCreateInvestigationWork = () => {
    const url = route("investigation-works.create");
    return window.location.replace(url);
};
</script>

<template>
    <Head title="Trabajos de investigación" />

    <AuthenticatedLayout>
        <section class="flex flex-col gap-3">
            <div>
                <Toolbar class="mb-4 bg-gray-600">
                    <template #start>
                        <!-- <Button
                            label="Nuevo trabajo"
                            icon="pi pi-plus"
                            severity="success"
                            class="mr-2"
                            @click="goToCreateInvestigationWork"
                        /> -->
                        <LinkDefault
                            :href="route('investigation-works.create')"
                        >
                            <span class="pi pi-plus"></span>
                            Trabajos
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
                    ></Column>
                    <Column
                        field="area"
                        header="Area o Centro"
                        sortable
                        style="min-width: 10rem"
                    ></Column>
                    <Column
                        field="line"
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
                            <Button
                                icon="pi pi-pencil"
                                outlined
                                rounded
                                class="mr-2"
                                @click=""
                            />
                            <Button
                                icon="pi pi-trash"
                                outlined
                                rounded
                                severity="danger"
                                @click=""
                            />
                        </template>
                    </Column>
                </DataTable>
            </div>
        </section>
    </AuthenticatedLayout>
</template>