/**
 * Constantes de la aplicación
 */
import { ref } from "vue";

/**
 * Roles definidos para el usuario
 */
export const roles = ref([
    {
        id: 1,
        name: "Administrador",
    },
    {
        id: 2,
        name: "Usuario",
    },
    // {
    //     id: 3,
    //     name: "Estudiante",
    // },
]);

/**
 * Categorias de los proyectos
 */
export const categories = ref([
    {
        id: 1,
        name: "Proyecto",
    },
    {
        id: 2,
        name: "Trabajo de grado",
    },
    {
        id: 3,
        name: "Tesis doctoral",
    },
    {
        id: 4,
        name: "Socio productivo",
    },
    {
        id: 5,
        name: "Artículo científico",
    },
]);

/**
 * tipo de proyecto
 */
export const projectTypes = ref([
    {
        id: 1,
        name: "Individual",
    },
    {
        id: 2,
        name: "Grupal",
    },
]);

/**
 * Estatus del proyecto
 */
export const projectStatus = ref([
    {
        id: 1,
        name: "En ejecución",
    },
    {
        id: 2,
        name: "Finalizado",
    },
]);

/**
 * Aspectos éticos
 */
export const aspects = ref([
    {
        id: 1,
        norma: "Aplicación de los principios de beneficencia, no maleficencia, justicia, autonomía, precaución y responsabilidad y respeto por los derechos humanos",
        select: false,
        value: "principles_beneficence",
    },
    {
        id: 2,
        norma: "Evaluación del comité o comisión de ética/bioética local.",
        select: false,
        value: "ethics_commission",
    },
    {
        id: 3,
        norma: "Procedimientos para el manejo de las muestras biológicas, y el material potencialmente contaminado, así como destino final de las mismas.",
        select: false,
        value: "biological_samples",
    },
    {
        id: 4,
        norma: "Indicación de la atención médica que será proporcionada a los participantes de la investigación, durante y después de la misma si trabaja con humanos.",
        select: false,
        value: "medical_attention",
    },
    {
        id: 5,
        norma: "Mecanismos de protección de la privacidad de los sujetos de estudio y la confidencialidad de los resultados de los estudios si trabaja con humanos.",
        select: false,
        value: "protection_mechanisms",
    },
    {
        id: 6,
        norma: "Modelo del documento para la obtención del Consentimiento Informado colectivo y/o individual, según sea el caso, y descripción de los procedimientos para obtener dicho consentimiento.",
        select: false,
        value: "collective_informed",
    },
    {
        id: 7,
        norma: "Es aplicable si la investigación se realiza en personas o comunidades, si involucra muestras biológicas de donantes humanos o datos provenientes de archivos de resultados de laboratorio o historias clínicas de humanos.",
        select: false,
        value: "informed_consent",
    },
    {
        id: 8,
        norma: "Modelo del documento para la obtención del Consentimiento Informado y descripción de los procedimientos para obtener dicho consentimiento, previo a las investigaciones realizadas en hábitat y tierras de los pueblos y comunidades indígenas.",
        select: false,
        value: "person_investigation",
    },
    {
        id: 9,
        norma: "Procedimientos para garantizar la confidencialidad de los datos provenientes de humanos.",
        select: false,
        value: "data_confidentiality",
    },
    {
        id: 10,
        norma: "Consideración del impacto de la investigación sobre las comunidades humanas involucradas en la investigación, o cualquier otra que pueda ser directa o indirectamente afectada.",
        select: false,
        value: "research_impact",
    },
    {
        id: 11,
        norma: "Descripción de los procedimientos para asegurar el acceso de las personas y comunidades participantes o involucradas a los resultados de investigación.",
        select: false,
        value: "description_procedures",
    },
    {
        id: 12,
        norma: "Previsión de consultas e informes a la comunidad durante el curso de la investigación.",
        select: false,
        value: "query_forecast",
    },
    {
        id: 13,
        norma: "Consideración del impacto y medidas necesarias para prevenir y evitar daños potenciales de la investigación sobre la diversidad biológica y sus componentes tales como poblaciones y ecosistemas potencialmente afectados, así como la salud humana.",
        select: false,
        value: "consideration_impact",
    },
    {
        id: 14,
        norma: "Método para el sacrificio de los animales.",
        select: false,
        value: "animal_sacrifice",
    },
    {
        id: 15,
        norma: "Procedimientos a aplicar a los animales del estudio, incluyendo su origen y obtención, y el destino y tratamiento del animal una vez terminada la investigación.",
        select: false,
        value: "study_animals",
    },
    {
        id: 16,
        norma: "Procedimientos a seguir con animales obtenidos en su hábitat antes, durante y al final de la investigación (captura, destino final, procedimiento de liberación).",
        select: false,
        value: "animal_habitat",
    },
]);

/**
 * Rubros de los proyectos
 */
export const items = ref([
    {
        id: 1,
        value: "incentive",
        name: "INCENTIVO A LA GENERACIÓN DE RELEVO",
        amount: 0,
    },
    {
        id: 2,
        value: "material_supplier",
        name: "MATERIALES Y SUMINISTROS",
        amount: 0,
    },
    {
        id: 3,
        value: "services",
        name: "SERVICIOS",
        amount: 0,
    },
    {
        id: 4,
        value: "viatic",
        name: "VIÁTICOS DENTRO DEL PAIS",
        amount: 0,
    },
    {
        id: 5,
        value: "mobilization",
        name: "MOVILIZACIÓN DENTRO DEL PAÍS",
        amount: 0,
    },
]);

/**
 * Redes sociales
 */
export const RRSS = ref({
    facebook: "https://www.facebook.com/oficial.unerg",
    twitter: "https://twitter.com/OficialUnerg",
    instagram: "https://www.instagram.com/oficial_unerg/",
});

/**
 * Actividades para el cronograma
 */
export const activities = ref([
    {
        id: 1,
        activity:
            "Revision y búsqueda de la información del tema y antecedentes.",
        select_1: false,
        select_2: false,
        select_3: false,
        select_4: false,
        value: "revision",
    },
    {
        id: 2,
        activity:
            "Descripción de la inquietud científica, marco teórico y metodología.",
        select_1: false,
        select_2: false,
        select_3: false,
        select_4: false,
        value: "description",
    },
    {
        id: 3,
        activity: "Análisis de los textos investigados.",
        select_1: false,
        select_2: false,
        select_3: false,
        select_4: false,
        value: "analysis",
    },
    {
        id: 4,
        activity: "Redacción de los resultados.",
        select_1: false,
        select_2: false,
        select_3: false,
        select_4: false,
        value: "drafting",
    },
    {
        id: 5,
        activity: "Conclusiones y recomendaciones.",
        select_1: false,
        select_2: false,
        select_3: false,
        select_4: false,
        value: "conclusions",
    },
]);

/**
 * Trimestres del añó
 */
export const quarters = ref({
    one: "E-F-M",
    two: "A-M-J",
    three: "J-A-S",
    four: "O-N-D",
});
