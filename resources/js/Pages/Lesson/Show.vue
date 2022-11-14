<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
defineProps(['lesson','users']);

</script>

<template>

    <Head title="Show lesson" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show lesson
            </h2>
        </template>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>Name : {{lesson.name}}</p>
                        <div  v-if="$page.props.auth.user.type == 1">
                            <Link class="p-3 bg-yellow-500 my-4 inline-block px-4 rounded-lg hover:bg-yellow-600" :href="route('lesson.edit', {'lesson' : lesson.id})">Edit</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="text-xl bolder">Students</p>
                        <table v-if="users.length > 0" class="w-full">
                            <thead>
                                <th>name</th>
                                <th>student id</th>
                            </thead>
                            <tbody>
                                <tr v-for="user in users">
                                    <td class="text-center">{{user.first_name}} {{user.last_name}}</td>
                                    <td class="text-center">{{user.student_id}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
