import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)


const routes = [
    //Admin
    {
        path: '/Article',
        name: 'Article',
        component: () =>
            import ("./components/AdminComponents/Article")
    },
    {
        path: '/Event',
        name: 'Event',
        component: () =>
            import ("./components/AdminComponents/Event")
    },

    //projects routes....

]


export default new Router({
    mode: 'history',
    routes
})

new Vue(
    Vue.util.extend({ routes })
)