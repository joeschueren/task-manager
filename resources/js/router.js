import { createRouter, createWebHistory } from "vue-router";
import Home from "./components/Home/Home.vue";
import Login from "./components/Login/Login.vue";
import Register from "./components/Register/Register.vue";
import Dashboard from "./components/Dashboard/Dashboard.vue";

const router = createRouter({
    history: createWebHistory(),
    routes:[
        { path: "/app", name: "Home", component: Home },
        { path: "/app/login", name: "Login", component: Login },
        { path: "/app/register", name: "Register", component: Register },
        { path: "/app/dashboard", name: "Dashboard", component: Dashboard },
    ]
});

export default router;