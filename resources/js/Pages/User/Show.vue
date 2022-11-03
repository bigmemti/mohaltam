<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
defineProps(['user']);

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
                        <p>First name : {{user.first_name}}</p>
                        <p>Last name : {{user.last_name}}</p>
                        <p>Email : {{user.email}}</p>
                        <p>Student ID : {{user.student_id}}</p>
                        <div>
                            <Link class="p-3 bg-yellow-500 my-4 inline-block px-4 rounded-lg hover:bg-yellow-600" :href="route('user.edit', {'user' : user.id})">Edit</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
