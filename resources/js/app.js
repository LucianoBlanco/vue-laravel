require('./bootstrap');
window.Vue = require('vue');

//enrutamiento con vue-router
 Vue.component('post-component', require('./components/PostComponent.vue').default);

//componentes
Vue.component('welcome-component', require('./components/WelcomeComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);
Vue.component('provider-component', require('./components/ProviderComponent.vue').default);
Vue.component('client-component', require('./components/ClientComponent.vue').default);
Vue.component('sale-component', require('./components/SaleComponent.vue').default);

import router from './routes'

const app = new Vue({
    el: '#app',
    router
});
