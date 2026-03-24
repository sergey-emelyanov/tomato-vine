<template>
    <div>
        Тут будет табличка с темплейтами
        <div v-for="category in categories">
            <h3>{{ category.title }}</h3>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';

    export default {
        name: "Index",
        layout: AdminLayout,

        props: {
            categories : {
                type: Array,
                required: false
            }
        }
    }
</script>

<style scoped>

</style>
