require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue';
import router from './router.js';
require('./myfunc')


/** For admin */
Vue.component('news-create', require('./components/NewsCreateComponent.vue').default);
Vue.component('news-edit', require('./components/NewsEditComponent.vue').default);
/** end */

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('news-index', require('./components/NewsIndexComponent.vue').default);
// Vue.component('index-bg', require('./components/IndexJumbotronComponent.vue').default);




const app = new Vue({
    el: '#app',
    router: router
});
