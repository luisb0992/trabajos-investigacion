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
        name: "Registrador",
    },
    {
        id: 3,
        name: "Estudiante",
    },
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
        name: "Trabajos de grado",
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
    },
    {
        id: 2,
        norma: "Evaluación del comité o comisión de ética/bioética local.",
        select: false,
    },
    {
        id: 3,
        norma: "Procedimientos para el manejo de las muestras biológicas, y el material potencialmente contaminado, así como destino final de las mismas.",
        select: false,
    },
    {
        id: 4,
        norma: "Indicación de la atención médica que será proporcionada a los participantes de la investigación, durante y después de la misma si trabaja con humanos.",
        select: false,
    },
    {
        id: 5,
        norma: "Mecanismos de protección de la privacidad de los sujetos de estudio y la confidencialidad de los resultados de los estudios si trabaja con humanos.",
        select: false,
    },
    {
        id: 6,
        norma: "Modelo del documento para la obtención del Consentimiento Informado colectivo y/o individual, según sea el caso, y descripción de los procedimientos para obtener dicho consentimiento.",
        select: false,
    },
    {
        id: 7,
        norma: "Es aplicable si la investigación se realiza en personas o comunidades, si involucra muestras biológicas de donantes humanos o datos provenientes de archivos de resultados de laboratorio o historias clínicas de humanos.",
        select: false,
    },
    {
        id: 8,
        norma: "Modelo del documento para la obtención del Consentimiento Informado y descripción de los procedimientos para obtener dicho consentimiento, previo a las investigaciones realizadas en hábitat y tierras de los pueblos y comunidades indígenas.",
        select: false,
    },
    {
        id: 9,
        norma: "Procedimientos para garantizar la confidencialidad de los datos provenientes de humanos.",
        select: false,
    },
    {
        id: 10,
        norma: "Consideración del impacto de la investigación sobre las comunidades humanas involucradas en la investigación, o cualquier otra que pueda ser directa o indirectamente afectada.",
        select: false,
    },
    {
        id: 11,
        norma: "Descripción de los procedimientos para asegurar el acceso de las personas y comunidades participantes o involucradas a los resultados de investigación.",
        select: false,
    },
    {
        id: 12,
        norma: "Previsión de consultas e informes a la comunidad durante el curso de la investigación.",
        select: false,
    },
    {
        id: 13,
        norma: "Consideración del impacto y medidas necesarias para prevenir y evitar daños potenciales de la investigación sobre la diversidad biológica y sus componentes tales como poblaciones y ecosistemas potencialmente afectados, así como la salud humana.",
        select: false,
    },
    {
        id: 14,
        norma: "Método para el sacrificio de los animales.",
        select: false,
    },
    {
        id: 15,
        norma: "Procedimientos a aplicar a los animales del estudio, incluyendo su origen y obtención, y el destino y tratamiento del animal una vez terminada la investigación.",
        select: false,
    },
    {
        id: 16,
        norma: "Procedimientos a seguir con animales obtenidos en su hábitat antes, durante y al final de la investigación (captura, destino final, procedimiento de liberación).",
        select: false,
    },
]);

/**
 * Rubros de los proyectos
 */
export const items = ref([
    {
        id: 1,
        name: "INCENTIVO A LA GENERACIÓN DE RELEVO",
        amount: 0,
    },
    {
        id: 2,
        name: "MATERIALES Y SUMINISTROS",
        amount: 0,
    },
    {
        id: 3,
        name: "SERVICIOS",
        amount: 0,
    },
    {
        id: 4,
        name: "VIÁTICOS DENTRO DEL PAIS",
        amount: 0,
    },
    {
        id: 5,
        name: "MOVILIZACIÓN DENTRO DEL PAÍS",
        amount: 0,
    },
]);
