// require('./bootstrap');
//
// window.Vue = require('vue').default;
// import Form from './Form'
// import VueRouter from 'vue-router'
// import App from './components/crud/AppComponent';
// import Crud from './components/crud/CrudComponent';
// import Edit from './components/crud/EditComponent';
//
// window.Form = Form;
// Vue.use(VueRouter);
//
// // Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// // Vue.component('crud-component', require('./components/CrudComponent.vue').default);
// Vue.component('app-component', require('./components/crud/AppComponent.vue').default);
//
//
// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path: '/add',
//             name: 'add',
//             component: Crud
//         },
//         {
//             path: '/change/:id',
//             name: 'change',
//             component: Edit
//         },
//     ],
// });
//
// const app = new Vue({
//     el: '#app',
//     components: { App, Crud, Edit },
//     router,
// });


//---------------------------------------------------------------------------------------------------

import Vue from 'vue';
import routes from './components/router/index';
import { HasError, AlertError } from 'vform';

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

require('./bootstrap');

Vue.component('navbar-component', require('./components/crud2/NavbarComponent.vue').default);

const app = new Vue({
    el: '#app',
    router: routes,
});
