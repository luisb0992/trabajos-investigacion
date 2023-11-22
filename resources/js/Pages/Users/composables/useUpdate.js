/**
 * Gestion de creación de un nuevo trabajo de investigación
 */

import { useForm, usePage } from "@inertiajs/vue3";
import { ref, toRefs, onMounted } from "vue";
import { alertError, alertSuccess, validateRequest } from "@/Util/alerts";
import { success, userUpdated, validateFields } from "@/Util/messages";
import { roles } from "@/Util/const.js";
import { normalizeString } from "@/Util/filters";
import useValidations from "./useValidations";

export default function useUpdate() {
    const { props } = usePage();
    const user = props.item;
    const loading = ref(false);
    const useRoles = JSON.parse(JSON.stringify(roles.value));

    const form = useForm({
        id: "",
        name: "",
        email: "",
        password: "",
        rol: "",
        rol_id: "",
        checked: false,
    });

    onMounted(() => {
        loadUser();
    });

    const loadUser = () => {
        form.id = user.id;
        form.name = user.name;
        form.email = user.email;
        form.rol = useRoles.find((rol) => rol.id === user.rol_id);
        form.rol_id = user.rol_id;
    };

    const update = () => {
        const { validate } = useValidations(form);

        if (validate().hasErrors) {
            const errors = validate().msjs.join("<br>");
            return alertError(validateFields, errors);
        }

        loading.value = true;
        form.put(
            route("users.update", {
                user: user.id,
            }),
            {
                preserveScroll: true,
                onSuccess: () => {
                    form.reset();
                    alertSuccess(success, userUpdated);
                },
                onError: (errors) => validateRequest(errors),
                onFinish: () => (loading.value = false),
            }
        );
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
        update,
        searchRole,
        ...toRefs({
            roles,
            form,
            loading,
        }),
    };
}
