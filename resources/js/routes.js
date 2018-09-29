import VueRouter from 'vue-router';


let routes = [
    {path: '/', component: require('./views/Home')},
    {path: '/member', component: require('./views/module/member/index')},
    {path: '/member/:id/show', component: require('./views/module/member/action/show')},
    {path: '/member/:id/edit', component: require('./views/module/member/action/edit')},
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active', // router-link-active change to is-active class when navigation
});