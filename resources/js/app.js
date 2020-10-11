require('./bootstrap');

window.Vue = require('vue');

// -------------------- Client Side ----------------------//
Vue.component('homepage-component', require('./components/client/HomepageComponent.vue').default);
Vue.component('catalogue-component', require('./components/client/CatalogueComponent.vue').default);
Vue.component('product-component', require('./components/client/ProductComponent.vue').default);
// ------------------------------------------------------//

const app = new Vue({
    el: '#app',
});
