<script setup>
import { sampleStore } from '@/Store/sampleStore';
import { onMounted } from 'vue'
import { storeToRefs } from 'pinia';
const sex = ["", "Male", "Female"]
const sample = sampleStore();



const { students } = storeToRefs(sample) 


onMounted(() => {
    sample.getList()
});

</script>

<template>
    <section class="p-7">
        <RouterLink to="/store/student/create" >
            <button class="text-white bg-amber-400 hover:bg-amber-500 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                Create Student
            </button>
        </RouterLink>

    <div class="bg-white shadow-md sm:rounded-lg overflow-hidden my-4">
        <table class="w-full text-sm text-left text-gray-500 table-fixed">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-4 py-4">Name</th>
                    <th class="px-4 py-4">Birthday</th>
                    <th class="px-4 py-4">Address</th>
                    <th class="px-4 py-4">Sex</th>
                    <th class="px-4 py-4">Height</th>
                    <th class="px-4 py-4">Weight</th>
                    <th class="px-4 py-4">Actions</th>
                </tr>
            </thead>
            <tbody id="list">
                <template v-if="students">
                    <template v-if="students.length > 0">
                        <tr v-for="student in students" class="border-b ">
                            <td class="px-4 py-3">{{ student.name }}</td>
                            <td class="px-4 py-3">{{ student.birthday }}</td>
                            <td class="px-4 py-3">{{ student.address }}</td>
                            <td class="px-4 py-3">{{ sex[student.sex] }}</td>
                            <td class="px-4 py-3">{{ student.height }}</td>
                            <td class="px-4 py-3">{{ student.weight }}</td>
                            <td>
                                <RouterLink :to="`/store/student/${student.id}/edit`">
                                <button class="text-white bg-lime-500 hover:bg-lime-700 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none mx-2">
                                        Edit
                                </button>
                                </RouterLink>
                                <button @click="sample.deleteStudent(student.id)" class="text-white bg-cyan-500 hover:bg-cyan-700 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">Delete</button>
                            </td>
                        </tr>
                    </template>
                </template>
            </tbody>
        </table>
    </div>
</section>
</template>

<style scoped>

</style>