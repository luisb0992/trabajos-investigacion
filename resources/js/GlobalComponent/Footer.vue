<script setup>
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
                    class="flex justify-between items-center flex-col md:flex-row gap-5 py-5"
                >
                    <p class="font-semibold">
                        Dr. José Ángel Torrealba Torres
                        <br />
                        <span class="font-extralight">Rector.</span>
                    </p>
                    <p class="font-semibold md:-ml-12 2xl:ml-0">
                        Dr. Giusseppe Schambery
                        <br />
                        <span class="font-extralight"
                            >Vicerrector Académico Encargado.</span
                        >
                    </p>
                    <p class="font-semibold">
                        Dr. Juan Montenegro
                        <br />
                        <span class="font-extralight"
                            >Vicerrector Administrativo.</span
                        >
                    </p>
                </div>
                <div
                    class="flex justify-between items-center flex-col md:flex-row gap-5 py-5"
                >
                    <p class="font-semibold">
                        Dr. Carlos Jiménez
                        <br />
                        <span class="font-extralight">Secretario.</span>
                    </p>
                    <p class="font-semibold md:-ml-7 2xl:ml-6">
                        Dra. Beysimar Escobar
                        <br />
                        <span class="font-extralight">
                            Decana de Investigación.
                        </span>
                    </p>
                    <p class="font-semibold">
                        MSc. Merly Orta
                        <br />
                        <span class="font-extralight"
                            >Directora de Investigación.</span
                        >
                    </p>
                </div>
                <div
                    class="flex justify-between items-center flex-col md:flex-row gap-5 py-5"
                >
                    <p class="font-semibold">
                        Msc. Mery Caldera
                        <br />
                        <span class="font-extralight">
                            Directora de Socializacion del Conocimiento.
                        </span>
                    </p>
                    <p class="font-semibold md:-ml-60 2xl:-ml-48">
                        Lcdo. Hector Parra
                        <br />
                        <span class="font-extralight">
                            Director de Produccion.
                        </span>
                    </p>
                    <p class="font-semibold">
                        Dra. Lila Martinez
                        <br />
                        <span class="font-extralight">
                            Directora de Control...
                        </span>
                    </p>
                </div>
            </div>
            <div
                class="max-w-7xl py-6 mx-auto h-full flex items-center sm:flex-row flex-col justify-between"
            >
                <p class="text-sm mt-4">
                    © {{ year }} Trabajo de investigación - UNERG
                </p>
                <span class="inline-flex mt-4 justify-center sm:justify-start">
                    <a class="ml-3" href="#" rel="noopener noreferrer">
                        <svg
                            fill="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            class="w-5 h-5"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
                            ></path>
                        </svg>
                    </a>
                    <a class="ml-3" href="#" rel="noopener noreferrer">
                        <svg
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            class="w-5 h-5"
                            viewBox="0 0 24 24"
                        >
                            <rect
                                width="20"
                                height="20"
                                x="2"
                                y="2"
                                rx="5"
                                ry="5"
                            ></rect>
                            <path
                                d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
                            ></path>
                        </svg>
                    </a>
                    <a class="ml-3" href="#" rel="noopener noreferrer">
                        <svg
                            fill="currentColor"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="0"
                            class="w-5 h-5"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="none"
                                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"
                            ></path>
                            <circle cx="4" cy="4" r="2" stroke="none"></circle>
                        </svg>
                    </a>
                </span>
            </div>
        </div>
    </footer>
</template>
