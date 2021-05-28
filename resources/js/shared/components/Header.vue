<template>
  <div class='topbar-wrapper'>
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark px-2 py-1'>
      <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav'>
          <li v-for="service in services" :key="service.name" class="nav-item">
            <router-link :to="{ name: service.route }" class='nav-link d-flex flex-column align-items-center justify-content-center'>
              <fa size='lg' :icon="service.icon"/> {{ service.name }}
            </router-link>
          </li>
        </ul>                
      </div>
    </nav>
  </div>    
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  computed: mapGetters({
    user: 'auth/user'
  }),

  data: () => ({
    services: [
      {
        name: 'Dashboard',
        route: 'dashboard',
        icon: 'home'
      },
      {
        name: 'Tasks',
        route: 'task.list',
        icon: 'tasks'
      },
      {
        name: 'W/O',
        route: 'dashboard',
        icon: 'cubes'
      },
      {
        name: 'Appointment',
        route: 'dashboard',
        icon: 'home'
      },
      {
        name: 'Calendar',
        route: 'dashboard',
        icon: ['far', 'calendar-alt']
      },
      {
        name: 'Contacts',
        route: 'dashboard',
        icon: 'users'
      },
      {
        name: 'Reports',
        route: 'dashboard',
        icon: ['far', 'chart-bar']
      },
      {
        name: 'Accounting',
        route: 'dashboard',
        icon: 'university'
      },
      {
        name: 'Messages',
        route: 'dashboard',
        icon: ['far', 'bell']
      },
      {
        name: 'Chat',
        route: 'dashboard',
        icon: ['far', 'comments']
      },
      {
        name: 'Call center',
        route: 'dashboard',
        icon: 'phone-alt'
      },
      {
        name: 'Boardcast',
        route: 'dashboard',
        icon: 'star'
      },
      {
        name: 'Support',
        route: 'dashboard',
        icon: ['far', 'compass']
      },
      {
        name: 'Settings',
        route: 'dashboard',
        icon: 'cog'
      }
    ]
  })
}
</script>