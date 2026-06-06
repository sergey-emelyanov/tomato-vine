<template>
    <div class="bg-white p-4 border border-gray-200 ">
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
        <div class="mb-4">
            <input @change="setImage" class="border border-gray-200 p-4 w-full" type="file">
        </div>
        <div class="mb-4">
            <a href="#" @click.prevent="storePost" class="inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
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

        components : {
            Link
        },

        props: {
            categories: Array
        },

        data() {
            return {
                post: {
                    title: '',
                    body: '',
                    category_id: null
                }
            }
        },

        methods : {
            storePost () {
                axios.post(route('admin.posts.store'), this.post, {
                    headers: {
                        "Content-Type": "multipart/form-data"
                    }
                })
                    .then((res)=> {
                        console.log(res);
                    })
            },

            setImage(e) {
                this.post.image = e.target.files[0];
                // console.log(this.post);
            }

        }
    }
</script>

<style scoped>

</style>
