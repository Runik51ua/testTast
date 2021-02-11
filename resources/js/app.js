
require('./bootstrap');

window.Vue = require('vue');

Vue.component('table-el', require('./components/table-el.vue').default);

const app = new Vue({
    el: '#app',
});
