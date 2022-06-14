import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import { admin } from './modules/admin'
import { contact } from './modules/contact'
import { service } from './modules/service'

export const store = new Vuex.Store({
    modules: {
        admin : admin,
        contact : contact,
        service : service,
    }
  })
