<script>
import { ref, onMounted } from 'vue'

export default {
    data() {
        return {
            count : 0,
            bg : 'bg-green-800',
            form : {
                id : null,
                name: '',
                address: '',
                birthday: '',
                sex: 1,
                height: 0,
                weight: 0,
            },
            students : null,
        }
    },
    mounted() {
        this.getList()
    },

    methods: {
        countUp() {
            this.count++;
            if (this.count >= 0){
                this.bg = 'bg-green-800'
            }
        },
        countDown() {
            this.count--;
            if (this.count < 0) {
                this.bg = 'bg-red-500'
            }
        },
        changeColor(val) {
            val? this.count++ : this.count--;
            this.bg = this.count == 0 ? 'bg-white' : (this.count > 0 ? 'bg-green-800 text-white' : 'text-white bg-red-800');
        },
        
        saveStudent(e){
                window.axios.post('student/create',
                    this.form
                ).then(({data}) => {
                    if(data){
                        this.form.id = null;
                        this.form.name = '';
                        this.form.birthday = '';
                        this.form.address = '';
                        this.form.sex = '';
                        this.form.height = '';
                        this.form.weight = '';
                        this.getList();
                    }
                });
        },
        getList(){
            window.axios.get('/student').then(({data}) => {
            this.students = data;
            })
        },

        deleteStudent(id) {
            window.axios.post(`/student/delete`, {id}).then(({data}) => {
            this.getList();
            })
        },

        editStudent(val) {
            this.form = val;  
        }
    },
    
}


</script>

<template>
  
    <div>
        <form @submit.prevent="saveStudent" class="flex flex-col gap-3">
            <input id="name" type="text" placeholder="Name of Student" v-model="form.name" />
            <input id="birthday" type="date" v-model="form.birthday" >
            <input id="address" type="address" placeholder="address" v-model="form.address" />
            <select id="sex" v-model="form.sex" >
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            <input id="height" type="number" placeholder="height" v-model="form.height">
            <input id="weight" type="number" placeholder="weight" v-model="form.weight"/>

            <button type="submit">save</button>
        </form>
    </div>

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
                                <button @click="editStudent(student)">Edit</button>
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