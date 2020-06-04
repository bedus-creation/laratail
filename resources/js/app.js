import Vue from 'vue';
window._ = require("lodash");

require('@/utils/flash.js');
Vue.component('FileInput', () => import('@/components/FileInput'));

const app = new Vue({
    el: '#app',
});

