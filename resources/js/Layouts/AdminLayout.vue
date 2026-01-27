<template>
    <section class="w-full bg-white border-b p-4">
        <header class="w-1/2 mx-auto">
            ADMIN PANEL
        </header>
    </section>
    <section class="flex">
        <aside class="w-1/4 p-4 bg-gray-700 min-h-screen">
            ASIDE
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

</script>

<style scoped>

</style>
