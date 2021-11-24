<template>
    <Head title="New Card" />

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
                            Create new card
                        </h2>
                        <form @submit.prevent="submitCard" class="m-4">
                            <div>
                                <BreezeLabel for="name" value="Name" />
                                <BreezeInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-4/5 md:w-3/5"
                                    v-model="form.name"
                                    required
                                    autofocus
                                />
                            </div>

                            <div>
                                <BreezeLabel for="content" value="Content" />
                                <BreezeInput
                                    id="content"
                                    type="text"
                                    class="mt-1 block w-4/5 md:w-3/5 h-20"
                                    v-model="form.content"
                                    required
                                    autofocus
                                />
                            </div>

                            <div>
                                <BreezeLabel
                                    for="fontstyle"
                                    value="Choose Font"
                                />
                                <!-- <input type="color" name="blue" id="bgcolor"> -->
                                <select id="fontstyle" v-model="form.selected">
                                    <option disabled value="">
                                        Please select one
                                    </option>
                                    <option value="Arial">Font 1</option>
                                    <option value="">Font 2</option>
                                    <option value="">Font 3</option>                               
                                </select> 
                            </div>

                            <div>
                                <BreezeLabel
                                    for="image"
                                    value="Background Image"
                                />
                                <input type="url" name="image" id="image">
                            </div>
                           <div class="my-4 flex flex-row">
                            <BreezeButton
                                class="ml-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Submit
                            </BreezeButton>
                            <Link :href="route('profile')" class="underline text-sm text-dark hover:text-gray-900 ml-6 mt-4">
                                Cancel, back to profile
                            </Link>
                            </div>
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
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link
    },

    data() 
    { return {
            form: this.$inertia.form({
                name: "",
                content: "",
                fontstyle: "",
                image: "",                               
            }),
        };
    },

    methods: {
        submitCard() {

            let formData = this.form;

            console.log(formData);

            this.$inertia.post(this.route("new.card"), formData);
            
        },
    },
};
</script>
