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

/**
 * Devuelve la fecha según el formato especificado
 */
export const formatDate = (date, format = "DD/MM/YYYY") => {
    // date
    if (!date) return "";

    const string = new Date(date);

    // format
    const day = string.getDate();
    const month = string.getMonth() + 1;
    const year = string.getFullYear();

    // return
    return format.replace("DD", day).replace("MM", month).replace("YYYY", year);
};
