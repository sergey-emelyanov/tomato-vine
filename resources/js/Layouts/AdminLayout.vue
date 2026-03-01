<template>
    <section class="w-full bg-white border-b p-4">
        <header class="w-1/2 mx-auto">
            ADMIN PANEL
        </header>
    </section>
    <section class="flex">
        <aside class="w-1/4 p-4 bg-gray-700 min-h-screen">
            <Link :href="route('dashbord')" class="block border-b text-gray-300 p-4 border-gray-500">Dasbord</Link>
            <Link :href="route('posts.index')" class="block border-b text-gray-300 p-4 border-gray-500">Posts</Link>
        </aside>
        <article class="w-3/4">
            <slot/>
        </article>
    </section>
    <section>
        <footer>

        </footer>
    </section>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components : {
        Link
    }
}
</script>

<style scoped>

</style>
