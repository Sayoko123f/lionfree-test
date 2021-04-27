# 網站期中_110612304
### 使用 PHP Laravel, Vue.js, Bootstarp.
### 作業原始碼 [Github](https://github.com/Sayoko123f/lionfree-test)
******
#### 功能
> **前端**
- Vue.js 前端路由
- Bootstarp RWD
- Photowipe 點擊圖片放大

> **後端**
- 會員登入
- 發表公告 CRUD(新增、修改、編輯、刪除)，支援 Markdown 語法
******
#### 一些技術細節
webpack 前端資源打包\
壓縮 CSS 和 Javascript 到一個檔案內減少載入時間
```js
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
```
v-router 不需刷新頁面，動態載入頁面(類似 Gmail)
```js
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import index from './components/IndexJumbotronComponent.vue';
import newsIndex from './components/NewsIndexComponent.vue';
import newsShow from './components/NewsShowComponent.vue';
import gallery from './components/PswpGalleryComponent.vue';
const routes = [
    { path: '/', component: index, name: 'index', },
    { path: '/news', component: newsIndex, name: 'newsIndex'},
    { path: '/news/:id', component: newsShow, name: 'newsShow', },
    { path: '/gallery', component: gallery, name: 'gallery', },
]
const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: routes
});
export default router;
```
資料 CRUD 使用 [RESTful API](https://medium.com/itsems-frontend/api-%E6%98%AF%E4%BB%80%E9%BA%BC-restful-api-%E5%8F%88%E6%98%AF%E4%BB%80%E9%BA%BC-a001a85ab638) 風格
```php
Route::get('/', [NewsController::class, 'index'])->name('admin.index');
Route::get('/show/{id}', [NewsController::class, 'show'])->name('admin.news.show');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
Route::post('news', [NewsController::class, 'store'])->name('news.store');
Route::put('news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
```
用 blade 樣板寫 html, \@include, @yield 功能\
拆分成組件增加可維護性
```php
<body>
    <div id="app">
        @include('nav')
        @include('header')
        @yield('body')
    </div>
    @yield('script')
</body>
```
phpunit 單元測試\
測試發表公告功能
```
   PASS  Tests\Unit\ExampleTest
  ✓ basic test

   PASS  Tests\Unit\NewsTest
  ✓ index
  ✓ store fail
  ✓ login
  ✓ store
  ✓ destory
  ✓ show
  ✓ update

   PASS  Tests\Feature\ExampleTest
  ✓ basic test

  Tests:  9 passed
  Time:   2.23s
```
