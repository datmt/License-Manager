import Vue from 'vue'
import router from './router'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import './index.css'
import Element from 'element-ui'
import 'element-theme-chalk';
import App from './App'
Vue.use(Vuex)
Vue.use(VueRouter)
Vue.use(Element)

new Vue({
  el: '#app',
  // store,
  router,
  render: h => h(App)
})