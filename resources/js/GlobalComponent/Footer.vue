<script setup>
import SocialMedia from "@/Components/SocialMedia.vue";

const year = new Date().getFullYear();
</script>
<template>
    <hr class="border-gray-900" />
    <footer
        class="text-gray-900 dark:text-gray-200 dark:bg-sky-900 bg-gray-200"
    >
        <div
            class="dark:bg-sky-900 bg-gray-200 text-gray-900 dark:text-gray-400 h-full"
        >
            <div
                class="flex flex-col max-w-7xl py-6 mx-auto text-center md:text-left pt-14"
            >
                <h3
                    class="text-lg font-semibold leading-7 pb-3 text-center md:text-left"
                >
                    Autoridades
                </h3>
                <div
                    class="flex flex-col md:flex-row justify-between items-center"
                >
                    <div
                        class="flex flex-col justify-between items-center md:items-start gap-10 py-5"
                    >
                        <p class="font-semibold md:text-left text-center">
                            Dr. Cesar Augusto Gómez García
                            <br />
                            <span class="font-extralight">Rector.</span>
                        </p>
                        <p class="font-semibold md:text-left text-center">
                            Dra. Joali moreno
                            <br />
                            <span class="font-extralight">
                                Vicerrectora Académica.
                            </span>
                        </p>
                        <p class="font-semibold md:text-left text-center">
                            Dr. Juan Montenegro
                            <br />
                            <span class="font-extralight">
                                Vicerrector Administrativo.
                            </span>
                        </p>
                    </div>
                    <div
                        class="flex flex-col justify-between items-center md:items-start gap-10 py-5"
                    >
                        <p class="font-semibold md:text-left text-center">
                            Dra. Grevimar Carpavire
                            <br />
                            <span class="font-extralight">Secretario.</span>
                        </p>
                        <p class="font-semibold md:text-left text-center">
                            Dra. Beysimar Escobar
                            <br />
                            <span class="font-extralight">
                                Decana de Investigación.
                            </span>
                        </p>
                        <p class="font-semibold md:text-left text-center">
                            MSc. Merly Orta
                            <br />
                            <span class="font-extralight">
                                Directora de Investigación.
                            </span>
                        </p>
                    </div>
                    <div
                        class="flex flex-col justify-between items-center md:items-start gap-10 py-5"
                    >
                        <p class="font-semibold md:text-left text-center">
                            Msc. Mery Caldera
                            <br />
                            <span class="font-extralight">
                                Directora de Socializacion del Conocimiento.
                            </span>
                        </p>
                        <p class="font-semibold md:text-left text-center">
                            Lcdo. Hector Parra
                            <br />
                            <span class="font-extralight">
                                Director de Produccion.
                            </span>
                        </p>
                        <p class="font-semibold md:text-left text-center">
                            Dra. Lila Martinez
                            <br />
                            <span class="font-extralight">
                                Directora de Control y Seguimiento.
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="max-w-7xl py-6 mx-auto h-full flex items-center sm:flex-row flex-col justify-between"
            >
                <p class="text-sm mt-4">
                    © {{ year }} Trabajo de investigación - UNERG
                </p>
                <SocialMedia
                    class="inline-flex mt-4 justify-center sm:justify-start"
                />
            </div>
        </div>
    </footer>
</template>
