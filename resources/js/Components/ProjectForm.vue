<template>
    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md" @submit.prevent="$emit('submit')">
        <div class="mb-4">
            <text-input label="Project Name" v-model="form.name" :error="errors.name"/>
        </div>
        <div class="mb-6">
            <text-area label="Excerpt" v-model="form.excerpt" :rows="3" :error="errors.excerpt"/>
        </div>
        <div class="mb-6">
            <text-area label="Content" v-model="form.content" :rows="6" :error="errors.content"/>
        </div>
        <div class="flex items-center justify-center px-8 py-4 border-t border-gray-200">
            <slot name="buttons" />
        </div>
    </form>
</template>
<script>
    import TextArea from "./TextArea";
    import TextInput from "./TextInput";
    export default {
        name: "ProjectForm",
        components: {
            TextInput, TextArea,
        },
        props: {
            errors: {},
            form: {}
        },
    }
</script>
