export default [
    {
        path: '/',
        component: require('./pages/Dashboard').default,
    },
    {
        path: '/users',
        component: require('./pages/Users').default,
    },
];