/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vuetify from './plugins/vuetify';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// レイアウト
Vue.component('header-component', require('./components/Organisms/Layouts/Header.vue').default);
Vue.component('footer-component', require('./components/Organisms/Layouts/Footer.vue').default);

// 商品
Vue.component('item-list-component', require('./components/Templates/ItemList.vue').default);
Vue.component('item-detail-component', require('./components/Templates/ItemDetail.vue').default);

// カテゴリー
Vue.component('category-list-component', require('./components/Organisms/CategoryList.vue').default);
Vue.component('category-items-component', require('./components/Templates/CategoryItems.vue').default);
// ショップ
Vue.component('shop-detail-component', require('./components/Templates/ShopDetail.vue').default);
Vue.component('shop-item-list-component', require('./components/Templates/ShopItemList.vue').default);

// Atoms
Vue.component('scroll-top-btn-component', require('./components/Atoms/ScrollTopBtn.vue').default);
Vue.component('wide-carousel-component', require('./components/Atoms/WideCarousel.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
});
