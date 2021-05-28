import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import http from '~/plugins/http'
import App from './App.vue'

import '~/plugins'
import '~/shared/components'

import ElementUI from 'element-ui'
import BootstrapVue from 'bootstrap-vue'
import VueSocketIO from 'vue-socket.io'
import SocketIO from 'socket.io-client'
import { VueMasonryPlugin } from 'vue-masonry'
import TextareaAutosize from 'vue-textarea-autosize'
import Toasted from 'vue-toasted'

import globals from './globals'

Vue.config.productionTip = false

Vue.use(
  new VueSocketIO({
    debug: true,
    connection: SocketIO(config.wsURL),
    vuex: {
      store,
      actionPrefix: "socket_",
      mutationPrefix: "SOCKET_"
    }
  })
)
Vue.use(ElementUI, { size: 'small' })
Vue.use(BootstrapVue)
Vue.use(VueMasonryPlugin)
Vue.use(TextareaAutosize)
Vue.use(Toasted)

Vue.use(http);

Vue.mixin({
  data: globals
})

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
