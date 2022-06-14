
 require('./bootstrap');

//  window.Vue = require('vue').default;

 import Vue from 'vue'

 import router from './admin/router'

 import {store} from './common/store/store'

 import filter from './common/filter'

 import Notifications from 'vue-notification'

 import Swal from 'sweetalert2'

import toastr from 'toastr'

 import CKEditor from '@ckeditor/ckeditor5-vue2'
import ElementUI from 'element-ui'
import ViewUI from 'view-design'
import Vuesax from 'vuesax'
import 'boxicons'
import 'boxicons/css/boxicons.min.css'

import 'element-ui/lib/theme-chalk/index.css'
import 'vuesax/dist/vuesax.css'
import 'view-design/dist/styles/iview.css'

Vue.use( CKEditor )
Vue.use(ViewUI)
Vue.use(ElementUI)
Vue.use(Vuesax)
Vue.use(Notifications)
 
 Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default)

 Vue.use(Notifications)

 window.Swal = Swal
 window.toastr = toastr

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  window.Toast = Toast

 router.beforeEach((to, from, next)=>{
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!localStorage.getItem('token')) {
            next({
                name: 'AdminLogin'
            })
        } else {
            next()
        }
    }else if(to.matched.some(record => record.meta.requiresVisitor)){
        if (localStorage.getItem('token')) {
            next({
                name: 'AdminDashboard'
            })
        } else {
            next()
        }
    }else{
        next()
    }
})
 
 const app = new Vue({
     el: '#admin',
     router,
     store,
 });
 