require('./bootstrap');
import Vue from 'vue';
import router from './router.js';
import my from './myfunc';
import * as PhotoSwipe from 'photoswipe';
import * as PhotoSwipeUI_Default from 'photoswipe/dist/photoswipe-ui-default';
import 'photoswipe/dist/photoswipe.css';
import 'photoswipe/dist/default-skin/default-skin.css';
import mavonEditor from 'mavon-editor';
import 'mavon-editor/dist/css/index.css';
import marked from 'marked';
import 'github-markdown-css';
window.marked = marked;
window.PhotoSwipe = PhotoSwipe;
window.PhotoSwipeUI_Default = PhotoSwipeUI_Default;
window.Vue = require('vue');
Vue.use(mavonEditor);
window.my = my;


/** For admin */
Vue.component('news-create', require('./components/NewsCreateComponent.vue').default);
Vue.component('news-edit', require('./components/NewsEditComponent.vue').default);
/** end */

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('news-index', require('./components/NewsIndexComponent.vue').default);
// Vue.component('index-bg', require('./components/IndexJumbotronComponent.vue').default);



const app = new Vue({
    el: '#app',
    router: router,
});
