<script setup>
import { reactive } from "vue";

const sectionOne = reactive({
    title: "Decanato de investigación, producción y socialización del conocimiento Unerg.",
    sub: `Es el encargado de articular los procesos relacionados con la
                investigación, la participación directa e indirecta en los
                procesos de producción y productividad, así como la
                socialización de conocimiento entre áreas y las comunidades, en
                función del proyecto de país establecido en la Constitución de
                la República Bolivariana y en los planes nacionales.`,
});

const sectionTwo = reactive({
    title: "Misión.",
    sub: `El Decanato de Investigación, Producción y Socialización del
                Conocimiento de la Universidad Nacional Experimental de los
                Llanos Centrales “Rómulo Gallegos”, tiene como misión la
                planificación, coordinación y ejecución de políticas en el
                ámbito científico, humanístico, tecnológico y de redes sociales,
                en permanente actualización y mejoramiento, que sustentan los
                programas académicos de la Universidad, a través del fomento,
                financiamiento y promoción de la investigación.`,
});

const sectionThree = reactive({
    title: "Visión.",
    sub: `El Decanato de Investigación, Producción, y Socialización del
                Conocimiento de la Universidad Nacional Experimental de los
                Llanos Centrales “Rómulo Gallegos”, es el órgano universitario
                gestor de la excelencia en materia de planificación y ejecución
                de las políticas que sustentan los proyectos de Investigación,
                Producción y Socialización del Conocimiento de nuestra Alma
                Mater, con el propósito de fomentar la ciencia, la tecnología y
                la innovación al servicio del desarrollo nacional, regional y
                local, así como de garantizar la participación del personal
                académico, obrero, administrativo y estudiantes, conjuntamente
                con las organizaciones comunales y socio productivas,`,
});
</script>
<template>
    <section class="grid grid-cols-1 md:grid-cols-2">
        <div class="flex flex-col justify-center items-center px-6 py-10 gap-5">
            <h1
                class="text-xl md:text-5xl text-center leading-5 font-bold text-gray-800 dark:text-gray-300 px-3 lg:px-0 max-w-2xl"
            >
                {{ sectionOne.title }}
            </h1>
            <p
                class="text-sm md:text-lg leading-7 font-light text-gray-600 dark:text-gray-300 max-w-2xl px-3 lg:px-0"
            >
                {{ sectionOne.sub }}
            </p>
        </div>
        <div class="relative">
            <div class="absolute inset-0 bg-gray-900/30"></div>
            <img
                src="./../../../images/home/decanato.webp"
                :alt="sectionOne.title"
                class="object-cover object-center w-full h-full md:min-h-[600px]"
            />
        </div>
    </section>

    <section class="w-full grid grid-cols-1 md:grid-cols-2">
        <div class="relative order-last md:order-first">
            <div class="absolute inset-0 bg-gray-900/30"></div>
            <img
                src="./../../../images/home/decanato-mision.webp"
                :alt="sectionTwo.title"
                class="object-cover object-center w-full h-full md:min-h-[600px]"
            />
        </div>
        <div class="flex flex-col justify-center items-center gap-5 px-6 py-10">
            <h3
                class="text-xl md:text-5xl leading-5 font-bold text-gray-800 dark:text-gray-300 px-3 lg:px-0"
            >
                {{ sectionTwo.title }}
            </h3>
            <p
                class="text-sm md:text-lg leading-7 font-light text-gray-600 dark:text-gray-300 max-w-xl px-3 lg:px-0"
            >
                {{ sectionTwo.sub }}
            </p>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2">
        <div class="flex flex-col justify-center items-center px-6 py-10 gap-5">
            <h1
                class="text-xl md:text-5xl leading-5 font-bold text-gray-800 dark:text-gray-300 px-3 lg:px-0"
            >
                {{ sectionThree.title }}
            </h1>
            <p
                class="text-sm md:text-lg leading-7 font-light text-gray-600 dark:text-gray-300 max-w-2xl px-3 lg:px-0"
            >
                {{ sectionThree.sub }}
            </p>
        </div>
        <div class="relative">
            <div class="absolute inset-0 bg-gray-900/30"></div>
            <img
                src="./../../../images/home/decanato-vision.webp"
                :alt="sectionThree.title"
                class="object-cover object-center w-full h-full md:min-h-[600px]"
            />
        </div>
    </section>
</template>
