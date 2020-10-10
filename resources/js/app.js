require('./bootstrap');

window.Vue = require('vue');

Vue.component('homepage-component', require('./components/client/HomepageComponent.vue').default);

const app = new Vue({
    el: '#app',
});
