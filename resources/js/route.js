import Index from './Pages/Student/index.vue'
import Form from './Pages/Student/Form.vue'

import IndexStore from './Pages/StudentStore/index.vue'
import FormStore from './Pages/StudentStore/Form.vue'

import Student from "./Pages/Student.vue"
export const routes = [
    {
        path: '/', 
        component: Index,
        name: 'Home nga Composition'
    },
    {
        path: '/student/create', 
        component: Form,
        name: 'Form nga Composition'
    },
    {
        path: '/student/:id/edit', 
        component: Form,
        name: 'Form Edit nga Composition'
    },
    {
        path: '/store',
        component: Student,
        name:"Index Store",
        children: [
            {
                path: '', 
                component: IndexStore,
                name: 'Index Student Store'
            },
            {
                path: 'student/create', 
                component: FormStore,
                name: 'Create Student Store'
            },
            {
                path: 'student/:id/edit', 
                component: FormStore,
                name: 'Edit Student Store'
            },
        ]
    }
]