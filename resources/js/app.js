require('./bootstrap');

window.Vue = require('vue');

Vue.component('homepage-component', require('./components/client/HomepageComponent.vue').default);
Vue.component('catalogue-component', require('./components/client/CatalogueComponent.vue').default);

const app = new Vue({
    el: '#app',
});
