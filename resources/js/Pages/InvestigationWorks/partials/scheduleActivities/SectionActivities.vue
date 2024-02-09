<script setup>
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Checkbox from "primevue/checkbox";
import { activities, quarters } from "@/Util/const.js";

const props = defineProps({
    assignActivity: {
        type: Function,
        required: true,
    },
});
</script>
<template>
    <section id="activities">
        <h3 class="text-xl font-semibold">Cronograma de actividades</h3>
        <div class="py-2">
            <DataTable :value="activities" tableStyle="min-width: 50rem">
                <Column field="id" header="#"></Column>
                <Column field="activity" header="Actividad"></Column>
                <Column field="select" header="">
                    <template #header>
                        <div class="flex flex-col">
                            <p class="mb-2">Meses del año</p>
                            <div class="flex justify-start gap-5">
                                <p class="uppercase text-xs font-semibold">
                                    {{ quarters.one }}
                                </p>
                                <p class="uppercase text-xs font-semibold">
                                    {{ quarters.two }}
                                </p>
                                <p class="uppercase text-xs font-semibold">
                                    {{ quarters.three }}
                                </p>
                                <p class="uppercase text-xs font-semibold">
                                    {{ quarters.four }}
                                </p>
                            </div>
                        </div>
                    </template>
                    <template #body="p">
                        <div class="p-field-checkbox flex justify-start gap-11">
                            <Checkbox
                                v-model="p.data.select_1"
                                binary="true"
                                style="transform: scale(1.2)"
                                @change="
                                    assignActivity(
                                        quarters.one,
                                        p.data.id,
                                        p.data.select_1
                                    )
                                "
                            />
                            <Checkbox
                                v-model="p.data.select_2"
                                binary="true"
                                style="transform: scale(1.2)"
                                @change="
                                    assignActivity(
                                        quarters.two,
                                        p.data.id,
                                        p.data.select_2
                                    )
                                "
                            />
                            <Checkbox
                                v-model="p.data.select_3"
                                binary="true"
                                style="transform: scale(1.2)"
                                @change="
                                    assignActivity(
                                        quarters.three,
                                        p.data.id,
                                        p.data.select_3
                                    )
                                "
                            />
                            <Checkbox
                                v-model="p.data.select_4"
                                binary="true"
                                style="transform: scale(1.2)"
                                @change="
                                    assignActivity(
                                        quarters.four,
                                        p.data.id,
                                        p.data.select_4
                                    )
                                "
                            />
                        </div>
                    </template>
                </Column>
            </DataTable>
        </div>
    </section>
</template>
