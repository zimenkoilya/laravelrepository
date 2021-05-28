<template>
  <div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" :style="`background-image: url('${publicUrl}img/bg.jpg');`">
    <div class="ui-bg-overlay bg-dark opacity-25"></div>

    <div class="authentication-inner py-5">

      <b-card no-body>
        <div class="p-4 px-sm-5 pt-sm-5">
          <!-- Logo -->
          <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
            <div class="ui-w-60">
              <div class="w-100 position-relative" style="padding-bottom: 54%">
                <svg class="w-100 h-100 position-absolute" viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path class="fill-primary" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
              </div>
            </div>
          </div>
          <!-- / Logo -->

          <h5 class="text-center text-muted font-weight-normal mb-4">Create an Account</h5>

          <!-- Form -->
          <template v-if="mustVerifyEmail">
            <div class="alert alert-success" role="alert">
              {{ $t('verify_email_address') }}
            </div>
          </template>
          <template v-else>
            <form @submit.prevent="register" @keydown="form.onKeydown($event)">
              <b-form-group label="Your name">
                <b-input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" type="text" name="name"/>
                <has-error :form="form" field="name" />
              </b-form-group>
              <b-form-group label="Your email">
                <b-input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" type="email" name="email"/>
                <has-error :form="form" field="email" />
              </b-form-group>
              <b-form-group label="Password">
                <b-input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" type="password" name="password"/>
                <has-error :form="form" field="password" />
              </b-form-group>
              <v-button :loading="form.busy" class="btn-block mt-4">Sign Up</v-button>
              <div class="text-light small mt-4">
                By clicking "Sign Up", you agree to our
                <a href="javascript:void(0)">terms of service and privacy policy</a>.
                We’ll occasionally send you account related emails.
              </div>
            </form>
            <!-- / Form -->
          </template>
        </div>
        <b-card-footer v-if="!mustVerifyEmail" class="py-3 px-4 px-sm-5">
          <div class="text-center text-muted">
            Already have an account? 
            <router-link to="login">
              Sign In
            </router-link>
          </div>
        </b-card-footer>
      </b-card>

    </div>
  </div>
</template>

<!-- Page -->
<style src="@/vendor/pages/authentication.scss" lang="scss"></style>

<script>
import Form from 'vform'
import Cookies from 'js-cookie'
import LoginWithGithub from '~/shared/components/LoginWithGithub'

export default {
  components: {
    LoginWithGithub
  },

  middleware: 'guest',

  metaInfo () {
    return { title: this.$t('register') }
  },

  layout: 'LayoutBlank',

  data: () => ({
    form: new Form({
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    }),
    mustVerifyEmail: false
  }),

  methods: {
    async register () {
      // Register the user.
      this.form.password_confirmation = this.form.password;
      const { data } = await this.form.post('/api/register')

      // Must verify email first.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Update the user.
        await this.$store.dispatch('auth/updateUser', data)

        // Redirect home.
        this.redirect()
      }
    },

    redirect () {
      const intendedUrl = Cookies.get('intended_url')

      if (intendedUrl) {
        Cookies.remove('intended_url')
        this.$router.push({ path: intendedUrl })
      } else {
        this.$router.push({ name: 'dashboard' })
      }
    }
  }
}
</script>
