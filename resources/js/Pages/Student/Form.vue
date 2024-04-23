<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router';
const route = useRoute()

const form = ref({
    id : null,
    name: '',
    address: '',
    birthday: '',
    sex: 1,
    height: 0,
    weight: 0,
});

onMounted(() => {
    window.axios.get(`/student/${route.params.id}`).then(({data}) => {
        if (data) {
            form.value = data
        }
    })
});


function saveStudent(e){
    window.axios.post('/student/create', form.value).then(({data}) => {
        if(data) {
            form.value.id = null;
            form.value.name = '';
            form.value.birthday = '';
            form.value.address = '';
            form.value.sex = '';
            form.value.height = '';
            form.value.weight = '';
        }
    });
}



</script>

<template>
  <RouterLink to="/">Back</RouterLink>
    <div>
        <form @submit.prevent="saveStudent" class="flex flex-col gap-3">
            <input id="name" type="text" placeholder="Name of Student" v-model="form.name" required/>
            <input id="birthday" type="date" v-model="form.birthday" >
            <input id="address" type="address" placeholder="address" v-model="form.address" required>
            <select id="sex" v-model="form.sex" required>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            <input id="height" type="number" placeholder="height" v-model="form.height" required>
            <input id="weight" type="number" placeholder="weight" v-model="form.weight" required/>

            <button type="submit">save</button>
        </form>
    </div>
</template>

<style scoped>

</style>