//import Home from './components/Home.vue';
//import Example from './components/Example.vue';
import LoginComponent from "../components/LoginComponent";
import DashboardComponent from "../components/DashboardComponent";

export const routes = [
    { path: '/admin/login', component: LoginComponent, name: 'login' },
    { path: '/admin/dashboard', component: DashboardComponent, name: 'dashboard' }
];