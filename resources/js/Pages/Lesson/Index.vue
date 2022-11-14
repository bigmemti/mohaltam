<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
defineProps(['lessons']);

</script>

<template>

    <Head title="Lessons" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lessons
            </h2>
        </template>

        <div class="pt-12 pb-2" v-if="$page.props.auth.user.type == 1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-end">
                        <Link class="bg-green-500 p-3 px-4 inline-block mx-1 rounded-lg" :href="route('lesson.create')">create</Link>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table v-if="lessons.length > 0" class="w-full">
                            <thead>
                                <th>name</th>
                                <th>actions</th>
                            </thead>
                            <tbody>
                                <tr v-for="lesson in lessons">
                                    <td class="text-center">{{lesson.name}}</td>
                                    <td class="text-center">
                                        <Link class="bg-cyan-500 p-3 px-4 inline-block mx-1 rounded-lg" :href="route('lesson.show', {'lesson': lesson.id})">show</Link>
                                        <Link  v-if="$page.props.auth.user.type == 1" class="bg-yellow-500 p-3 px-4 inline-block mx-1 rounded-lg" :href="route('lesson.edit', {'lesson': lesson.id})">edit</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
