require('./bootstrap');
window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);
Vue.component('provider-component', require('./components/ProviderComponent.vue').default);
Vue.component('client-component', require('./components/ClientComponent.vue').default);
Vue.component('sale-component', require('./components/SaleComponent.vue').default);
const app = new Vue({
    el: '#app',
});
