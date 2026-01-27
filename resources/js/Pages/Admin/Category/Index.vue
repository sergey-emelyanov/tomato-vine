<template>
    <div>
        Тут будет табличка с темплейтами
        <div v-for="category in categories">
            <h3>{{ category.title }}</h3>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index",

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
