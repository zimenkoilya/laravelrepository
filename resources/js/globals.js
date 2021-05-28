import layoutHelpers from './layouts/helpers.js'
import themeSettings from './vendor/theme-settings/theme-settings.js'

export default function () {
  return {
    // Public url
    publicUrl: process.env.BASE_URL,

    // Layout helpers
    layoutHelpers,

    // Theme settings
    themeSettings,

    // Check for RTL layout
    get isRtlMode () {
      return document.documentElement.getAttribute('dir') === 'rtl' ||
             document.body.getAttribute('dir') === 'rtl'
    },

    // Check if IE
    get isIEMode () {
      return typeof document.documentMode === 'number'
    },

    // Check if IE10
    get isIE10Mode () {
      return this.isIEMode && document.documentMode === 10
    },

    // Layout navbar color
    get layoutNavbarBg () {
      return this.themeSettings.getOption('navbarBg') || 'navbar-theme'
    },

    // Layout sidenav color
    get layoutSidenavBg () {
      return this.themeSettings.getOption('sidenavBg') || 'sidenav-theme'
    },

    // Layout footer color
    get layoutFooterBg () {
      return this.themeSettings.getOption('footerBg') || 'footer-theme'
    },

    formatSize(size) {
      if (size > 1024 * 1024 * 1024 * 1024) {
        return (size / 1024 / 1024 / 1024 / 1024).toFixed(2) + ' TB'
      } else if (size > 1024 * 1024 * 1024) {
        return (size / 1024 / 1024 / 1024).toFixed(2) + ' GB'
      } else if (size > 1024 * 1024) {
        return (size / 1024 / 1024).toFixed(2) + ' MB'
      } else if (size > 1024) {
        return (size / 1024).toFixed(2) + ' KB'
      }
      return size.toString() + ' B'
    },

    // Animate scrollTop
    scrollTop (to, duration, element = document.scrollingElement || document.documentElement) {
      if (element.scrollTop === to) return
      const start = element.scrollTop
      const change = to - start
      const startDate = +new Date()

      // t = current time; b = start value; c = change in value; d = duration
      const easeInOutQuad = (t, b, c, d) => {
        t /= d / 2
        if (t < 1) return c / 2 * t * t + b
        t--
        return -c / 2 * (t * (t - 2) - 1) + b
      }

      const animateScroll = () => {
        const currentDate = +new Date()
        const currentTime = currentDate - startDate
        element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration))
        if (currentTime < duration) {
          requestAnimationFrame(animateScroll)
        } else {
          element.scrollTop = to
        }
      }

      animateScroll()
    }
  }
}
