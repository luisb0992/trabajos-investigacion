/**
 * Gestion de creación de un nuevo trabajo de investigación
 */

import { useForm } from "@inertiajs/vue3";
import { onMounted, ref, toRefs } from "vue";
import { alertError, alertSuccess, validateRequest } from "@/Util/alerts";
import { success, validateFields, workCreated } from "@/Util/messages";
import useAuthors from "@/Pages/InvestigationWorks/composables/useAuthors.js";
import useProps from "./useProps";
import useValidations from "./useValidations";
import useFilters from "./useFilters";

export default function useCreateInvestigationWork() {
    const loading = ref(false);
    const { authors, addAuthor, removeAuthor } = useAuthors();
    const { areas, lines, originalAreas, originalLines } = useProps();
    const { searchArea, searchLine } = useFilters(
        areas,
        lines,
        originalAreas,
        originalLines
    );

    const form = useForm({
        title: "",
        area: "",
        line: "",
        area_id: "",
        line_id: "",
        file: null,
        authors: authors.value,
    });

    onMounted(() => {
        addAuthor();
    });

    const create = () => {
        const { validate } = useValidations(form);

        if (validate().hasErrors) {
            const errors = validate().msjs.join("<br>");
            return alertError(validateFields, errors);
        }

        loading.value = true;
        form.post(route("investigation-works.store"), {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                authors.value = [];
                addAuthor();
                alertSuccess(success, workCreated);
            },
            onError: (errors) => validateRequest(errors),
            onFinish: () => (loading.value = false),
        });
    };

    return {
        ...toRefs({
            areas,
            lines,
            form,
            authors,
            loading,
        }),
        create,
        searchArea,
        searchLine,
        addAuthor,
        removeAuthor,
    };
}
