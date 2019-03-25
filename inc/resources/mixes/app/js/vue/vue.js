import Buefy from 'buefy';
import VueRouter from 'vue-router';
import router from './router/router';
import App from './elements/App';

window.Vue = require('vue');

Vue.use(Buefy);

Vue.use(VueRouter);
Vue.component('router-link', Vue.options.components.RouterLink);
Vue.component('router-view', Vue.options.components.RouterView);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// create element for vue app
let div = document.createElement('DIV');
document.body.appendChild(div);

const app = new Vue({
    el: div,
    data: {
        loading: 1,
        user: {},
    },
    router,
    render: h => h(App),

    mounted() {
        this.loading--;
    }
});
