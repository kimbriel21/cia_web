
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.EventBus = new Vue();

import VueRouter from 'vue-router';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en';

import swal from 'sweetalert';
import $ from "jquery";
import _ from "lodash"


Vue.use(VueRouter);
Vue.use(ElementUI, {locale});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding views to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./views/Home.vue'));
Vue.component('nav-bar', require('./views/layout/nav-bar.vue'));
Vue.component('side-bar', require('./views/layout/side-bar.vue'));

Vue.component('search-field', require('./views/component/search-field.vue'));
Vue.component('table-paginate', require('./views/component/table-paginate.vue'));
Vue.component('pagination', require('./views/component/pagination.vue'));

Vue.component('add-member-dialog', require('./views/module/member/action/add.vue'));
import router from './routes';

window.router = router;

new Vue({
    el: '#app',
    router,
});
