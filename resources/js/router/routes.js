
// Load routes dynamically.
const requireContext = require.context('../modules/', true, /.*routes\.js$/)

let routes = []
requireContext.keys()
  .map(file =>
    [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
  )
  .reduce((modules, [name, route]) => {
    routes = routes.concat(route.default)
  }, {})

routes.push({ path: '*', component: () => import('../shared/pages/404.vue').then(m => m.default || m) })

export default routes