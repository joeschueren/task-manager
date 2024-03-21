import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js';
import router from "./router.js";
import Layout from './components/Layout.vue';
import "../css/app.css";

const app = createApp(Layout);

app.use(router);

app.mount('#app');
