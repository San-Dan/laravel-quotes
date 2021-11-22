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
                                <BreezeLabel for="content" value="Content" />
                                <BreezeInput
                                    id="content"
                                    type="text"
                                    class="mt-1 block w-full"
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
                                    <option>Font 1</option>
                                    <option>Font 2</option>
                                    <option>Font 3</option>                               
                                </select> 
                            </div>

                            <div>
                                <BreezeLabel
                                    for="image"
                                    value="Background Image"
                                />
                                <input type="url" name="image" id="image">
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
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
// import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        // BreezeValidationErrors,
        Head,
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
        submit() {
            this.form.post(this.route("newcard"));
        },
    },
};
</script>
