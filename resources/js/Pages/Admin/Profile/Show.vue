<template>
    <div class="bg-white p-4 border border-gray-200">
        <div class="text-lg mb-4">
            {{ profile.name }}
        </div>
        <div class="text-gray-600 text-sm mb-4">
            <p>{{ profile.gender }}</p>
        </div>
        <div class="text-gray-700">
            <p>{{ profile.country }}</p>
        </div>
    </div>

</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

    export default {
        name: "Show",
        layout: AdminLayout,

        props: {
            profile : {
                type: Object,
                required: true
            }
        },

        components: {
            Link
        }
    }
</script>


<style scoped>

</style>
