<template>
    <app-layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Projects
            </h2>
        </template>
        <div class="py-12">
            <div class="hover:bg-gray-100 focus-within:bg-gray-100">
                <div class="py-2 pr-10 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block w-full px-12 py-4 overflow-hidden align-middle bg-white rounded-tl-lg rounded-tr-lg shadow-lg">
                        <div class="flex justify-between">
                            <div class="inline-flex w-7/12 h-12 px-2 bg-transparent border rounded lg:px-6">
                                <div class="relative flex flex-wrap items-stretch w-full h-full mb-6">
                                    <div class="flex">
                                        <span class="flex items-center py-2 text-sm leading-normal whitespace-no-wrap bg-transparent border border-r-0 border-none rounded rounded-r-none lg:px-3 text-grey-dark">
                                            <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                    <input type="text" class="relative flex-1 flex-auto flex-grow flex-shrink w-px px-3 font-thin leading-normal tracking-wide text-gray-500 border border-l-0 border-none rounded rounded-l-none focus:outline-none text-xxs lg:text-xs lg:text-base" placeholder="Search" v-model="form.search">
                                </div>
                            </div>
                            <div class="w-2/12 h-12 bg-transparent border rounded">
                                <select class="block w-full p-3 font-semibold text-gray-900 border rounded focus:outline-none focus-within:outline-none" v-model="form.trashed">
                                    <option value="with">With trashed</option>
                                    <option value="only">Just trashed</option>
                                </select>
                            </div>
                            <div class="w-1/12 h-12 bg-transparent border rounded">
                                <button type="button" class="block w-full py-3 pl-2 text-white bg-red-900 rounded hover:text-blue-900 hover:bg-gray-200" @click="reset()">Clear Search</button>
                            </div>
                            <div class="w-1/12 h-12 bg-transparent border rounded">
                                <inertia-link class="block w-full py-3 pl-5 text-white bg-blue-900 rounded hover:text-blue-900 hover:bg-gray-200" :href="route('projects.create')">Create project</inertia-link>
                            </div>
                        </div>
                    </div>
                    <div class="inline-block min-w-full px-8 pt-3 overflow-hidden align-middle bg-white rounded-bl-lg rounded-br-lg shadow shadow-dashboard">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">ID</th>
                                    <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">Name</th>
                                    <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">Excerpt</th>
                                    <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">User</th>
                                    <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">Created At</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <project v-for="project in projects.data" :key="project.id" :project="project"/>
                            </tbody>
                        </table>
                        <pagination :links="projects.links" />
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import debounce from "lodash/debounce";
import pickBy from "lodash/pickBy";
import mapValues from "lodash/mapValues";
import AppLayout from "@/Layouts/AppLayout";
import Pagination from "../../Components/Pagination";
import Project from '../../Components/Project';
import Button from '../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button.vue';
export default {
    components: {
        AppLayout,
        Pagination,
        Project
    },
    props: {
        projects: {},
        filters: {}
    },
    data() {
        return {
            form: {
                search: this.filters.search,
                trashed: this.filters.trashed
            }
        };
    },
    watch: {
        form: {
            handler: debounce(function() {
                let query = pickBy(this.form);
                this.$inertia.replace(this.route('projects.index', query))
            }, 500),
            deep:true
        }
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null);
        }
    }
}
</script>
