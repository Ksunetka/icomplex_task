require('./bootstrap');

import {createApp} from 'vue';
import VueAxios from "vue-axios";
import axios from "axios";
import Toaster from "@meforma/vue-toaster";
import Header from './components/Header';
import router from "./router";
// import Pagination from 'laravel-vue-pagination';

const app = createApp({});

app.component('v-header', Header);

// app.component('pagination', Pagination);

app.use(VueAxios, axios);

app.use(router);

app.mount('#app');

app.use(Toaster, {position: "top-right"});
