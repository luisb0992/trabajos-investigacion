/**
 * Gestion de categorias de los trabajos de investigación
 */

import { categories } from "@/Util/const";
import { ref, toRefs } from "vue";

export default function useWorkCategory() {
    const selectCategory = ref({
        id: "",
        name: "",
    });

    const showForm = () => {
        console.log(selectCategory.value);
    };

    return {
        ...toRefs({
            categories,
            selectCategory,
        }),
        showForm,
    };
}
