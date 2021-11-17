<template>
    <div class="min-h-screen bg-header">
        <nav class="bg-header mx-4">
            <!-- Primary Navigation Menu -->       
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <Link :href="route('welcome')">
                                    <BreezeApplicationLogo
                                        class="block h-9 w-auto"
                                    />
                                </Link>
                                
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div>
                                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                                    Log in
                                </Link>

                                <Link :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                                    Register
                                </Link>
                            </div>


                        </div>

                    </div>
        </nav>
        

        <!-- Page Content -->
            <main>
                <slot />
            </main>
    </div>
</template>

<style scoped>

    .bg-header {
    background-color: var(--bg-white);
}
</style>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
// import BreezeDropdown from "@/Components/Dropdown.vue";
// import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import Button from "@/Components/Button.vue"
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeApplicationLogo,
        // BreezeDropdown,
        // BreezeDropdownLink,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        Link,
        Button
    },
}
</script>
