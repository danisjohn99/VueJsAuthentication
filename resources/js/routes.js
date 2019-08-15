



import Home from './components/pages/Home.vue';
import Register from './components/pages/Register.vue';
import Login from './components/pages/Login.vue';

export default [

	        {
			      path: '/',
			      component: Home,
			      name: 'home'
	        },

	        {
			      path: '/register',
			      component: Register,
			      name: 'register'
	        },

	        {
			      path: '/login',
			      component: Login,
			      name: 'login'
	        },
];