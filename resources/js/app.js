import './bootstrap';
import Vue from 'vue/dist/vue';

Vue.component('app', require('./components/App.vue').default)

const app = new Vue({
    el: '#app'
})
