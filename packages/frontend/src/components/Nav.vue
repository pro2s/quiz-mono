<template>
  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="#">Home</a></li>
        </ul>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav" v-if="!auth.state.authenticated">
          <li><router-link to="/signin">Sign In</router-link></li>
        </ul>
        <ul class="uk-navbar-nav" v-if="auth.state.authenticated">
            <li>
                <a href="#">{{ __('Profile') }}</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Achives</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href @click.prevent="logout">Logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Nav',
  inject: ['auth', '__'],
  methods: {
    logout () {
      this.auth.logout()

      this.$router.push('/')
    }
  }
}
</script>