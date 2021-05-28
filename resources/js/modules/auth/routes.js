function page (path) {
  return () => import(/* webpackChunkName: '' */ `./pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/login', name: 'login', component: page('login.vue') },
  { path: '/register', name: 'register', component: page('register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('verification/resend.vue') },
]
  