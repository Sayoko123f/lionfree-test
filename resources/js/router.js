import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import example from './components/ExampleComponent.vue';

const routes = [
    // { path: '/home', redirect: '/admin', meta: { auth: true } },
    // { path: '/admin', component: newsIndex, name: 'admin', meta: { auth: true } },
    // { path: '/admin/news/show/:id', component: newsShow, name: 'newsShow', meta: { auth: true } },
    // { path: '/admin/news/create', component: newsCreate, name: 'newsCreate', meta: { auth: true } },
    // { path: '/admin/news/edit/:id', component: newsEdit, name: 'newsEdit', meta: { auth: true } }
]

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

export default router;