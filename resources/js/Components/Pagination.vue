<template>
    <div class="flex flex-wrap mt-6">
        <template v-for="(link, key) in links">
            <div v-if="!link.url" :key="key" class="px-4 py-3 mb-1 mr-1 text-sm text-gray-500 border rounded">
                {{ link.label }}
            </div>
            <inertia-link v-else :key="key" class="px-4 mb-1 mr-1 text-sm border rounded py3 hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-indigo-600 text-white': link.active }" :href="link.url">
                {{ link.label }}
            </inertia-link>
        </template>
    </div>
</template>
<script>
export default {
    name: 'Pagination',
    props: {
        links: Array
    }
}
</script>
