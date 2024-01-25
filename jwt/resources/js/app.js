require('./bootstrap');

import { createApp } from 'vue';
import router from '../js/router.js';
import AppComponent from '../components/AppComponent.vue';

createApp({
    components: {
        AppComponent,
    }
})
	.use(router)
	.mount('#app');