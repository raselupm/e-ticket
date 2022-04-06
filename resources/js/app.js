import Vue from 'vue';
import vSelect from 'vue-select'
import DatePicker from 'vue2-datepicker'



import 'vue-select/dist/vue-select.css';
import 'vue2-datepicker/index.css';

require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Vue.component('add-train', require('./components/AddTrain').default);
Vue.component('home', require('./components/Home').default);



Vue.component('v-select', vSelect)
Vue.component('v-date-picker', DatePicker)

const app = new Vue({
    el: '#app'
})
