<template>
  <div class="layout-wrapper layout-1 layout-without-sidenav">
    <div class="layout-inner">
      <app-layout-navbar :sidenavToggle="false" />

      <div class="layout-container">
        <div class="layout-content">
          <app-layout-header />
          <div class="router-transitions container-fluid flex-grow-1 container-p-y">
            <router-view />
          </div>
          <app-layout-footer />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from '~/shared/components/Navbar'
import Header from '~/shared/components/Header'
import Footer from '~/shared/components/Footer'

export default {
  name: 'MainLayout',

  components: {
    'app-layout-navbar': Navbar,
    'app-layout-header': Header,
    'app-layout-footer': Footer
  }
}
</script>
