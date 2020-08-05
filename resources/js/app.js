/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
import BootstrapVue, {BootstrapVueIcons} from "bootstrap-vue";
import Vue from "vue";
window.Vue = Vue;
import Snotify, { SnotifyPosition } from 'vue-snotify'
import VeeValidate from "vee-validate";

const options = {
    toast: {
        position: SnotifyPosition.rightTop,
        showProgressBar: false
    }
}

Vue.use(Snotify, options)
Vue.use(VeeValidate,{
    inject: true
})
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
// Vue.component('dt-component', DtComponent)
Vue.component('dt-component', () => import(/*webpackChunkName: 'js/dt-component'*/'./components/DtComponent'))
Vue.component('datePicker', () => import(/*webpackChunkName: 'js/date-picker'*/'vue-bootstrap-datetimepicker'))
import "./backend"
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    mounted() {
        console.log('App mounted');
        /*this.$root.$on("edit-user", function(e) {
            console.log("an edit user event was triggeredd");
            console.log(e);
        })*/
    }
});
