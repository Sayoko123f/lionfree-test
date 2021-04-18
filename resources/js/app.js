require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('guess-number', require('./components/GuessNumber.vue').default);
Vue.component('test-test', require('./components/TestComponent.vue').default);
Vue.component('news-index', require('./components/NewsIndexComponent.vue').default);
Vue.component('news-create', require('./components/NewsCreateComponent.vue').default);
Vue.component('news-edit', require('./components/NewsEditComponent.vue').default);


const app = new Vue({
    el: '#app',
});
