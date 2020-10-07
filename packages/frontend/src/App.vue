<template>
  <Nav/>
  <router-view></router-view>
</template>

<script>
import { createStore } from './store/auth'
import Nav from './components/Nav'
import i18n from './lang'

const auth = createStore();
auth.udpateUser();

export default {
  name: 'App',
  components: {
    Nav
  },
  provide: {
    'auth': auth,
    '__': i18n
  },
}
</script>
