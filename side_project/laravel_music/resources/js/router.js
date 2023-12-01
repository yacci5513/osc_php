import { createWebHistory, createRouter } from 'vue-router';
import VibeComponent from '../components/VibeComponent.vue'
import MusixMatchComponent from '../components/MusixMatchComponent.vue'
import MelonComponent from '../components/MelonComponent.vue'

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
    {
        path: "/Melon",
        component: MelonComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
