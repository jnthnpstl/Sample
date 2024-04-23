<script setup>
import { sampleStore } from '@/Store/sampleStore';
import { onMounted } from 'vue'
import { useRoute } from 'vue-router';
import { storeToRefs } from 'pinia';
const route = useRoute()
const sample = sampleStore();

const { form } = storeToRefs(sample)

onMounted(() => {
    if (sample.route.params.id){
        sample.getStudent()
    }
});

</script>

<template>
    <section class="p-7">

       
            <button @click="sample.router.go(-1)" class="text-white bg-violet-900 hover:bg-violet-950 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                Back
            </button>
        <div class="my-4">
            <form @submit.prevent="sample.saveStudent" class="flex flex-col gap-3">
                <input id="name" type="text" placeholder="Student name" v-model="form.name" required class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2"/>
                <input id="birthday" type="date" v-model="form.birthday" placeholder="DD/MM/YYYY" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2"/>
                <input id="address" type="Address" placeholder="Address" v-model="form.address" required class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2"/>
                <select id="sex" v-model="form.sex" required class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
                <input id="height" type="number" placeholder="Height" v-model="form.height" required class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2"/>
                <input id="weight" type="number" placeholder="Weight" v-model="form.weight" required class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2"/>
                <button type="submit" class="text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">Save</button>
            </form>
        </div>
    </section>
</template>

<style scoped>

</style>