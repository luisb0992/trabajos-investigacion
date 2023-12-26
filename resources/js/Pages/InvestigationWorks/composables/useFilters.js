/**
 * Gestion de los filtros para los trabajos de investigación
 */

import { normalizeString } from "@/Util/filters";

export default function useFilters(
    areas,
    lines,
    statuses,
    types,
    initAreas,
    initLines,
    initStatus,
    initTypes
) {
    /**
     * Buscar por area de investigación
     */
    const searchArea = (event) => {
        const query = event.query;

        if (query) {
            areas.value = initAreas.filter((area) => {
                const word = normalizeString(query);
                const name = normalizeString(area.name);
                return name.indexOf(word) !== -1;
            });
            return;
        }

        areas.value = [...initAreas];
    };

    /**
     * Buscar por linea de investigación
     */
    const searchLine = (event) => {
        const query = event.query;

        if (query) {
            lines.value = initLines.filter((line) => {
                const word = normalizeString(query);
                const name = normalizeString(line.name);
                return name.indexOf(word) !== -1;
            });
            return;
        }

        lines.value = [...initLines];
    };

    /**
     * Buscar status del proyecto
     */
    const searchStatus = (event) => {
        const query = event.query;

        if (query) {
            statuses.value = initStatus.filter((status) => {
                const word = normalizeString(query);
                const name = normalizeString(status.name);
                return name.indexOf(word) !== -1;
            });
            return;
        }

        statuses.value = [...initStatus];
    };

    /**
     * Buscar tipo de proyecto
     */
    const searchType = (event) => {
        const query = event.query;

        if (query) {
            types.value = initTypes.filter((type) => {
                const word = normalizeString(query);
                const name = normalizeString(type.name);
                return name.indexOf(word) !== -1;
            });
            return;
        }

        types.value = [...initTypes];
    };

    return {
        searchArea,
        searchLine,
        searchStatus,
        searchType,
    };
}
