<template>
    <app-layout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">Edit project {{ project.name }}</h1>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xml sm:px-6 lg:px-8">
                <project-form :errors="errors" :form="form" @submit="submit">
                    <template #buttons>
                        <button class="p-5 mr-5 text-gray-900 bg-red-800 border border-red-800 rounded hover:text-red-800 hover:bg-transparent" type="button" @click="showModal = true">
                            Delete project
                        </button>
                        <loading-button :disabled="loading" class="p-5 ml-5 text-gray-200 bg-blue-900 border border-blue-900 rounded hover:text-blue-900 hover:bg-transparent" type="submit">
                            Update project
                        </loading-button>
                    </template>
                </project-form>
            </div>
        </div>
        <jet-confirmation-modal :show="showModal" @close="showModal = false">
            <template #title>Delete project</template>
            <template #content>Are you you want to delete the project?</template>
            <template #footer>
                <jet-secondary-button @click.native="showModal = false">Cancel</jet-secondary-button>
                <jet-danger-button @click.native="destroy" class="ml-2" :class="{ 'opacity-25': loading }" :disabled="loading">Delete project</jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ProjectForm from "../../Components/ProjectForm";
import LoadingButton from '../../Components/LoadingButton';
import JetConfirmationModal from '@/Jetstream/ConfirmationModal';
import JetSecondaryButton from '@/Jetstream/SecondaryButton';
import JetDangerButton from '@/Jetstream/DangerButton';
export default {
    components: {
        AppLayout,
        ProjectForm,
        LoadingButton,
        JetDangerButton,
        JetSecondaryButton,
        JetConfirmationModal,
    },
    props: {
        project: {},
        errors: {}
    },
    data() {
        return {
            loading: false,
            showModal: false,
            form: {
                name: this.project.name,
                excerpt: this.project.excerpt,
                content: this.project.content
            }
        };
    },
    methods: {
        submit() {
            this.loading = true;
            this.$inertia.put(this.route('projects.update', this.project.id), this.form).then(() => this.loading = false).catch(error => console.log(error));
        },
        destroy() {
            this.loading = true;
            this.$inertia.delete(this.route('projects.destroy', this.project.id)).then(() => this.loading = false).catch(error => console.log(error));
        }
    }
}
</script>%V$!#$rd
