<template>
    <app-layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Create a new project</h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xml sm:px-6 lg:px-8">
                <project-form :errors="errors" :form="form" @submit="submit">
                    <template #buttons>
                        <loading-button :disabled="loading" class="p-5 text-white bg-blue-900 border border-blue-900 rounded hover:bg-transparent hover:text-blue-900" type="submit">Create Project</loading-button>
                    </template>
                </project-form>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout';
import ProjectForm from '../../Components/ProjectForm';
import LoadingButton from '../../Components/LoadingButton.vue';
export default {
    components: {
        AppLayout,
        ProjectForm,
        LoadingButton
    },
    props: {
        errors: {}
    },
    data() {
        return {
            loading: false,
            form: {
                name: '',
                excerpt: '',
                content: ''
            }
        };
    },
    methods: {
        submit() {
            this.loading = true;
            this.$inertia.post(this.route('projects.store'), this.form).then(response => {
                this.loading = false;
            }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>
