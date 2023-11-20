/**
 * Gestion de validaciones para el formulario de trabajos de investigación
 */

import {
    areaRequired,
    authorsRequired,
    fileRequired,
    lineRequired,
    titleRequired,
} from "@/Util/messages";
import { computed } from "vue";

export default function useValidations(form) {
    const hasAuthors = computed(() => {
        return form.authors.every((a) => a.name && a.lastname);
    });

    const validate = () => {
        let errors = {
            hasErrors: false,
            msjs: [],
        };

        if (!form.title) {
            errors.hasErrors = true;
            errors.msjs.push(titleRequired);
        }

        if (!form.area_id) {
            errors.hasErrors = true;
            errors.msjs.push(areaRequired);
        }

        if (!form.line_id) {
            errors.hasErrors = true;
            errors.msjs.push(lineRequired);
        }

        if (!hasAuthors.value) {
            errors.hasErrors = true;
            errors.msjs.push(authorsRequired);
        }

        if (!form.file) {
            errors.hasErrors = true;
            errors.msjs.push(fileRequired);
        }

        return errors;
    };

    return {
        validate,
        hasAuthors,
    };
}
