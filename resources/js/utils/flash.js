import Vue from 'vue';
import VueToastify from "vue-toastify";
Vue.use(VueToastify);

window.flash = function () {
    let settingsObject = {
        theme: 'light',
    }
    Vue.$vToastify.setSettings(settingsObject);
    return Vue.$vToastify;
}
