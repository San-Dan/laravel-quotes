<template>
    <Head title="Welcome" />

    <div class="min-h-screen bg-header">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col p-6 bg-white border-b border-gray-200 text-color">
                        <div>
                            <Link :href="route('welcome')">
                                    <BreezeApplicationLogo
                                        class="block h-16 w-auto"
                                    />
                                </Link>
                        </div>
                        <div class="content">
                            <h1>Welcome Page</h1>
                            <p>
                                Everyone needs a place of comfort when life feels messy. <br>
                                Sign up to start sharing your own wisdom!
                            </p>
                            <br>
                            <div class="flex justify-around">
                                <ButtonLink :href="route('login')" >
                                    LOGIN
                                </ButtonLink>
                                
                                <ButtonLink :href="route('register')" >
                                    REGISTER
                                </ButtonLink>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

    .bg-header {
    background-color: var(--bg-white);
}


    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-color {
        color: var(--text-dark);
    }


    
</style>

<script>
// import GuestLayout from "@/Layouts/Authenticated.vue";
// import GuestLayout from "@/Layouts/Guest.vue";
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import ButtonLink from "@/Components/ButtonLink.vue"

export default {
    components: {
      Head,
      Link,
      BreezeApplicationLogo,
      ButtonLink
    //   GuestLayout
    },
    
}
</script>
