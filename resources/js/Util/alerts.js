/**
 * Gestiona los tipos de alerta que se pueden mostrar
 */

import Swal from "sweetalert2";

const baseAlert = (icon, title, text, options = null) => {
    return Swal.fire({
        icon: icon,
        title: title,
        text: text,
        ...options,
    });
};

export const alertError = (title, text) => {
    baseAlert("error", title, text);
};

export const alertSuccess = (title, text) => {
    baseAlert("success", title, text);
};

export const alertWarning = (title, text) => {
    baseAlert("warning", title, text);
};

export const alertInfo = (title, text) => {
    baseAlert("info", title, text);
};

/**
 * Validar errores de request laravel
 */
export const validateRequest = (error) => {
    if (error.response.status === 422) {
        const errors = error.response.data.errors;
        let message = "";
        for (const key in errors) {
            message += `${errors[key]} \n`;
        }
        alertError("Error", message);
    }

    if (error.response.status === 500) {
        alertError("Error", "Error interno del servidor");
    }

    if (error.response.status === 404) {
        alertError("Error", "Recurso no encontrado");
    }

    if (error.response.status === 401) {
        alertError("Error", "No esta autorizado para realizar esta acción");
    }

    if (error.response.status === 403) {
        alertError("Error", "Acceso denegado");
    }

    console.log(error);
};

/**
 * confirmar una alerta
 */
export const alertConfirm = ({
    icon = "warning",
    title = "¿seguro desea ejecutar esta acción?",
    text = "",
    options = {
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, continuar",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        // showDenyButton: true,
        // denyButtonText: `No eliminar`,
    },
}) => {
    return baseAlert(icon, title, text, options);
};
