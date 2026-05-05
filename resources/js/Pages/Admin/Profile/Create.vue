<template>
    <div class="bg-white p-4 border border-gray-200">
        <div class="inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white m-4">
            <Link :href="route('admin.profiles.index')">BACK</Link>
        </div>
        <div class="mb-4">
            <input class="border border-gray-200 p-4 w-full" type="text" placeholder="ФИО">
        </div>
        <div class="mb-4">
            <input class="border border-gray-200 p-4 w-full" type="text" placeholder="Страна">
        </div>
        <div class="mb-4">
            <select v-model="selectedGender" class="border border-gray-200 p-4 w-full">
                <option>male</option>
                <option>female</option>
            </select>
        </div>
        <div class="mb-4">
            <input class="border border-gray-200 p-4 w-full" type="date" placeholder="birthday">
        </div>
        <div class="mb-4">
            <input type="checkbox" id="checkbox" v-model="marital_status" class="mr-4">
            <label for="checkbox">Женат</label>
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

        methods : {
            showOne(){
                console.log('1111!');
            }
        }
    }
</script>


<style scoped>

</style>
