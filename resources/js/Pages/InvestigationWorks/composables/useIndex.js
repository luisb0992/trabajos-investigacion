import { alertConfirm, alertSuccess, validateRequest } from "@/Util/alerts";
import { success, workConfirmDelete, workDeleted } from "@/Util/messages";
import { useForm, usePage } from "@inertiajs/vue3";
import { FilterMatchMode } from "primevue/api";
import { ref, toRefs } from "vue";
// import html2pdf from "html2pdf.js";

export default function useIndex() {
    const { props } = usePage();
    const form = useForm({});
    const items = ref(props.items || []);
    const pathInvWork = ref(props.paths?.inv_work || "");
    const loading = ref(false);
    const dtworks = ref();
    const filters = ref({
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    });

    const confirmDeleteItem = (id) => {
        alertConfirm({ title: workConfirmDelete }).then((resp) => {
            if (resp.isConfirmed) {
                deleteItem(id);
            }
        });
    };

    const deleteItem = (id) => {
        loading.value = true;
        const url = route("investigation-works.destroy", {
            work: id,
        });

        form.delete(url, {
            preserveScroll: true,
            onSuccess: () => {
                alertSuccess(success, workDeleted);
                globalThis.location.reload();
            },
            onError: (errors) => validateRequest(errors),
            onFinish: () => (loading.value = false),
        });
    };

    const exportCSV = () => {
        dtworks.value.exportCSV();
    };

    return {
        confirmDeleteItem,
        exportCSV,
        dtworks,
        ...toRefs({
            filters,
            items,
            loading,
            pathInvWork,
        }),
    };
}
