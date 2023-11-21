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
