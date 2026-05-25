<template>
    <div class="bg-white p-4 border border-gray-200">
        <div class="inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white m-4">
            <Link :href="route('admin.profiles.index')">BACK</Link>
        </div>
        <div class="mb-4">
            <input v-model="profile.name" class="border border-gray-200 p-4 w-full" type="text" placeholder="ФИО">
        </div>
        <div class="mb-4">
            <input  v-model="profile.country" class="border border-gray-200 p-4 w-full" type="text" placeholder="Страна">
        </div>
        <div class="mb-4">
            <select v-model="profile.gender" class="border border-gray-200 p-4 w-full">
                <option>Мужской</option>
                <option>Женский</option>
            </select>
        </div>
        <div class="mb-4">
            <input v-model="profile.birthday" class="border border-gray-200 p-4 w-full" type="date" placeholder="birthday">
        </div>
        <div class="mb-4">
            <span>Состоит ли в браке: </span>
            <input type="checkbox" id="checkbox" v-model="profile.is_married" class="mr-4">
        </div>
        <div class="mb-4">
            <a href="javascript:;"   @click="showOne"  class="inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

    export default {
        name: "Create",
        layout: AdminLayout,

        components: {
            Link
        },

        data() {
            return {
                profile: {
                    name: "",
                    country: "",
                    gender: "",
                    birthday: "",
                    is_married: false
                }
            }
        },

        methods : {
            showOne(){
                axios.post(route('admin.profiles.store'), this.profile).then(
                    (res) => {
                        console.log(res);
                    }
                )
            }
        }
    }
</script>


<style scoped>

</style>
