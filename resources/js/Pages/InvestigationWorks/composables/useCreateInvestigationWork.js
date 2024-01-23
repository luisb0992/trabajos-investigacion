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
    const {
        areas,
        lines,
        statuses,
        types,
        originalAreas,
        originalLines,
        originalTypes,
        originalStatuses,
    } = useProps();

    const { searchArea, searchLine, searchStatus, searchType } = useFilters(
        areas,
        lines,
        statuses,
        types,
        originalAreas,
        originalLines,
        originalStatuses,
        originalTypes
    );

    const form = useForm({
        title: "",
        location: "",
        area: "",
        line: "",
        area_id: "",
        line_id: "",
        category_id: "",
        file: null,
        status: { id: "", name: "" },
        type: { id: "", name: "" },
        es_summary: "",
        en_summary: "",
        approach: "",
        justification: "",
        background: "",
        general_objective: "",
        specific_objective: "",
        expected_results: "",
        methodology: "",
        orcid_code: "",
        homeland_plans: "",
        bibliography: "",
        historical_objectives: "",
        national_objectives: "",
        strategic_objectives: "",
        general_objectives: "",
        relationship_objectives: "",
        authors: authors.value,
        aspects: [],
        items: [],
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
                globalThis.location = route("investigation-works.index");
            },
            onError: (errors) => validateRequest(errors),
            onFinish: () => (loading.value = false),
        });
    };

    return {
        ...toRefs({
            areas,
            lines,
            statuses,
            types,
            form,
            authors,
            loading,
        }),
        create,
        searchArea,
        searchLine,
        addAuthor,
        searchStatus,
        searchType,
        removeAuthor,
    };
}
