<template>
    <div>Тут наши профили</div>
    <div v-for="profile in profiles">
        <h3>{{ profile.name }}</h3>
    </div>
</template>

<script>
    export default {
        name: "Index",

        props: {
            profiles : {
                type: Array,
                required: false
            }
        }
    }
</script>


<style scoped>

</style>
