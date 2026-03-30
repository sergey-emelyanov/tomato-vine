<template>
    <div class="bg-white p-4 border border-gray-200">
        <div class="text-lg mb-4">
            {{ category.id }}
        </div>
        <div class="text-gray-600 text-sm mb-4">
            <p>{{ category.title }}</p>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

    export default {
        name: "Index",
        layout: AdminLayout,

        components: {
            Link
        },

        props: {
            category : {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
