/**
 * Gestion de validaciones para el formulario de trabajos de investigación
 */

import { roles } from "@/Util/const";
import {
    emailRequired,
    nameRequired,
    passwordMin,
    passwordRequired,
    rolInvalid,
    rolRequired,
    sameUser,
} from "@/Util/messages";

import { user } from "@/Util/auth";

export default function useValidations(form) {
    const validate = () => {
        let errors = {
            hasErrors: false,
            msjs: [],
        };

        console.log(form.id, user.value.id);
        if (form.id === user.value.id) {
            errors.hasErrors = true;
            errors.msjs.push(sameUser);
        }

        if (!form.name) {
            errors.hasErrors = true;
            errors.msjs.push(nameRequired);
        }

        if (!form.email) {
            errors.hasErrors = true;
            errors.msjs.push(emailRequired);
        }

        if (!form.rol_id) {
            errors.hasErrors = true;
            errors.msjs.push(rolRequired);
        }

        if (!roles.value.find((rol) => rol.id === form.rol_id)) {
            errors.hasErrors = true;
            errors.msjs.push(rolInvalid);
        }

        if (!form.password && form.checked) {
            errors.hasErrors = true;
            errors.msjs.push(passwordRequired);
        }

        if (form.password && form.password.length < 8) {
            errors.hasErrors = true;
            errors.msjs.push(passwordMin);
        }

        return errors;
    };

    return {
        validate,
    };
}
