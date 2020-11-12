import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    route: [
        {
            path: '/',
            name: 'Home',
            component: require('./views/Home.vue')
        },
        {
            path: '/product',
            name: 'Product',
            component: require('./views/Product.vue')
        },
        {
            path: ':slug',
            name: 'Post',
            component: require('./views/Post.vue'),
            props: true
        },
        {
            path: '*',
            component: require('./views/404')
        },
    ],
    mode: 'history' 
});
