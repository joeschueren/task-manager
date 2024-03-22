import { createRouter, createWebHistory } from "vue-router";
import Home from "./components/Home/Home.vue";
import Login from "./components/Login/Login.vue";
import Register from "./components/Register/Register.vue";

const router = createRouter({
    history: createWebHistory(),
    routes:[
        { path: "/app", name: "Home", component: Home },
        { path: "/app/login", name: "Login", component: Login },
        { path: "/app/register", name: "Register", component: Register },
    ]
});

export default router;