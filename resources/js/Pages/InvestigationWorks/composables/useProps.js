/**
 * Gestion de props para los trabajos de investigación
 */

import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";

export default function useProps() {
    const { props } = usePage();
    const item = ref(props?.item || {});
    const areas = ref(props?.areas || []);
    const lines = ref(props?.lines || []);

    const originalAreas = JSON.parse(JSON.stringify(areas.value || []));
    const originalLines = JSON.parse(JSON.stringify(lines.value || []));

    return {
        areas,
        lines,
        item,
        originalAreas,
        originalLines,
    };
}
