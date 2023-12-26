/**
 * Gestion de props para los trabajos de investigación
 */

import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import { projectStatus, projectTypes } from "@/Util/const";

export default function useProps() {
    const { props } = usePage();
    const item = ref(props?.item || {});
    const areas = ref(props?.areas || []);
    const lines = ref(props?.lines || []);
    const types = projectTypes;
    const statuses = projectStatus;

    const originalAreas = JSON.parse(JSON.stringify(areas.value || []));
    const originalLines = JSON.parse(JSON.stringify(lines.value || []));
    const originalTypes = JSON.parse(JSON.stringify(types.value || []));
    const originalStatuses = JSON.parse(JSON.stringify(statuses.value || []));

    return {
        areas,
        lines,
        item,
        types,
        statuses,
        originalAreas,
        originalLines,
        originalTypes,
        originalStatuses,
    };
}
