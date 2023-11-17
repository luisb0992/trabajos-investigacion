/**
 * Gestion de filtros para la app
 */

/**
 * Devuelve un string sin acentos, en minúsculas y sin espacios
 */
export const normalizeString = (string) => {
    return string
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/\s/g, "");
};
