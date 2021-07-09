
require('./bootstrap');
window.Vue = require('vue').default;
import {router} from "./router";
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import mainapp from './components/mainapp.vue';
// Vue.component('mainapp', require('./components/mainapp.vue').default);
import axios from 'axios'
import VueAxios from 'vue-axios'
import welcome from './components/Welcome';



// Vue.use(VueRouter);

const layoutOne = new Vue({
    el: '#app',
    router: router,
    // render:h=>h(mainapp)
});