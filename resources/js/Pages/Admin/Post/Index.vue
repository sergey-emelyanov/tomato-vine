<template>
    <div class="w-1/2 mx-auto mb-4">
        <span class="">index posts</span>
        <div v-for="post in posts" class="mb-4 p-4 border border-gray-400">
            <h3>{{ post.title }}</h3>
            <p>{{ post.body }}</p>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';

    export default {
        name: "Index",
        layout: AdminLayout,

        props: {
            posts : {
                type: Array,
                required: false
            }
        }
    }
</script>

<style scoped>

</style>
