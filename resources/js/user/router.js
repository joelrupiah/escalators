import { Alert } from 'bootstrap'
import { toPairs } from 'lodash'
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../components/user/Home'
import Contact from '../components/user/pages/Contact'
import About from '../components/user/pages/About'

import Services from '../components/user/pages/Services'
import ServiceDetail from '../components/user/pages/services/ServiceDetail'

import Faqs from '../components/user/pages/Faqs'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        { path: '/api', component: Home, name: 'Home' },
        { path: '/api/contact', component: Contact, name: 'Contact' },
        { path: '/api/about', component: About, name: 'About' },

        { path: '/api/services', component: Services, name: 'Services' },
        { path: '/api/services/:serviceSlug', component: ServiceDetail, name: 'ServiceDetail' },

        { path: '/api/faqs', component: Faqs, name: 'Faqs' },
    ]
})

export default router;
