<template>
    <Head title="New Collection" />

    <BreezeAuthenticatedLayout>
        <div class="p-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2
                            class="
                                font-semibold
                                text-xl text-dark
                                leading-tight
                            "
                        >
                            Create new collection
                        </h2>
                        <form @submit.prevent="submit" class="m-4">
                            <div>
                                <BreezeLabel for="name" value="Name" />
                                <BreezeInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autofocus
                                />
                            </div>

                            <div>
                                <BreezeLabel
                                    for="bgcolor"
                                    value="Background Color"
                                />
                                <!-- <input type="color" name="blue" id="bgcolor"> -->
                                <select id="bgcolor" v-model="form.selected">
                                    <option disabled value="">
                                        Please select one
                                    </option>
                                    <option >
                                        Blue
                                    </option>
                                    <option value="green">Green</option>
                                    <option value="pink">Pink</option>
                                    <option value="yellow">Yellow</option>
                                    <option value="purple">Purple</option>
                                </select> 
                                <!-- <p>Selected color: {{ selected }}</p> -->
                            </div>

                            <div>
                                <BreezeLabel
                                    for="public"
                                    value="Public Collection"
                                />
                                <input
                                    type="checkbox"
                                    id="public"
                                    v-model="form.public"
                                />
                                <label for="public">Yes, make public</label>
                            </div>

                            <BreezeButton
                                class="ml-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Submit
                            </BreezeButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
// import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head } from "@inertiajs/inertia-vue3";
// import { reactive } from "vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        // BreezeValidationErrors,
        Head,
        // reactive,
    },

    // setup() {
    //     const form = reactive({
    //         name: null,
    //         bgcolor: "blue",
    //         public: false,
    //     });
    // },

    data() 
    { return {
            form: this.$inertia.form({
                name: "",
                selected: "",
                public: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("new.collection"));
        },
    },
};
</script>
