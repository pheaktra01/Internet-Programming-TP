import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
    },
    {
      path: "/categories/:categoryId",
      name: "Category",
      component: () => import("../views/CategoryView.vue"),
    },
    {
      path: "/products/:productId",
      name: "Product",
      component: () => import("../views/ProductView.vue"),
    }
  ],
})

export default router
