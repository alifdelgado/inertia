<template>
    <tr>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
            <div class="flex items-center">
                <div>
                    <div class="text-sm leading-5 text-gray-800">#1</div>
                </div>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
            <div class="text-sm leading-5 text-blue-900"><inertia-link :href="route('projects.edit', project.id)">{{ project.name }}</inertia-link></div>
        </td>
        <td class="px-6 py-4 text-sm leading-5 text-blue-900 whitespace-no-wrap border-b border-gray-500"><inertia-link :href="route('projects.edit', project.id)">{{ project.excerpt }}</inertia-link></td>
        <td class="px-6 py-4 text-sm leading-5 text-blue-900 whitespace-no-wrap border-b border-gray-500"><inertia-link :href="route('projects.edit', project.id)">{{ project.user.name }}</inertia-link></td>
        <td class="px-6 py-4 text-sm leading-5 text-blue-900 whitespace-no-wrap border-b border-gray-500">{{ project.created_at }}</td>
        <td class="px-6 py-4 text-sm leading-5 text-right whitespace-no-wrap border-b border-gray-500">
            <button class="px-5 py-2 text-blue-500 transition duration-300 border border-blue-500 rounded hover:bg-blue-700 hover:text-white focus:outline-none">View Details</button>
        </td>
    </tr>
</template>
<script>
export default {
    name: 'Project',
    props: {
        project: {}
    }
}
</script>
