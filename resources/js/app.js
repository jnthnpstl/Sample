import './bootstrap';
import '../css/app.css';
import { createApp, markRaw } from 'vue/dist/vue.esm-bundler.js';
// import Welcome from './Pages/Welcome.vue';
// import Compo from './Pages/Compo.vue'
import { createRouter, createWebHistory, useRoute } from 'vue-router'
import { routes } from './route';

import { createPinia } from 'pinia';

const router = createRouter({
    history: createWebHistory(),
    routes : routes
})

//Pinia.js

const pinia = createPinia()

pinia.use(({store}) => {
    store.router = markRaw(router)
    store.route = markRaw(useRoute())
})

const app = createApp({

});

app.use(pinia)

app.use(router);
// app.component('sample-component', Compo);
app.mount("#app");