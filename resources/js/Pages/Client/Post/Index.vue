<template>
    <div class="w-1/2 mx-auto mb-4">
        <span class="">index posts</span>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts">
                    <td>{{ post.id }}</td>
                    <td>{{ post.title }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "Index",

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
