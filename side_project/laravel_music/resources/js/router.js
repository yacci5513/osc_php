import { createWebHistory, createRouter } from 'vue-router';
import VibeComponent from '../components/VibeComponent.vue'
import MusixMatchComponent from '../components/MusixMatchComponent.vue'

const routes = [
    {
        path: "/",
        redirect: '/Vibe',
    },
	{
        path: "/Vibe",
        component: VibeComponent,
    },
    {
        path: "/MusixMatch",
        component: MusixMatchComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
