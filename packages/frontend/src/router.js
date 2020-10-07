import { createRouter, createWebHashHistory } from 'vue-router'
import SignIn from './components//SignIn.vue'
import HelloWorld from './components/HelloWorld.vue'

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