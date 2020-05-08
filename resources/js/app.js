/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Bus = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('tips', require('./components/Tips.vue').default);
Vue.component('simpletag', require('./components/SimpleTag.vue').default);
Vue.component('propdetails', require('./components/PropDetails.vue').default);
Vue.component('prophead', require('./components/PropHead.vue').default);
Vue.component('chat', () => import('./components/Chat.vue'));
Vue.component('chats', () => import('./components/Chats.vue'));
Vue.component('create-chat', () => import('./components/CreateChat.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
