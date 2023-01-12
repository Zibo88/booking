import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/HomePage.vue'
import BlogPage from './pages/BlogPage.vue'

const router = new VueRouter({
    mode:'history',
    routes: [
        {
            path:'/',
            name: 'home',
            component: HomePage
        },
        {
            path:'/blog',
            name: 'blog',
            component: BlogPage
        },
    ]
})

export default router;