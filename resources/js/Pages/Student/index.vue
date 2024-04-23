<script setup>
import { ref, onMounted } from 'vue'
const students = ref(null);
const sex = ["", "Male", "Female"]

onMounted(() => {
    getList();
});

function getList() {
    window.axios.get('/student').then(({data}) => {
        students.value = data;
    })
}


function deleteStudent(id) {
    window.axios.post(`/student/delete`, {id}).then(({data}) => {
        getList();
    })
}

</script>

<template>
    <RouterLink to="/student/create">Create Student</RouterLink>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Sex</th>
                    <th>Height</th>
                    <th>Weight</th>
                </tr>
            </thead>
            <tbody id="list">
                <template v-if="students">
                    <template v-if="students.length > 0">
                        <tr v-for="student in students">
                            <td>{{ student.name }}</td>
                            <td>{{ student.birthday }}</td>
                            <td>{{ student.address }}</td>
                            <td>{{ student.sex }}</td>
                            <td>{{ student.height }}</td>
                            <td>{{ student.weight }}</td>
                            <td>
                                <RouterLink :to="`/student/${student.id}/edit`">Edit</RouterLink>
                                <button @click="deleteStudent(student.id)">Delete</button>
                            </td>
                        </tr>
                    </template>
                </template>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>