import { Alert } from 'bootstrap'
import { toPairs } from 'lodash'
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AdminDashboard from '../components/admin/AdminDashboard'
import AdminProfile from '../components/admin/pages/AdminProfile'
import AdminAbout from '../components/admin/pages/system/AdminAbout'
import AdminContact from '../components/admin/pages/system/AdminContact'

import AdminServices from '../components/admin/pages/system/service/AdminServices'
import CreateService from '../components/admin/pages/system/service/CreateService'
import EditService from '../components/admin/pages/system/service/EditService'

import AdminServiceDescription from '../components/admin/pages/system/service/AdminServiceDescriptions'
import CreateServiceDescription from '../components/admin/pages/system/service/CreateServiceDescription'
import EditServiceDescription from '../components/admin/pages/system/service/EditServiceDescription'

import AdminFaqs from '../components/admin/pages/system/AdminFaqs'
import AdminCarousel from '../components/admin/pages/carousel/AdminCarousel'
import CreateCarousel from '../components/admin/pages/carousel/CreateCarousel'
import EditCarousel from '../components/admin/pages/carousel/EditCarousel'

import SendEmail from '../components/admin/pages/email/SendEmail'
import InboxEmail from '../components/admin/pages/email/InboxEmail'

import AdminLogin from '../components/admin/pages/auth/AdminLogin'
import AdminReset from '../components/admin/pages/auth/AdminReset'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        { path: '/api/admin', component: AdminDashboard, name: 'AdminDashboard', meta: { requiresAuth: true } },
        { path: '/api/admin/admin-profile', component: AdminProfile, name: 'AdminProfile', meta: { requiresAuth: true } },
        { path: '/api/admin/admin-about', component: AdminAbout, name: 'AdminAbout', meta: { requiresAuth: true } },
        { path: '/api/admin/admin-contact', component: AdminContact, name: 'AdminContact', meta: { requiresAuth: true } },
        
        { path: '/api/admin/admin-services', component: AdminServices, name: 'AdminServices', meta: { requiresAuth: true } },
        { path: '/api/admin/create-service', component: CreateService, name: 'CreateService', meta: { requiresAuth: true } },
        { path: '/api/admin/edit-service/:slug', component: EditService, name: 'EditService', meta: { requiresAuth: true } },
        
        { path: '/api/admin/admin-services-descriptions', component: AdminServiceDescription, name: 'AdminServiceDescription', meta: { requiresAuth: true } },
        { path: '/api/admin/create-service-description', component: CreateServiceDescription, name: 'CreateServiceDescription', meta: { requiresAuth: true } },
        { path: '/api/admin/edit-service-description/:id', component: EditServiceDescription, name: 'EditServiceDescription', meta: { requiresAuth: true } },
        
        { path: '/api/admin/admin-faqs', component: AdminFaqs, name: 'AdminFaqs', meta: { requiresAuth: true } },
        { path: '/api/admin/admin-carousel', component: AdminCarousel, name: 'AdminCarousel', meta: { requiresAuth: true } },
        { path: '/api/admin/create-carousel', component: CreateCarousel, name: 'CreateCarousel', meta: { requiresAuth: true } },
        { path: '/api/admin/edit-carousel/:slug', component: EditCarousel, name: 'EditCarousel', meta: { requiresAuth: true } },
        
        { path: '/api/admin/send-email', component: SendEmail, name: 'SendEmail', meta: { requiresAuth: true } },
        { path: '/api/admin/email/inbox', component: InboxEmail, name: 'InboxEmail', meta: { requiresAuth: true } },

        { path: '/api/admin/admin-login', component: AdminLogin, name: 'AdminLogin', meta: { requiresVisitor: true } },
        { path: '/api/admin/admin-reset', component: AdminReset, name: 'AdminReset', meta: { requiresVisitor: true } },
    ]
})

export default router;
