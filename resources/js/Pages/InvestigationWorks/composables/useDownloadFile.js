import { ref, toRefs, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import html2pdf from "html2pdf.js";

export default function useDownloadFile() {
    const { props } = usePage();
    const work = ref(props.work || {});

    onMounted(() => {
        downloadFile();
    });

    const downloadFile = () => {
        const element = document.getElementById("data_table");
        const opt = {
            margin: 0.5,
            filename: "informe.pdf",
            image: { type: "jpeg", quality: 0.8 },
            html2canvas: { scale: 3 },
            pagebreak: { mode: ["avoid-all", "css", "legacy"] },
            jsPDF: {
                unit: "in",
                format: "letter",
                orientation: "portrait",
            },
        };

        const pdf = html2pdf().from(element).set(opt);
        pdf.save();
    };

    const showActivities = (act) => {
        const activity = JSON.parse(act);
        const data = [];

        activity?.one
            ? data.push("<span>SI</span>")
            : data.push("<span>NO</span>");
        activity?.two
            ? data.push("<span>SI</span>")
            : data.push("<span>NO</span>");
        activity?.three
            ? data.push("<span>SI</span>")
            : data.push("<span>NO</span>");
        activity?.four
            ? data.push("<span>SI</span>")
            : data.push("<span>NO</span>");
        return data.join(" - ");
    };

    return {
        downloadFile,
        showActivities,
        ...toRefs({
            work,
        }),
    };
}
