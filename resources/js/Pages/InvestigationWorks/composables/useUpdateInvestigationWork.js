/**
 * Gestion de actualización de un nuevo trabajo de investigación
 */

import { useForm, router } from "@inertiajs/vue3";
import { computed, onMounted, ref, toRefs } from "vue";
import { alertError, alertSuccess, validateRequest } from "@/Util/alerts";

import useProps from "./useProps.js";
import useFilters from "./useFilters.js";
import useAuthors from "./useAuthors.js";
import useValidations from "./useValidations.js";
import { success, validateFields, workUpdated } from "@/Util/messages.js";

export default function useUpdateInvestigationWork() {
    const loading = ref(false);
    const { authors, addAuthor, removeAuthor } = useAuthors();
    const { item, areas, lines, originalAreas, originalLines } = useProps();
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
        _method: "put",
        authors: authors.value,
    });

    onMounted(() => {
        loadData();
    });

    const loadData = () => {
        form.reset();
        form.title = item.value.title;
        form.area = item.value.area.name;
        form.line = item.value.line.name;
        form.area_id = item.value.area_id;
        form.line_id = item.value.line_id;
        form.file = item.value.file;
        form.authors = item.value.authors.map((author) => {
            return {
                name: author.firstname,
                lastname: author.lastname,
            };
        });

        authors.value = form.authors;
    };

    const update = () => {
        const { validate } = useValidations(form);
        if (validate().hasErrors) {
            const errors = validate().msjs.join("<br>");
            return alertError(validateFields, errors);
        }

        const url = route("investigation-works.update", {
            work: item.value.id,
        });

        loading.value = true;
        router.post(url, form, {
            onSuccess: () => alertSuccess(success, workUpdated),
            onError: (errors) => validateRequest(errors),
            onFinish: () => (loading.value = false),
        });
    };

    return {
        ...toRefs({
            areas,
            lines,
            item,
            form,
            authors,
            loading,
        }),
        update,
        searchArea,
        searchLine,
        addAuthor,
        removeAuthor,
    };
}
