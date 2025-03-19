import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';
import HomePage from '@/views/HomePage.vue'
import OrderNowPage from '@/views/OrderNowPage.vue';
import AddtoBag from '@/views/AddtoBag.vue';
import LoyaltyPoints from '@/views/LoyaltyPoints.vue'


const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'Home',
    component: HomePage
  },
  {
    path: '/orders',
    name: 'Orders',
    component: OrderNowPage
  },
  {
    path: '/addtobag',
    name: 'AddToBag',
    component: AddtoBag
  },
  {
    path: '/loyaltypoints',
    name: 'LoyaltyPoints',
    component: LoyaltyPoints
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router
