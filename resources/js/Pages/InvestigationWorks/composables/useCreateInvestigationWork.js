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
import { quarters } from "@/Util/const";

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
        activities: [],
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
        console.log(form);

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

    const assignActivity = (quarter, id, checked) => {
        let key = "one";

        if (quarter == quarters.value.one) {
            key = "one";
        } else if (quarter == quarters.value.two) {
            key = "two";
        } else if (quarter == quarters.value.three) {
            key = "three";
        } else if (quarter == quarters.value.four) {
            key = "four";
        }

        // remover
        if (!checked) {
            const activity = form.activities[id];

            if (activity) {
                const hasQuarter = activity[key] ? true : false;

                if (hasQuarter) {
                    // eliminar del array
                    delete activity[key];
                }

                const hasActivity = Object.keys(activity).length > 0;

                if (!hasActivity) {
                    delete form.activities[id];
                }
            }
        }

        // agregar
        if (checked) {
            const activity = form.activities[id];

            if (!activity) {
                const act = (form.activities[id] = {});
                act[key] = quarter;
                return false;
            }

            if (activity) {
                const hasQuarter = activity[key] ? true : false;

                if (!hasQuarter) {
                    activity[key] = quarter;
                }
            }
        }
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
        assignActivity,
    };
}
