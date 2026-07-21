<template>
    <div class="bg-white p-4 border border-gray-200 ">
        <div class="inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white mb-4">
            <Link :href="route('admin.posts.index')">BACK</Link>
        </div>
        <div class="mb-4">
            <input v-model="entries.post.title" class="border border-gray-200 p-4 w-full" type="text" placeholder="title">
        </div>
        <div class="mb-4">
            <textarea v-model="entries.post.body" class="border border-gray-200 p-4 w-full" placeholder="body"></textarea>
        </div>
        <div class="mb-4">
            <select v-model="entries.post.category_id" class="border border-gray-200 p-4 w-full">
                <option value="null">Не выбрано</option>
                <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
            </select>
        </div>
        <div class="mb-4">
            <input ref="input_image" @change="setImage" class="border border-gray-200 p-4 w-full" type="file" multiple/>
        </div>
        <div class="mb-4">
            <input v-model="entries.tags" class="border border-gray-200 p-4 w-full" type="text"  placeholder="tags"/>
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
                entries : {
                    post: {
                        title: '',
                        body: '',
                        category_id: null,
                        files: []
                    },
                    tags: ''
                }
            }
        },

        methods : {
            storePost () {

                // let formData = new FormData();
                // console.log(this.entries);

                axios.post(route('admin.posts.store'), this.entries, {
                    headers: {
                        "Content-Type": "multipart/form-data"
                    }
                })
                    .then((res)=> {
                        this.$refs.input_image.value = null
                        this.post = {
                            category_id: null
                        }
                    })
            },

            setImage(e) {
                console.log(this.entries.post.files);
                let files = e.target.files;
                for(let file of files){
                    this.entries.post.files.push(file);
                }
                // this.entries.post.files = files;
                console.log(this.entries);
            }

        }
    }
</script>

<style scoped>

</style>
