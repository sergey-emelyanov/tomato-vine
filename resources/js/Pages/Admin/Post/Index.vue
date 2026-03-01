<template>
    <div>
        <table class="bg-white border border-gray-200 w-full">
            <thead>
                <tr>
                    <th class="p-4 border-b border-r border-gray-200">ID</th>
                    <th class="p-4 border-b border-r border-gray-200">TITLE</th>
                    <th class="p-4 border-b border-gray-200">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts">
                    <td class="p-4 border-b border-r border-gray-200">{{ post.id }}</td>
                    <td class="p-4 border-b border-r border-gray-200">{{ post.title }}</td>
                    <td class="p-4 border-b border-gray-200"></td>
                </tr>
            </tbody>
        </table>
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
