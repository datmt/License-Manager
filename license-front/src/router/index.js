import Vue from 'vue'
import VueRouter from 'vue-router'
import HomePage from '../components/pages/HomePage'
import Products from '../components/pages/Products'
import LoginPage from "../components/pages/LoginPage";

import { isAuthenticated } from '../common/common'
import EditProduct from "../components/pages/EditProduct";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'HomePage',
    component: HomePage
  },
  {
    path: '/products',
    name: 'Products',
    component: Products
  },
  {
    path: '/products/:id',
    name: 'EditProduct',
    component: EditProduct
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginPage
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

console.log("authenticate: ", isAuthenticated);

router.beforeEach((to, from, next) => {
  if (to.name !== 'Login' && !isAuthenticated) next({ name: 'Login' })
  else next()
})

export default router
