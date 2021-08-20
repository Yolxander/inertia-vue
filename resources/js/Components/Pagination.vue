<template>
    <div class="flex w-full justify-center py-5">
        <nav
            class="
                relative
                z-0
                inline-flex
                rounded-md
                -space-x-px
                bg-white
                text-gray-500
                dark:text-white dark:bg-droptra-dark
                shadow
            "
        >
            <template v-for="(page, index) in pages" :key="index">
                <Link
                    :href="!page.url ? '#' : page.url"
                    v-if="
                        isNaN(parseInt(page.label)) &&
                        page.label.search('Previous') > 0
                    "
                    href="#"
                    class="
                        relative
                        inline-flex
                        items-center
                        px-2
                        py-2
                        rounded-l-md
                        text-sm
                        font-medium
                        border border-gray-400
                    "
                >
                    <span class="sr-only">Previous</span>
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>
                </Link>
                <span
                    v-if="page.label == '...'"
                    class="
                        relative
                        inline-flex
                        items-center
                        px-4
                        py-2
                        text-sm
                        font-medium
                        border border-gray-400
                    "
                >
                    ...
                </span>
                <Link
                    :href="page.url"
                    v-if="!isNaN(parseInt(page.label))"
                    href="#"
                    class="
                        relative
                        inline-flex
                        items-center
                        px-4
                        py-2
                        text-sm
                        font-medium
                        border border-gray-400
                    "
                >
                    {{ page.label }}
                </Link>
                <Link
                    :href="!page.url ? '#' : page.url"
                    v-if="
                        isNaN(parseInt(page.label)) &&
                        page.label.search('Next') == 0
                    "
                    href="#"
                    class="
                        relative
                        inline-flex
                        items-center
                        px-2
                        py-2
                        text-sm
                        font-medium
                        border border-gray-400
                        rounded-r-md
                    "
                >
                    <span class="sr-only">Next</span>
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>
                </Link>
            </template>
        </nav>
    </div>
</template>

<script>
import { usePage } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
export default {
    props: { pages: Object },
    components: { Link },
    setup() {
        return {};
    },
};
</script>
