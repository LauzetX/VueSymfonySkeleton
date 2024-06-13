import { createRouter, createWebHistory } from "vue-router";
import IndexView from "@/views/IndexView.vue";
import LoginView from "@/views/LoginView.vue";

const routes = [
  {
    name: "index",
    component: IndexView,
    path: "/",
  },
  {
    name: 'login',
    path: '/api/login',
    component: LoginView
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes: routes,
});

export default router;
