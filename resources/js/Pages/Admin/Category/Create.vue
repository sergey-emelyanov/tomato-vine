<template>
    <div class="bg-white p-4 border border-gray-200">
        <div>
            <Link :href="route('admin.categories.index')" class="inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white mb-4">BACK</Link>
        </div>
        <div class="mb-4">
            <input type="text" v-model="category.title" placeholder="title" class="border border-gray-200 p-4 w-full">
        </div>
        <div class="mb-4">
            <a href="#" @click.prevent="storeCategory" class="inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';

    export default {
        name: "Create",
        layout: AdminLayout,

        components: {
            Link
        },

        data() {
            return {
                category: {
                    title: ''
                }
            }
        },

        methods: {
            storeCategory() {
                axios.post(route('admin.categories.store'), this.category).then(
                    console.log('Успех')
                );
            }
        }


    }
</script>

<style scoped>

</style>
