<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import useCreate from "@/Pages/Users/composables/useCreate.js";
import InputText from "primevue/inputtext";
import AutoComplete from "primevue/autocomplete";
import Button from "primevue/button";
// import Form from "@/Pages/InvestigationWorks/partials/Form.vue";

const { form, roles, loading, searchRole, create } = useCreate();
</script>

<template>
    <Head title="Nuevo Usuario" />

    <AuthenticatedLayout>
        <form class="flex flex-col gap-3 text-gray-800 dark:text-gray-300" @submit.prevent="create">
            <h3 class="text-2xl leading-7 text-center md:text-left">
                Nuevo usuario
            </h3>
            <hr class="border-gray-300" />
            <div class="flex flex-col gap-2">
                <label for="fullname" class="text-lg font-semibold">
                    Nombre completo
                </label>
                <InputText
                    id="fullname"
                    v-model="form.name"
                    aria-describedby="fullname-help"
                    required
                />
                <small id="fullname-help"> Nombre completo del usuario. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="email" class="text-lg font-semibold">
                    Correo electrónico
                </label>
                <InputText
                    id="email"
                    v-model="form.email"
                    aria-describedby="email-help"
                    type="email"
                    required
                />
                <small id="email-help"> Correo electrónico del usuario. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="email" class="text-lg font-semibold">
                    Contraseña
                </label>
                <InputText
                    id="password"
                    v-model="form.password"
                    aria-describedby="password-help"
                    type="password"
                    required
                />
                <small id="password-help"> Contraseña del usuario. </small>
            </div>
            <div class="flex flex-col gap-2">
                <label for="rol" class="text-lg font-semibold"> Rol </label>
                <AutoComplete
                    dropdown
                    v-model="form.rol"
                    :suggestions="roles"
                    @complete="searchRole"
                    placeholder="Seleccione un rol para el usuario"
                    optionLabel="name"
                    @change="form.rol_id = $event.value.id"
                >
                    <template #option="p">
                        {{ p.option.name }}
                    </template>
                </AutoComplete>
                <small id="rol-help"> Rol para el usuario. </small>
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
    </AuthenticatedLayout>
</template>
