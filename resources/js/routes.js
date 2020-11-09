import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    route: [
        {
            path: '/',
            name: 'home',
            component: require('./views/Home')
        },
        {
            path: '/product',
            name: 'product',
            component: require('./views/Product')
        },
        {
            path: ':slug',
            name: 'post',
            component: require('./views/Post'),
            props: true
        },
        {
            path: '*',
            component: require('./views/404')
        },
    ],
    mode: 'history' 
});
