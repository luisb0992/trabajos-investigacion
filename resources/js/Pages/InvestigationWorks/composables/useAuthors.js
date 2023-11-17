/**
 * Gestion para los autores de un trabajo de investigación
 */

import { ref, toRefs } from "vue";

export default function useAuthors() {
    const authors = ref([]);

    const addAuthor = () => {
        const author = {
            name: "",
            lastname: "",
        };
        authors.value.push(author);
    };

    const removeAuthor = (index) => {
        authors.value.splice(index, 1);
    };

    return {
        ...toRefs({
            authors,
        }),
        addAuthor,
        removeAuthor,
    };
}
