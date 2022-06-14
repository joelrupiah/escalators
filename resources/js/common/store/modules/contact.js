import Axios from "axios"
import Api from '../../../apis/admin/Api'

export const contact = {
    namespaced: true,
    state: {
        contacts: [],
    },
    getters: {
        contactList(state){
            return state.contacts
        },
        contactListAll(state){
            return state.contacts
        }
    },
    actions: {
        getAllContact(context){
            Axios.get('/api/all-contacts')
                .then(res => {
                    context.commit('contactListAll', res.data.contacts)
                })
        },
        // activeContacts(context){
        //     Api().get('/admin/active-contacts')
        //         .then(res=>{
        //             context.commit('contactList', res.data.contacts)
        //         })
        // },
        contactList(context){
            Api().get('/admin/contact')
                .then(res=>{
                    context.commit('contactList', res.data.contacts)
                })
        },
        deleteContact(context, payload){
            Api().delete(`/admin/contact/${payload}`)
                .then(res=>{
                    context.commit('contactList')
                })
        },
        // getAllContact(context){
        //     Api().get('/admin/all-contact')
        //         .then(res=>{
        //             context.commit('contactList', res.data.contacts)
        //         })
        // },

    },
    mutations: {
        contactList(state, payload){
            return state.contacts = payload
        },
        contactListAll(state, payload){
            return state.contacts = payload
        }
    }
}
