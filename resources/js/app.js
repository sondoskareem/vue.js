
require('./bootstrap');
window.Vue = require('vue').default;
import {routers} from "./router";


Vue.config.productionTip = false


const layoutOne = new Vue({
    el: '#app',
    router: routers,
    // render:h=>h(mainapp)
});
