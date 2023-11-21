import {
    alertConfirm,
    alertInfo,
    alertSuccess,
    validateRequest,
} from "@/Util/alerts";
import { user } from "@/Util/auth";
import {
    success,
    userCantDelete,
    userCantDeleteInSesion,
    userConfirmDelete,
    userDeleted,
} from "@/Util/messages";
import { useForm, usePage } from "@inertiajs/vue3";
import { FilterMatchMode } from "primevue/api";
import { ref, toRefs } from "vue";

export default function useIndex() {
    const { props } = usePage();
    const form = useForm({});
    const items = ref(props.items || []);
    const loading = ref(false);
    const dtusers = ref();
    const filters = ref({
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    });

    const confirmDelete = (id) => {
        if (id === user.value.id) {
            alertInfo(userCantDelete, userCantDeleteInSesion);
            return;
        }

        alertConfirm({ title: userConfirmDelete }).then((resp) => {
            if (resp.isConfirmed) {
                deleteItem(id);
            }
        });
    };

    const deleteItem = (id) => {
        loading.value = true;
        const url = route("users.destroy", { user: id });

        form.delete(url, {
            preserveScroll: true,
            onSuccess: () => {
                alertSuccess(success, userDeleted);
                globalThis.location.reload();
            },
            onError: (errors) => validateRequest(errors),
            onFinish: () => (loading.value = false),
        });
    };

    const exportCSV = () => {
        dtusers.value.exportCSV();
    };

    return {
        confirmDelete,
        exportCSV,
        dtusers,
        ...toRefs({
            filters,
            items,
            loading,
        }),
    };
}
