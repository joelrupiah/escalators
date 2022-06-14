import Axios from "axios"
import Api from '../../../apis/admin/Api'

export const carousel = {
    namespaced: true,
    state: {
        carousels: [],
        carousel: {}
    },
    getters: {
        carouselItems(state){
            return state.carousels
        }
    },
    actions: {
        getCarouselItems(context){
            Api().get('/admin/carousel-items')
                .then(response => {
                    context.commit('carouselItems', response.data.carousels)
                })
        },
        deleteCarouselItem(context, payload){
            Api().post(`/admin/deleteCarouselItem/${payload}`)
                .then(() => {
                    context.commit('carouselItems')
                })
        }
    },
    mutations: {
        carouselItems(state, payload){
            return state.carousels = payload
        }
    }
}
