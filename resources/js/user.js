 require('./bootstrap');

//  window.Vue = require('vue').default;

 import Vue from 'vue'

 import router from './user/router'

 import {store} from './common/store/store'

 import filter from './common/filter'

 import Notifications from 'vue-notification'

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
 
 Vue.component('user-master', require('./components/user/UserMaster.vue').default);

 Vue.use(Notifications)

 const app = new Vue({
     el: '#user',
     router,
     store,
 });
 