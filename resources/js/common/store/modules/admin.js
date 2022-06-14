import Axios from 'axios'

export const admin = {
    namespaced: true,
    state: {
        auth: {
            login: false,
            admin: {},
        }
    },
    getters: {
        AUTH_ADMIN(state){
            return state.auth.admin
        }
    },
    actions: {},  
    mutations: {
        LOGIN(state, status){
            state.auth.login = status
            state.auth.admin = {}
        },
        AUTH_ADMIN(state, admin){
            state.auth.admin = admin
        }
    }
}