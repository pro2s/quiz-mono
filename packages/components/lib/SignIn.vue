<template>
  <div uk-grid class="uk-child-width-expand@s uk-text-center uk-margin">
    <div/>
    <div class="uk-card uk-card-default uk-card-body">
    <form action="#" @submit.prevent="submit">
      <div class="uk-margin">
          <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: user"></span>
              <input class="uk-input" type="text" name="email" id="email" v-model="form.email">
          </div>
      </div>

      <div class="uk-margin">
          <div class="uk-inline">
              <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
              <input class="uk-input" type="password" name="password" id="password" v-model="form.password">
          </div>
      </div>

      <div>
        <button type="submit" class="uk-button uk-button-default">
          Sign in
        </button>
      </div>
    </form>
    </div>
    <div/>
  </div>
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

<style scoped>
form div {
  margin: 1em 0 0;
}

label {
  margin-right: 1em;
}
</style>

