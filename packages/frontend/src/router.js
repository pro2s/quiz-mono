import { createRouter, createWebHashHistory } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import { SignIn } from '@quiz/components'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HelloWorld
  },
  {
    path: '/signin',
    name: 'SignIn',
    component: SignIn
  }
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
  })

export default router