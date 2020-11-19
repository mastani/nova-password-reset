Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'nova-password-reset',
      path: '/nova-password-reset',
      component: require('./components/Tool'),
    },
  ])
})
