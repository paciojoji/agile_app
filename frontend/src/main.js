import './assets/css/style.css'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { BootstrapVue, BootstrapVueIcons, BJumbotron, CollapsePlugin } from 'bootstrap-vue'
import { agile_app } from "./plugins/axios"

Vue.use(CollapsePlugin)
Vue.component('b-jumbotron', BJumbotron)
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

import Vue from 'vue'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false


/** 
 * Implementing Alerts and Toasts
 * on VueJS Components Level
 */
import Alerts from './mixins/alerts.js'
Vue.mixin(Alerts);

new Vue({
    router,
    render: h => h(App)
}).$mount('#app')