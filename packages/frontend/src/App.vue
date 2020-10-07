<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <router-view></router-view>
  <Nav/>
</template>

<script>
import { createStore } from './store/auth'
import Nav from './components/Nav'

const auth = createStore();
auth.udpateUser();

export default {
  name: 'App',
  components: {
    Nav
  },
  provide: {
    'auth': auth,
  },
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
