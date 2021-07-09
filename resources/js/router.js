import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import users from './components/Users/index.vue'
import create_user from './components/Users/create.vue'

const routes=[
    {
        path: '/',
        component: Vue.component('mainapp', () => import('./components/mainapp.vue')),
        name: 'welcome',
    },
    {
        path:'/users',
        component:users
    },
    {
        path:'/usercreate',
        component:create_user
    }

]

export const router =  new VueRouter({
    mode:'history',
    routes
})

