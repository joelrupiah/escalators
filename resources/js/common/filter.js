import moment from "moment";
import Vue from "vue";

Vue.filter('time', (a) => {
    return moment(a).format('MMM Do YYYY')
})

Vue.filter('subString', (content, length) => {
    return content.substring(0, length)
})

Vue.filter('capitalize', (value) => {
    if(!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1) 
})