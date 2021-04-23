require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue';
require('./myfunc')

// import router from './router.js';
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('news-index', require('./components/NewsIndexComponent.vue').default);
Vue.component('news-create', require('./components/NewsCreateComponent.vue').default);
Vue.component('news-edit', require('./components/NewsEditComponent.vue').default);




const app = new Vue({
    el: '#app',
    // router: router
});
