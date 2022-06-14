import Axios from "axios"
import Api from '../../../apis/admin/Api'

export const service = {
    namespaced: true,
    state: {
        services: [],
        servicedescription: {},
        service: {}
    },
    getters: {
        serviceList(state){
            return state.services
        },
        serviceListAll(state){
            return state.services
        },
        serviceDescription(state){
            return state.services
        },
        singleServiceDescription(state){
            return state.service
        },
        getallServiceDescriptionDetailList(state){
            return state.servicedescription
        },
        getAllServiceList(state){
            return state.services
        }
    },
    actions: {
        getAllServiceList(context){
            Axios.get('/api/get-all-services')
                .then(response => {
                    context.commit('getAllServiceList', response.data.services)
                })
        },
        getallServiceDescriptionDetail(context, payload){
            Axios.get(`/api/get-service-descriptions/${payload}`)
                .then(response => {
                    // console.log(response.data.servicedescriptionsdetail.title)
                    context.commit('getallServiceDescriptionDetailList', response.data.servicedescriptionsdetail)
                })
        },
        serviceDescriptionFrontServices(context){
            Axios.get('/api/user-front-services')
                .then(response => {
                    context.commit('serviceListAll', response.data.services)
                })
        },
        getServiceDescriptions(context){
            Api().get('/admin/all-service-description')
                .then(res=>{
                    // console.log(res.data.servicedescriptions)
                    context.commit('serviceDescription', res.data.servicedescriptions)
                })
        },
        showServiceDescriptions(context, payload){
            Api().get(`/admin/servicedescription/${payload}`)
                .then(response => {
                    context.commit('singleServiceDescription', response.data.servicedescription)
                })
        },
        deleteServiceDescription(context, payload){
            Api().delete('/admin/servicedescription/'+payload)
                .then(() => {
                    context.commit('serviceList')
                })
                .catch(error => {
                    console.log(error)
                })
        },
        serviceList(context){
            Api().get('/admin/service')
                .then(res=>{
                    context.commit('serviceList', res.data.services)
                })
        },
        deleteService(context, payload){
            Api().delete(`/admin/service/${payload}`)
                .then(res=>{
                    context.commit('serviceList')
                })
        },
        getServices(context){
            Api().get('/admin/all-service')
                .then(res=>{
                    context.commit('serviceList', res.data.services)
                })
        },

    },
    mutations: {
        getAllServiceList(state, payload){
            return state.services = payload
        },
        serviceList(state, payload){
            return state.services = payload
        },
        serviceListAll(state, payload){
            return state.services = payload
        },
        serviceDescription(state, payload){
            return state.services = payload
        },
        singleServiceDescription(state, payload){
            return state.service = payload
        },
        getallServiceDescriptionDetailList(state, payload){
            return state.servicedescription = payload
        }
    }
}
