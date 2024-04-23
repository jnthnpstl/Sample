import { defineStore } from "pinia";


export const sampleStore = defineStore('sample', {
    state: () => {
        return {
            students: null,
            form: {
                id : '',
                name : '',
                birthday: '',
                address: '',
                sex: 1,
                height: 0,
                weight: 0
            }
        }
    },
    actions: {
        getList() {
            this.$reset()
            window.axios.get('/student').then(({data}) => {
                this.students = data;
            })
        },
        deleteStudent(id) {
            window.axios.post(`/student/delete`, {id}).then(({data}) => {
                if (data == "Success") {
                    this.getList();
                }
            })
        },
        saveStudent(e){
            window.axios.post('/student/create', this.form).then(({data}) => {
                if(data) {
                    this.$reset()
                }
            });
        },
        getStudent() {
            window.axios.get(`/student/${this.route.params.id}`).then(({data}) => {
                if (data) {
                    this.form = data
                }
            })
        }
    }
})

