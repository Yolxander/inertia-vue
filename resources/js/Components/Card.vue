<template>
    <div class="p-2 w-full md:w-6/12 lg:w-4/12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
            <span
                class="
                    absolute
                    top-2
                    right-4
                    bg-red-400
                    shadow-md
                    rounded-full
                    text-white
                    px-2
                    active:shadow-sm
                    cursor-pointer
                "
                @click="deleteUser(user.id)"
                >X</span
            >
            <div class="p-6 bg-white">
                <div class="w-full">
                    <a
                        :href="user.github_profile_url"
                        class="
                            inline-block
                            overflow-hidden
                            w-20
                            h-20
                            mx-auto
                            rounded-full
                            shadow-md
                            border border-gray-300
                        "
                    >
                        <img
                            class="w-full h-full"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAM1BMVEXk5ueutLfn6eqrsbTp6+zg4uOwtrnJzc/j5earsbW0uby4vcDQ09XGyszU19jd3+G/xMamCvwDAAAFLklEQVR4nO2d2bLbIAxAbYE3sDH//7WFbPfexG4MiCAcnWmnrzkjIRaD2jQMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMw5wQkHJczewxZh2lhNK/CBOQo1n0JIT74/H/qMV0Z7GU3aCcVPuEE1XDCtVLAhgtpme7H0s1N1U7QjO0L8F7llzGeh1hEG/8Lo7TUmmuSrOfns9xnGXpXxsONPpA/B6OqqstjC6Ax/0ujkNdYQQbKNi2k64qiiEZ+ohi35X+2YcZw/WujmslYewiAliVYrxgJYrdwUmwXsU+RdApUi83oNIE27YvrfB/ZPg8+BJETXnqh9CVzBbTQHgojgiCvtqU9thFJg/CKz3VIMKMEkIXxIWqIpIg2SkjYj+xC816mrJae2aiWGykxRNsW0UwiJghJDljYI5CD8GRiCtIsJxizYUPQ2pzItZy5pcisTRdk/a9m4amtNNfBuQkdVhSaYqfpNTSFGfb9GRIakrE2Pm+GFLaCQPqiu0OpWP+HMPQQcgQMiQprWXNmsVwIjQjYi/ZrhAqNTCgr2gu0Jnz85RSSjso0HkMFZ0YZjKkc26a/jlmh9JiDyDxi9oeorTYAzZkwwoMz19pzj9bnH/GP/+qbchjSGflneWYhtTuKdMOmNKZcJ5TjInQKcYXnESd/jQxy0ENpULTNGOGgxpap/oyw9pbUAqhfx2Dbkhovvfgz4iUzoM9+GlK6/Mh4q29hyC1mwro30hpVVLPF9wYQr71RazOeM5/cw81iBRD+A03aM9/C/obbrKjbYSpCmIVG3qT/Q8oeUo3Rz0IL7vI1tEbCB9pSiu8I/aV8x3Kg/BGWrWp4ZVs0nZfmAoEG4h/61yHYIJiFSl6Q0Vk6tTW1N8kYp8hdOkfHYYMXd2Qft+8CYwqYDSKvqIh+MCF8Wgca2u/cwdgeW3TtuVn6+1oBs3yLo5C2JpK6CvQzGpfUkz9UG/87gCsi5o2LIXolxN0FbwAsjOLEr+YJmXn7iR6N0BCt5p5cMxm7eAsfS+/CACQf4CTpKjzgkvr2cVarVTf96372yut7XLJ1sa7lv6VcfgYrWaxqr3Wlo1S6pvStr22sxOtTNPLzdY3nj20bPP+ejFdJYkLsjGLdtPBEbe/mr2bQKiXWJDroA+vtzc0p9aahuwqHMDYrQEXHEw9jwQl3drMpts9JBU1SdktPe5FBRdJQ6bwXBpa57ib2A8kukQDzMjh++Uo7Fo6Wd02Pkf4fknqoo4HtvAIjsqUcjx6DIPgWCaOML9rKI/oqD9/lgNrn+eF+p7j8tnzHBiR7+kdUGw/+V1Kzkc75mMy6U+FMaxjPibiM1U1uGM+puInHpmALZCgP4pt7i840MV8+0R1zPsRB6UTcqpizncYwZ89syDydfyWCwXB1l8/zRNGWbTG/GHKUm9AkxHMc/EGSk3z2+ArEhPEV5TUBLEvUGFcjEUH80J/jveTGOAJEljJbILWGQT3zRYiwuKsUXN1EEJAzBhRJFll7mBUG7KD8EqPkKekBREaL8hMDZLQSG6AQjtHPYmvTQnX0TtpC1SYCe2YdkkyLP3jj5BSbKiuR585eQhTgoje6yIb0Yb0C+mV6EYvebqw5SDy2WmubogZiF2AVxPC2FpDf8H2Q9QWo6IkjUxTWVEI3WY/wrCeSuqJ+eRWzXR/JXwgVjUMozbCOfoEZiSiKVGepqv5CJ8RyR4D7xBeamqa7z3BJ/z17JxuBPdv93d/a2Ki878MMAzDMAzDMAzDMAzDMF/KP09VUmxBAiI3AAAAAElFTkSuQmCC"
                        />
                    </a>
                </div>
                <div class="mt-5 divide-y-2">
                    <div class="p-2">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-xs">UserName</span>
                            <a
                                class="font-semibold uppercase"
                                :href="user.github_profile_url"
                            >
                                {{ user.user_name }}
                            </a>
                        </div>
                        <div
                            class="flex justify-between items-center"
                            v-if="user.name"
                        >
                            <span class="text-gray-400 text-xs">Name</span>
                            <h2 class="font-semibold uppercase">
                                {{ user.name }}
                            </h2>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-xs">Followers</span>
                            <h2
                                class="
                                    font-semibold
                                    text-gray-500 text-sm
                                    uppercase
                                "
                            >
                                {{ user.followers }}
                            </h2>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-xs">Stars</span>
                            <h2
                                class="
                                    font-semibold
                                    text-gray-500 text-sm
                                    uppercase
                                "
                            >
                                {{ user.stars }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { Inertia } from "@inertiajs/inertia";
export default {
    props: { user: Object },
    methods: {
        deleteUser(id) {
            if (confirm("are you sur you want to delete this user")) {
                Inertia.delete(
                    "/" + id,
                    {},
                    {
                        preserveScroll: true,
                        preserveState: true,
                    }
                );
            }
        },
    },
};
</script>
