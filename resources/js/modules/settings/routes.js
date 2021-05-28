function page (path) {
  return () => import(/* webpackChunkName: '' */ `./pages/${path}`).then(m => m.default || m)
}

export default [
  {
    path: '/settings',
    component: page('index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('profile.vue') },
      { path: 'password', name: 'settings.password', component: page('password.vue') }
    ]
  },
]
  