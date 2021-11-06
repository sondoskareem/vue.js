import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Users from './components/Users/index.vue'
import Sessions from './components/Sessions/index.vue'
import CreateUser from './components/Users/create.vue'

const routes=[
    {
        path: '/',
        component: Vue.component('mainapp', () => import('./components/mainapp.vue')),
        name: 'welcome',
    },
    {
        path:'/get/users',
        component:Users
    },
    {
        path:'/usercreate',
        component:CreateUser
    },
    {
        path:'/usercreate/:id',
        component:CreateUser
    },

    {
        path:'/sessions/user/:id',
        component:Sessions
    }

]

export const routers =  new VueRouter({
    mode:'history',
    routes
})

