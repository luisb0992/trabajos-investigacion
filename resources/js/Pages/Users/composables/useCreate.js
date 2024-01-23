/**
 * Gestion de creación de un nuevo trabajo de investigación
 */

import { alertError, alertSuccess, validateRequest } from "@/Util/alerts";
import { normalizeString } from "@/Util/filters";
import { ref, toRefs } from "vue";
import { roles } from "@/Util/const.js";
import { success, userCreated, validateFields } from "@/Util/messages";
import { useForm } from "@inertiajs/vue3";
import useValidations from "./useValidations";

export default function useCreate() {
    const loading = ref(false);
    const useRoles = JSON.parse(JSON.stringify(roles.value));

    const form = useForm({
        name: "",
        email: "",
        password: "",
        rol: "",
        rol_id: "",
    });

    const create = () => {
        const { validate } = useValidations(form);

        if (validate().hasErrors) {
            const errors = validate().msjs.join("<br>");
            return alertError(validateFields, errors);
        }

        loading.value = true;
        form.post(route("users.store"), {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                alertSuccess(success, userCreated);
            },
            onError: (errors) => validateRequest(errors),
            onFinish: () => (loading.value = false),
        });
    };

    const searchRole = (event) => {
        const query = event.query;

        if (query) {
            roles.value = useRoles.filter((rol) => {
                const word = normalizeString(query);
                const name = normalizeString(rol.name);
                return name.indexOf(word) !== -1;
            });
            return;
        }

        roles.value = [...useRoles];
    };

    return {
        create,
        searchRole,
        ...toRefs({
            roles,
            form,
            loading,
        }),
    };
}
