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
