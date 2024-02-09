/**
 * Gestion de validaciones para el formulario de trabajos de investigación
 */

import {
    areaRequired,
    authorsDNIHasAMax,
    authorsHasANumber,
    authorsLastnameIsMax,
    authorsNameIsMax,
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

    const allDNIAuthorsNumber = computed(() => {
        return form.authors.every((a) => Number(a.dni));
    });

    const allDNIAuthorsIsMax = computed(() => {
        return form.authors.every((a) => a.dni?.length <= 8);
    });

    const allNameIAuthorsIsMax = computed(() => {
        return form.authors.every((a) => a.dni.length <= 254);
    });

    const allLastnameAuthorsIsMax = computed(() => {
        return form.authors.every((a) => a.dni.length <= 254);
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

        if (!allDNIAuthorsNumber.value) {
            errors.hasErrors = true;
            errors.msjs.push(authorsHasANumber);
        }

        if (!allDNIAuthorsIsMax.value) {
            errors.hasErrors = true;
            errors.msjs.push(authorsDNIHasAMax);
        }

        if (!allNameIAuthorsIsMax.value) {
            errors.hasErrors = true;
            errors.msjs.push(authorsNameIsMax);
        }

        if (!allLastnameAuthorsIsMax.value) {
            errors.hasErrors = true;
            errors.msjs.push(authorsLastnameIsMax);
        }

        // if (!form.file) {
        //     errors.hasErrors = true;
        //     errors.msjs.push(fileRequired);
        // }

        return errors;
    };

    return {
        validate,
        hasAuthors,
    };
}
