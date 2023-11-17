/**
 * Gestiona los tipos de alerta que se pueden mostrar
 */

import Swal from "sweetalert2";

const baseAlert = (icon, title, text) => {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
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
};
