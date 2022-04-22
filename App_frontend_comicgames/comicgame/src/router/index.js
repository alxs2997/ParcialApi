import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../views/Dashboard.vue';
import Dashboar0 from '../views/Dashboard0.vue';

//para comics
import Editar from '../views/Editar.vue';
import Nuevo from '../views/Nuevo.vue';

//para games
import Edita0 from '../views/Edita0.vue';
import Nuev0 from '../views/Nuev0.vue';

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Dashboard',
    component: Dashboard
  },
  {
    path: '/dashboard0',
    name: 'Dashboard0',
    component: Dashboar0
  },
  {
    path: '/editar/:id',
    name: 'Editar',
    component: Editar
  },
  {
    path: '/nuevo',
    name: 'Nuevo',
    component: Nuevo
  },
  {
    path: '/edita0/:id',
    name: 'Edita0',
    component: Edita0
  },
  {
    path: '/nuev0',
    name: 'Nuev0',
    component: Nuev0
  },
  
]


const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
