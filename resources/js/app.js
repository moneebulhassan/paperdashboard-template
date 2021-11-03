/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue').default;
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';


window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// This is the alert function
import Swal from 'sweetalert2';

window.Swal = Swal

window.toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

// This is for the  progress bar function
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '6px'
})


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('icon-component', require('./components/IconComponent.vue').default);
Vue.component('set-component', require('./components/SetComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('users-component', require('./components/UsersComponent.vue').default);
Vue.component('profile-component', require('./components/ProfileComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// this filter is used for making 1st letter of text capital
Vue.filter('uptext', function (text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

// this function previews the created at in different formats
Vue.filter('myDate', function (created){
   return moment(created).format('MMMM Do YYYY');
});

window.Fire = new Vue();

const app = new Vue({
    el: '#app',
});
