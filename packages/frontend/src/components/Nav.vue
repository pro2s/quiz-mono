<template>
  <ul>
    <li><router-link to="/">Go Home</router-link></li>
    <li><router-link to="/signin">Go to Sign In</router-link></li>
    <li>{{ auth.state.authenticated ? "Yes" : "No" }} <a href @click.prevent="logout">Logout</a></li>
  </ul>
</template>

<script>
export default {
  name: 'Nav',
  inject: ['auth'],
  methods: {
    logout () {
      this.auth.logout()

      this.$router.push('/')
    }
  }
}
</script>