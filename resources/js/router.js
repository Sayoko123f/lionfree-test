import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import example from './components/ExampleComponent.vue';
import index from './components/IndexJumbotronComponent.vue';
import newsIndex from './components/NewsIndexComponent.vue';
import newsShow from './components/NewsShowComponent.vue';

const routes = [
    { path: '/', component: index, name: 'index', },
    { path: '/news', component: newsIndex, name: 'newsIndex'},
    { path: '/news/:id', component: newsShow, name: 'newsShow', },
    // { path: '/news', redirect: '/admin', meta: { auth: true } },
    // { path: '/home', redirect: '/admin', meta: { auth: true } },
]

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: routes
});

export default router;