require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue').default;

import fullCalendar from 'vue-fullcalendar'

Vue.component('full-calendar', fullCalendar)

Vue.component('calendar-component', require('./components/CalendarComponent.vue').default);

const app = new Vue({
    el: '#app',
});
