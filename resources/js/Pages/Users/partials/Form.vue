<script setup>
import InputText from "primevue/inputtext";
import AutoComplete from "primevue/autocomplete";
import Button from "primevue/button";
import LinkDefault from "@/Components/LinkDefault.vue";
import InputSwitch from "primevue/inputswitch";

defineProps({
    form: {
        type: Object,
        required: true,
    },
    roles: {
        type: Array,
        required: true,
    },
    loading: {
        type: Boolean,
        required: true,
    },
    searchRole: {
        type: Function,
        required: true,
    },
    buttonLabel: {
        type: String,
        required: true,
    },
    isUpdate: {
        type: Boolean,
        default: false,
    },
    title: {
        type: String,
        default: "Nuevo usuario",
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
        <div class="flex flex-col gap-2" v-if="isUpdate">
            <small>¿Cambiar contraseña?</small>
            <InputSwitch v-model="form.checked" />
            <div class="flex flex-col gap-2" v-if="form.checked">
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
        </div>
        <div class="flex flex-col gap-2" v-else>
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
        <div class="flex justify-end gap-2">
            <LinkDefault :href="route('users.index')">
                <span class="pi pi-arrow-left"></span>
                Volver
            </LinkDefault>
            <Button
                :label="buttonLabel"
                icon="pi pi-save"
                class="w-32"
                type="submit"
                :disabled="loading"
                :class="{ 'opacity-25': loading }"
            />
        </div>
    </form>
</template>
