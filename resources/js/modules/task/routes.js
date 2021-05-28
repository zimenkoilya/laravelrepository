function page (path) {
  return () => import(/* webpackChunkName: '' */ `./pages/${path}`).then(m => m.default || m)
}

export default [
  {
    path: '/task',
    component: page('index.vue'),
    children: [
      { path: '', redirect: { name: 'task.list' } },
      { path: 'list', name: 'task.list', component: page('list.vue') },
      { path: 'create', name: 'task.create', component: page('create.vue') },
      { path: 'edit/:id', name: 'task.edit', component: page('edit.vue') }
    ]
  },
]
  