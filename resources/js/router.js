import { createRouter, createWebHistory } from "vue-router";
import Home from "./components/Home/Home.vue";
import Layout from "./components/Layout.vue";

const router = createRouter({
    history: createWebHistory(),
    routes:[
        { path: "", name: "Home", component: Home }
    ]
    });

export default router;