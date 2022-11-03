<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
defineProps(['classes']);

const form = useForm({
    lesson_id : 0
});

const submit = (user_id) => {
    form.post(route('user.lesson.store', {'user' : user_id}));
};
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form v-if="classes.length > 0" @submit.prevent="submit($page.props.auth.user.id)">
                            <div>
                                <InputLabel for="email" value="Email" />
                                <select name="" id="" v-model = "form.lesson_id">
                                    <option value="0">select one ....</option>
                                    <option v-for="c in classes" :value="c.id">{{ c.name }}</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.lesson_id" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    submit
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
