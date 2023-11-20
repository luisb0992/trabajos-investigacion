/**
 * Gestiona los tipos de alerta que se pueden mostrar
 */

import Swal from "sweetalert2";

const baseAlert = (icon, title, text, options = null) => {
    return Swal.fire({
        icon,
        title,
        text,
        html: "<span style='color: #000'>" + text + "</span>",
        ...options,
    });
};

export const alertError = (title, text, options = null) => {
    baseAlert("error", title, text, options);
};

export const alertSuccess = (title, text, options = null) => {
    baseAlert("success", title, text, options);
};

export const alertWarning = (title, text, options = null) => {
    baseAlert("warning", title, text, options);
};

export const alertInfo = (title, text, options = null) => {
    baseAlert("info", title, text, options);
};

/**
 * Validar errores de request laravel
 */
export const validateRequest = (errors) => {
    console.log(errors);
    if (errors) {
        let message = "";
        for (const key in errors) {
            message += `${errors[key]} <br>`;
        }

        alertError("Error", message);
        return;
    }

    if (errors?.response?.status === 500) {
        alertError("Error", "Error interno del servidor");
    }

    if (errors?.response?.status === 404) {
        alertError("Error", "Recurso no encontrado");
    }

    if (errors?.response?.status === 401) {
        alertError("Error", "No esta autorizado para realizar esta acción");
    }

    if (errors?.response?.status === 403) {
        alertError("Error", "Acceso denegado");
    }
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
