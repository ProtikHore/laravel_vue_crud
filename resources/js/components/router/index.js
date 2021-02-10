import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from "../../components/crud2/HomeComponent";
import Crud from "../../components/crud2/CrudComponent";

Vue.use(VueRouter);

const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home,
        },
        {
            path: '/crud',
            name: 'crud',
            component: Crud,
        },
    ],
});

export default routes;
