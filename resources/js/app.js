require('./bootstrap');
window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);
Vue.component('provider-component', require('./components/ProviderComponent.vue').default);
const app = new Vue({
    el: '#app',
});
