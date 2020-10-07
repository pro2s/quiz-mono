<template>
  <form action="#" @submit.prevent="submit">
    <div>
      <label for="email">Email address</label>
      <input type="text" name="email" id="email" v-model="form.email">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="text" name="password" id="password" v-model="form.password">
    </div>
    <div>
      <button type="submit">
        Sign in
      </button>
    </div>
  </form>
</template>

<script>
  export default {
    name: 'SignIn',
    inject: ['auth'],
    data () {
      return {
        form: {
          email: '',
          password: '',
        }
      }
    },
    methods: {
      async submit () {
        await this.auth.signIn(this.form)

        this.$router.push('/')
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
form div {
  margin: 1em 0 0;
}

label {
  margin-right: 1em;
}
</style>

