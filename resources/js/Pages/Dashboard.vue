<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white flex justify-center">
                        <div
                            class="
                                rounded-md
                                border border-gray-400
                                focus-within:border-blue-700
                                overflow-hidden
                                flex
                                items-center
                                w-6/12
                                ml-2
                            "
                        >
                            <input
                                type="text"
                                class="
                                    w-full
                                    ring-0
                                    border-none
                                    focus:outline-none focus:ring-0
                                "
                                placeholder="Search For SomeOne"
                                v-model="search"
                            />
                            <span
                                v-if="search"
                                @click="clearSearch"
                                class="px-2 text-red-400 cursor-pointer"
                                >X</span
                            >
                        </div>
                        <Bbutton @click="getData" class="ml-2">
                            Search
                        </Bbutton>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white flex justify-center">
                        <select
                            class="rounded-md border-gray-400"
                            @change="orderBy"
                        >
                            <option value="asc">asc</option>
                            <option value="desc">desc</option>
                        </select>
                        <div
                            class="
                                rounded-md
                                border border-gray-400
                                focus-within:border-blue-700
                                overflow-hidden
                                flex
                                items-center
                                w-56
                                ml-2
                            "
                        >
                            <input
                                type="text"
                                class="
                                    w-full
                                    ring-0
                                    border-none
                                    focus:outline-none focus:ring-0
                                "
                                placeholder="Filter By Name"
                                v-model="filterValue"
                            />
                            <span
                                v-if="filterValue"
                                @click="filterValue = ''"
                                class="px-2 text-red-400 cursor-pointer"
                                >X</span
                            >
                        </div>
                        <Bbutton class="ml-2 bg-red-600" @click="reset">
                            Reset
                        </Bbutton>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <card
                        v-for="user in users.data"
                        :key="user.id"
                        :user="user"
                    />
                </div>
            </div>
        </div>
        <pagination :pages="pages" class="mt-5" />
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Bbutton from "@/Components/Button.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";
import { computed, ref } from "@vue/reactivity";
import axios from "axios";
import { Inertia } from "@inertiajs/inertia";
import Card from "@/Components/Card.vue";
import Pagination from "@/Components/Pagination.vue";
import _ from "lodash";
import { watch } from "@vue/runtime-core";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Bbutton,
        Card,
        Pagination,
    },
    props: { users: Object },
    setup(props) {
        const search = ref("");

        const users = computed(() => props.users);
        const pages = computed(() => usePage().props.value.users.meta.links);

        function getData() {
            let query = {};
            if (search.value.length > 0) {
                query = {
                    search: search.value,
                };
            }
            Inertia.get("/", query, {
                preserveScroll: true,
                preserveState: true,
            });
        }
        function clearSearch() {
            search.value = "";

            Inertia.get(
                "/",
                {},
                {
                    preserveScroll: true,
                    preserveState: true,
                }
            );
        }
        function orderBy(e) {
            Inertia.get(
                "/",
                {
                    orderBy: e.target.value,
                },
                {
                    preserveScroll: true,
                    preserveState: true,
                }
            );
        }

        function reset() {
            if (confirm("are you sur you want to delete all the users")) {
                Inertia.delete("/");
            }
        }

        const filterValue = ref("");

        watch(
            filterValue,
            _.throttle((e) => {
                Inertia.get(
                    "/",
                    {
                        filter: filterValue.value,
                    },
                    {
                        preserveScroll: true,
                        preserveState: true,
                    }
                );
            }, 2000)
        );

        return {
            search,
            getData,
            users,
            pages,
            clearSearch,
            orderBy,
            reset,
            filterValue,
        };
    },
};
</script>
