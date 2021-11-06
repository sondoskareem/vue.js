const { default: Form } = require('./utilities/Form');

window._ = require('lodash');
import VueRouter from 'vue-router'
import Vue from 'vue';
window.Vue = Vue;
Vue.use(VueRouter)
window.axios = require('axios');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}



window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Form = Form
