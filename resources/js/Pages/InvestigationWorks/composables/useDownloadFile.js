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
            filename: "invoice.pdf",
            image: { type: "png", quality: 1 },
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

    return {
        downloadFile,
        ...toRefs({
            work,
        }),
    };
}
