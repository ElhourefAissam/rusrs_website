import Router from 'vue-router'
import Vue from 'vue'
Vue.use(Router)


const routes = [
    //Admin
    {
        path: 'http://rusrs-website.test/Article',
        name: 'Article',
        component: () =>
            import ("./components/AdminComponents/Article")
    },
    {
        path: 'http://rusrs-website.test/Event',
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