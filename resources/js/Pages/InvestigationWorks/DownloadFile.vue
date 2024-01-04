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
} from "@/Util/const";

const { work, downloadFile } = useDownloadFile();
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
                    <thead class="text-sm text-nowrap">
                        <tr>
                            <th class="pb-3">Cédula</th>
                            <th class="pb-3">Nombre completo</th>
                            <th class="pb-3">Dirección</th>
                            <th class="pb-3">Teléfono</th>
                            <th class="pb-3">Email</th>
                            <th class="pb-3">Nivel de instrucción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b border-gray-300 text-sm"
                            v-for="author in work.authors"
                            :key="author.id"
                        >
                            <td class="px-2 pb-4">{{ author.dni }}</td>
                            <td class="px-2 pb-4">
                                {{ author.firstname + " " + author.lastname }}
                            </td>
                            <td class="px-2 pb-4">{{ author.address }}</td>
                            <td class="px-2 pb-4">{{ author.phone }}</td>
                            <td class="px-2 pb-4">{{ author.email }}</td>
                            <td class="px-2 pb-4">
                                {{ author.level_instruction }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="project">
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
                                {{ categories[work.category_id]?.name ?? "---" }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="font-bold px-2 pb-4">
                                Tipo de proyecto
                            </td>
                            <td class="px-2 pb-4">
                                {{ projectTypes[work.type]?.name ?? "---" }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="font-bold px-2 pb-4">
                                Estado del proyecto
                            </td>
                            <td class="px-2 pb-4">
                                {{ projectStatus[work.status]?.name ?? "---" }}
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

            <div id="bibliography">
                <table class="w-full border">
                    <caption
                        class="uppercase font-bold border bg-gray-300 pb-3 text-sm"
                    >
                        BIBLIOGRAFÍA
                    </caption>
                    <tbody>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="px-2 pb-4 flex flex-col gap-3">
                                <p>
                                    Almirón, M. E., y Porro, S. (2014). Los
                                    docentes en la Sociedad de la Información:
                                    reconfiguración de roles y nuevas
                                    problemáticas. IE Comunicaciones: Revista
                                    Iberoamericana de Informática Educativa,
                                    (19), 17-31.
                                    https://dialnet.unirioja.es/servlet/articulo?codigo=4794547
                                </p>
                                <p>
                                    Bonilla, L. A. G. (2016). Deliberación
                                    entorno a la Educación Virtual.
                                    Interconectando Saberes, (1), 77-89.
                                    http://is.uv.mx/index.php/IS/article/view/1112
                                </p>
                                <p>
                                    Bonilla-Guachamín, J. A. (2020). Las dos
                                    caras de la educación en el COVID-19.
                                    CienciAmérica, 9(2), 89-98.
                                    http://dx.doi.org/10.33210/ca.v9i2.294
                                    Brasó, J., y Arderiu, M. (2019).
                                    Herramientas tecnológicas para el
                                    seguimiento del alumnado en la FP dual.
                                    Revista Prácticum, 4(2), 77-94.
                                    https://doi.org/10.37042/practicum.2019.4.2.5
                                </p>
                                <p>
                                    Bravo-García, E., y Magis-Rodríguez, C.
                                    (2020). La respuesta mundial a la epidemia
                                    del COVID-19: los primeros tres meses.
                                    Boletín sobre COVID-19 Salud Pública y
                                    Epidemiología, 1(1), 3-8.
                                    http://dsp.facmed.unam.mx/wpcontent/uploads/2013/12/COVID-19-No.1-03-La-respuesta-mundial-a-la-epidemiadelCOVID-19-los-primeros-tres-meses.pdf
                                </p>
                                <p>
                                    Capó, W. (s/f). Las Tecnologías de la
                                    Información y Comunicación en los Programas
                                    de Educación a Distancia del IAES. Módulo I.
                                    Educación a Distancia y Tecnologías de la
                                    Información y Comunicación. Diplomado a
                                    Distancia de Epidemiología. IAES. Expósito,
                                    C. y Marsollier, R. (2020). Virtualidad y
                                    educación en tiempos de COVID-19. Un estudio
                                    empírico en Argentina. Educación y
                                    Humanismo, 22(39), 1-22.
                                    https://doi.org/10.17081/eduhum.22.39.4214
                                </p>
                                <p>
                                    Fernández-Gubieda, S. (2020). Docencia
                                    Rubic: aprendizajes de la enseñanza
                                    universitaria en tiempos de la Covid-19.
                                    https://www.unav.edu/documents/24640148/26406619/RubicSueltas.pdf
                                </p>
                                <p>
                                    García, J., (1986). Cómo Aprende el Alumno
                                    Adulto en la Educación Superior a Distancia.
                                    Narcea Madríd. Marquina, R. (2019).
                                    Estrategias Didácticas para la Enseñanza en
                                    Entornos Virtuales. Trabajo de grado para
                                    optar al título de Magíster en Educación
                                    mención Informática y Diseño
                                    Instruccionales. Universidad de Los Andes.
                                    Muñoz, D. (2020). Educación Virtual en
                                    Pandemia: Una Perspectiva Desde la Venezuela
                                    Actual. Revista Educare. Volumen 24 Nº 3
                                    septiembre-diciembre 2020. ORCID:
                                    https://orcid.org/0000-0003-1368-8919
                                </p>
                                <p>
                                    Rodríguez-Jiménez, J. M. (2009). Patrones
                                    pedagógicos en educación virtual. Revista de
                                    Educación a Distancia (RED). Monográfico X
                                    (2009), 1-16.
                                    https://revistas.um.es/red/article/view/89321
                                </p>
                                <p>
                                    Silva, J. (2017). Un modelo pedagógico
                                    virtual centrado en las E-actividades.
                                    Revista de Educación a Distancia, 17(53), 1-
                                    20.
                                    https://revistas.um.es/red/article/view/290021
                                </p>
                                <p>
                                    Tejedor, S., Cervi, L., Tusa, F. y Parola,
                                    A. (2020). Educación en tiempos de pandemia:
                                    reflexiones de alumnos y profesores sobre la
                                    enseñanza virtual universitaria en España,
                                    Italia y Ecuador. Revista Latina de
                                    Comunicación Social, 78, 1-21.
                                    https://www.doi.org/10.4185/RLCS2020-1466.
                                </p>
                                <p>
                                    Ruiz, M. y García Aretio, L (2010) Movilidad
                                    virtual en la educación superior,
                                    ¿oportunidad o utopía? Revista Española de
                                    Pedagogía, 68 (246), pp. 243-259.
                                    Universidad Internacional de La Rioja (UNIR)
                                    Stable URL:
                                    http://www.jstor.org/stable/23766299
                                    Accessed:
                                </p>
                                <p>
                                    05-06-2017 00:32 UTC García Aretio, L.
                                    (1999). Perspectivas sobre la función
                                    tutorial. Madrid: UNE Garrison, D., y
                                    Anderson, T. (2005). El e-learning en el
                                    siglo XXI: investigación y práctica.
                                    Barcelona: Octaedro Segura, A. y Gallardo,
                                    M. (2013). Entornos virtuales de
                                    aprendizaje: nuevos retos educativos.
                                    España: Universidad de Granada. Pettenati, O
                                    & otros. (2000) The Learning Tutor: A Web
                                    based Authoring System to Support Distance
                                    Tutoring. Source: Journal of Educational
                                    Technology & Society, 3 (4) Evaluation of
                                    Learning Technology (October 2000), pp.
                                    151-164. Published by: International Forum
                                    of Educational Technology & Society Stable
                                    URL:
                                    http://www.jstor.org/stable/jeductechsoci.3.4.151
                                </p>
                                <p>
                                    Accessed: 04-06-2017 23:49 UTC Silva, D. M.
                                    D., Leal, E. A., Pereira, J. M., & Oliveira
                                    Neto, J. D. D. (2015). Learning styles and
                                    academic performance in Distance Education:
                                    a research in specialization courses.
                                    Revista brasileira de gestão de negócios,
                                    17(57), 1300- 1316. Vásquez. R, Bongianino.
                                    C y Sosisky. L (2006). La tecnología
                                    educativa y la educación a distancia.
                                    Educación a distancia de posgrado y
                                    pregrado. XVII Jornadas Universitarias de
                                    Contabilidad. Argentina. Bernal. L (2012).
                                    Historia de la Educación a Distancia. Tomado
                                    el día 22 de noviembre de 2021. D
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="homeland">
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

            <div id="aspects">
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

            <div id="items">
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
