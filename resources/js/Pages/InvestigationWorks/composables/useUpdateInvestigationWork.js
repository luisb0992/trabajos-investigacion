/**
 * Gestion de actualización de un nuevo trabajo de investigación
 */

import { useForm, router } from "@inertiajs/vue3";
import { onMounted, ref, toRefs } from "vue";
import { alertError, alertSuccess, validateRequest } from "@/Util/alerts";

import useProps from "./useProps.js";
import useFilters from "./useFilters.js";
import useAuthors from "./useAuthors.js";
import useValidations from "./useValidations.js";
import { success, validateFields, workUpdated } from "@/Util/messages.js";
import {
    aspects,
    items,
    projectStatus,
    projectTypes,
    activities,
    quarters,
} from "@/Util/const.js";

export default function useUpdateInvestigationWork() {
    const loading = ref(false);
    const { authors, addAuthor, removeAuthor } = useAuthors();
    const {
        item,
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
        _method: "put",
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
        loadData();
    });

    const loadData = () => {
        form.reset();
        form.orcid_code = item.value.orcid_code;
        form.title = item.value.title;
        form.area = item.value.area.name;
        form.line = item.value.line.name;
        form.area_id = item.value.area_id;
        form.line_id = item.value.line_id;
        form.file = item.value.file;
        form.category_id = item.value.category_id;
        form.location = item.value.location;
        form.status = projectStatus.value.find(
            (i) => i.id === item.value.status
        );
        form.type = projectTypes.value.find((t) => t.id === item.value.type);
        form.es_summary = item.value.es_summary;
        form.en_summary = item.value.en_summary;
        form.approach = item.value.approach;
        form.justification = item.value.justification;
        form.background = item.value.background;
        form.general_objective = item.value.general_objective;
        form.specific_objective = item.value.specific_objective;
        form.expected_results = item.value.expected_results;
        form.methodology = item.value.methodology;
        // homeland plans
        form.bibliography = item.value.homeland_plan?.bibliography;
        form.homeland_plans = item.value.homeland_plan?.homeland_plans;
        form.historical_objectives =
            item.value.homeland_plan?.historical_objectives;
        form.national_objectives =
            item.value.homeland_plan?.national_objectives;
        form.strategic_objectives =
            item.value.homeland_plan?.strategic_objectives;
        form.general_objectives = item.value.homeland_plan?.general_objectives;
        form.relationship_objectives =
            item.value.homeland_plan?.relationship_objectives;

        // autores
        form.authors = item.value.authors.map((author) => {
            return {
                dni: author.dni,
                name: author.firstname,
                lastname: author.lastname,
                email: author.email,
                phone: author.phone,
                address: author.address,
                level_instruction: author.level_instruction,
                function_project: author.level_instruction,
            };
        });

        // aspectos
        const ethical = item.value.ethical_aspect;
        if (ethical) {
            const allAspects = [
                ethical.principles_beneficence === 1 ? true : false,
                ethical.ethics_commission === 1 ? true : false,
                ethical.biological_samples === 1 ? true : false,
                ethical.medical_attention === 1 ? true : false,
                ethical.protection_mechanisms === 1 ? true : false,
                ethical.collective_informed === 1 ? true : false,
                ethical.informed_consent === 1 ? true : false,
                ethical.person_investigation === 1 ? true : false,
                ethical.data_confidentiality === 1 ? true : false,
                ethical.research_impact === 1 ? true : false,
                ethical.description_procedures === 1 ? true : false,
                ethical.query_forecast === 1 ? true : false,
                ethical.consideration_impact === 1 ? true : false,
                ethical.animal_sacrifice === 1 ? true : false,
                ethical.study_animals === 1 ? true : false,
                ethical.animal_habitat === 1 ? true : false,
            ];
            allAspects.unshift("");
            form.aspects = allAspects;
            allAspects.map((asp, i) => {
                aspects.value.map((as) => {
                    if (as.id === i) {
                        as.select = asp;
                    }
                });
            });
        }

        // rubros
        const itemService = item.value.item_service;
        if (itemService) {
            const filterItems = [
                itemService.incentive ?? parseFloat("0.00"),
                itemService.material_supplier ?? parseFloat("0.00"),
                itemService.services ?? parseFloat("0.00"),
                itemService.viatic ?? parseFloat("0.00"),
                itemService.mobilization ?? parseFloat("0.00"),
            ];
            filterItems.unshift("");
            form.items = filterItems;
            filterItems.map((item, i) => {
                items.value.map((it) => {
                    if (it.id === i) {
                        it.amount = item;
                    }
                });
            });
        }

        // actividades
        const sche_act = item.value.schedule_activity;
        if (sche_act) {
            const filterAct = [
                JSON.parse(sche_act.revision),
                JSON.parse(sche_act.description),
                JSON.parse(sche_act.analysis),
                JSON.parse(sche_act.drafting),
                JSON.parse(sche_act.conclusions),
            ];
            // agregar un indice en primero lugar
            filterAct.unshift("");
            // agregar al array del formulario
            form.activities = filterAct;
            // agregar a los checkbox
            filterAct.map((act, i) => {
                activities.value.map((ac) => {
                    if (ac.id === i) {
                        ac.select_1 = act?.one ? true : false;
                        ac.select_2 = act?.two ? true : false;
                        ac.select_3 = act?.three ? true : false;
                        ac.select_4 = act?.four ? true : false;
                    }
                });
            });
        }

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
            item,
            statuses,
            types,
            form,
            authors,
            loading,
        }),
        update,
        searchArea,
        searchLine,
        addAuthor,
        removeAuthor,
        searchStatus,
        searchType,
        assignActivity,
    };
}
