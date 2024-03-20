import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js';
import Navbar from "./components/Navbar/Navbar.vue";
import "../css/app.css";

const app = createApp({
    components: {
        Navbar,
    },
});

app.mount('#app');
