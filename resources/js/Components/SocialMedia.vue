<script setup>
import { RRSS } from "@/Util/const";
</script>
<template>
    <span>
        <a
            class="ml-3"
            :href="RRSS.facebook"
            rel="noopener noreferrer"
            target="_blank"
        >
            <svg
                class="w-5 h-5"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                fill="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M18 2a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -.883 .993l-.117 .007h-3v1h3a1 1 0 0 1 .991 1.131l-.02 .112l-1 4a1 1 0 0 1 -.858 .75l-.113 .007h-2v6a1 1 0 0 1 -.883 .993l-.117 .007h-4a1 1 0 0 1 -.993 -.883l-.007 -.117v-6h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-4a1 1 0 0 1 .883 -.993l.117 -.007h2v-1a6 6 0 0 1 5.775 -5.996l.225 -.004h3z"
                    stroke-width="0"
                    fill="currentColor"
                />
            </svg>
        </a>
        <a
            class="ml-3"
            :href="RRSS.twitter"
            rel="noopener noreferrer"
            target="_blank"
        >
            <svg
                fill="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                class="w-5 h-5"
                viewBox="0 0 24 24"
            >
                <path
                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
                ></path>
            </svg>
        </a>
        <a
            class="ml-3"
            :href="RRSS.instagram"
            rel="noopener noreferrer"
            target="_blank"
        >
            <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                class="w-5 h-5"
                viewBox="0 0 24 24"
            >
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path
                    d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
                ></path>
            </svg>
        </a>
    </span>
</template>
