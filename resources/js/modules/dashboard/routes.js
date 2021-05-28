function page (path) {
    return () => import(/* webpackChunkName: '' */ `./pages/${path}`).then(m => m.default || m)
  }
  
  export default [
    { path: '/', name: 'dashboard', component: page('index.vue') },
  ]
    