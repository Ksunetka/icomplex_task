import { createRouter, createWebHistory } from 'vue-router'
import Index from './views/Index'
import Book from './views/Book';

export const routes = [
    {
        path: '/',
        name: 'index',
        component: Index
    },
    {
        path: '/book',
        name: 'book',
        component: Book
    },
    {
        path: "/:catchAll(.*)",
        redirect: Index
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router
