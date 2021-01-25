<template>
    <div class="w-full">
        <label :for="id" class="block mb-2 text-sm font-bold text-gray-700" :class="{ 'text-red-400': error }">
            {{ label }}
        </label>
        <input type="text" :id="id" v-bind="$attrs" :class="{ 'border-red-400': error }" :value="value" @input="$emit('input', $event.target.value)"
            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        <div class="text-red-500" v-if="error">{{ error }}</div>
    </div>
</template>
<script>
import FormInput from '../Mixins/FormInput'
export default {
    name: "TextInput",
    mixins: [FormInput]
}
</script>
