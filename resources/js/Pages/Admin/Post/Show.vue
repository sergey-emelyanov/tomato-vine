<template>
    <div class="bg-white p-4 border border-gray-200">
        <div class="text-lg mb-4">
            {{ post.title }}
        </div>
        <div v-for="image_url in urls" class="text-gray-600 mb-4">
            <img :src="image_url" :title="post.title" :alt="post.title"/>
        </div>
        <div class="text-gray-600 text-sm mb-4">
            <p>{{ post.body }}</p>
        </div>
        <div class="text-gray-700">
            <p>{{ post.description }}</p>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

    export default {
        name: "Show",
        layout: AdminLayout,


        components : {
            Link
        },

        props: {
            post : {
                type: Object,
                required: true
            },
            urls: {
                type: Array,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
