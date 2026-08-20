<template>
    <div class="bg-white p-4 border border-gray-200">
        <div class="inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white mb-4">
            <Link :href="route('admin.posts.index')">BACK</Link>
        </div>
        <div class="mb-4">
            <input v-model="post.title" class="border border-gray-200 p-4 w-full" type="text" placeholder="title">
        </div>
         <div class="mb-4">
            <textarea v-model="post.body" class="border border-gray-200 p-4 w-full" placeholder="body"></textarea>
        </div>
        <div class="mb-4">
            <select v-model="post.category_id" class="border border-gray-200 p-4 w-full">
                <option value="null">Не выбрано</option>
                <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
            </select>
        </div>
        <div v-for="image_url in urls" class="text-gray-600 mb-4">
            <img :src="image_url" :title="post.title" :alt="post.title"/>
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
        name: "Edit",
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
            },
            categories : {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
