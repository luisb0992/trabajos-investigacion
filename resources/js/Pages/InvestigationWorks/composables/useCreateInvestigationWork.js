/**
 * Gestion de creación de un nuevo trabajo de investigación
 */

import { useForm } from "@inertiajs/vue3";
import { computed, onMounted, ref, toRefs } from "vue";
import { usePage } from "@inertiajs/vue3";
import { normalizeString } from "@/Util/filters";
import useAuthors from "@/Pages/InvestigationWorks/composables/useAuthors.js";
import { alertError, alertSuccess, validateRequest } from "@/Util/alerts";

export default function useCreateInvestigationWork() {
    const { props } = usePage();
    const { authors, addAuthor, removeAuthor } = useAuthors();
    const areas = ref(props.areas || []);
    const lines = ref(props.lines || []);
    const loading = ref(false);

    const originalAreas = JSON.parse(JSON.stringify(props.areas || []));
    const originalLines = JSON.parse(JSON.stringify(props.lines || []));

    const form = useForm({
        title: "",
        area: "",
        line: "",
        area_id: "",
        line_id: "",
        file: null,
        authors: [],
    });

    onMounted(() => {
        addAuthor();
    });

    /**
     * Verificar si al menos hay cargado algún autor
     */
    const hasAuthors = computed(() => {
        return authors.value.some((author) => author.name && author.lastname);
    });

    const createInvestigationWork = () => {
        form.authors = authors.value;

        if (!form.title) {
            return alertError("Aviso", "El título es requerido");
        }

        if (!form.area_id) {
            return alertError("Aviso", "El área es requerida");
        }

        if (!form.line_id) {
            return alertError("Aviso", "La línea es requerida");
        }

        if (!hasAuthors.value) {
            return alertError("Aviso", "Debe agregar al menos un autor");
        }

        if (!form.file) {
            return alertError("Aviso", "Debe seleccionar un archivo");
        }

        loading.value = true;
        form.post(route("investigation-works.store"), {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                authors.value = [];
                addAuthor();
                alertSuccess(
                    "Éxito",
                    "Trabajo de investigación guardado con éxito"
                );
            },
            onError: (errors) => validateRequest(errors),
            onFinish: () => (loading.value = false),
        });
    };

    const searchArea = (event) => {
        const query = event.query;

        if (query) {
            areas.value = originalAreas.filter((area) => {
                const word = normalizeString(query);
                const name = normalizeString(area.name);
                return name.indexOf(word) !== -1;
            });
            return;
        }

        areas.value = [...originalAreas];
    };

    const searchLine = (event) => {
        const query = event.query;

        if (query) {
            lines.value = originalLines.filter((line) => {
                const word = normalizeString(query);
                const name = normalizeString(line.name);
                return name.indexOf(word) !== -1;
            });
            return;
        }

        lines.value = [...originalLines];
    };

    return {
        ...toRefs({
            areas,
            lines,
            form,
            authors,
            loading,
        }),
        createInvestigationWork,
        searchArea,
        searchLine,
        addAuthor,
        removeAuthor,
    };
}
