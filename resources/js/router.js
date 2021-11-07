import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Users from './components/Users/index.vue'
import CreateUser from './components/Users/create.vue'

import Sessions from './components/Sessions/index.vue'
import PostSessions from './components/Sessions/create.vue'

import Sections from './components/Sections/index.vue'
import PostSections from './components/Sections/create.vue'

const routes=[
    {
        path: '/',
        component: Vue.component('mainapp', () => import('./components/mainapp.vue')),
        name: 'welcome',
    },
    /////////////User
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
    ////////////////Sessions
    {
        path:'/get/sessions',
        component:Sessions
    },
    {
        path:'/post/sessions',
        component:PostSessions
    },
    {
        path:'/post/sessions:id',
        component:PostSessions
    },
    ///////////////Sections
    {
        path:'/get/secions',
        component:Sections
    },
    {
        path:'/post/sections',
        component:PostSections
    },
    {
        path:'/post/sections:id',
        component:CreateUser
    },

]

export const routers =  new VueRouter({
    mode:'history',
    routes
})

