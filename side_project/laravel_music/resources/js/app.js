require('./bootstrap');

import { createApp } from 'vue'
import AppComponent from '../components/AppComponent.vue'
import router from './router.js'
import store from './store.js'

createApp({
	components: {
		AppComponent,
	}
})
	.use(router)
    .use(store)
    .mount('#app')
