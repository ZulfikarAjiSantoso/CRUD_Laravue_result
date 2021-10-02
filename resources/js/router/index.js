
window.Vue = require('vue').default;

import Vue from 'vue';

import VueRouter from 'vue-router'
Vue.use(VueRouter)

const Home = require('../pages/Home.vue').default;
const About = require('../pages/About.vue').default;
// const NotFound = require('./pages/NotFound.vue').default;
import NotFound from '../pages/NotFound.vue'
import User from '../pages/User.vue'
import Profile from '../pages/Profile.vue'
import Register from '../pages/Register.vue'
import Edit from '../pages/Edit1.vue'
import Gambar from '../pages/Gambar.vue'
import Create from '../pages/Create1.vue'


const routes = [
    {
        name: 'Home',
        path: '/home',
        component: Home
    },
    
    {
        name: 'create',
        path: '/home/create',
        component: Create
    },
    {
        name: 'edit',
        path: '/home/edit/:id',
        component: Edit
    },
    




    // {   
    //     name: 'About',
    //     path: '/about',
    //     component: About
    // },
    // {
    //     name:'User',
    //     path: '/user',
    //     component: User,
        
    // },
    
    // {
    //     name:'Profile',
    //     path: '/user/:id',
    //     component: Profile,
    //     props: true
    // },
    // {
    //     name: 'Register',
    //     path: '/user/create',
    //     component: Register
    // },
    // {
    //     name:'Gambar',
    //     path: '/user/:id/photo',
    //     component: Gambar,
    //     props: true
    // },
    // {
    //     name:'Edit',
    //     path: '/user/:id/edit',
    //     component: Edit,
    //     props: true

    // },
    // {
    //     name:'Home',
    //     path: '/',
    //     component: Home,
    //     props: true

    // },
    {
        path: '*',
        component: NotFound
    }

]

const router = new VueRouter ({
    linkActiveClass: 'active',
    mode:'history',
    routes
})

export default router
