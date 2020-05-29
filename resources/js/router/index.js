import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../components/Home.vue'
import Cart from '../components/Cart.vue'
import Liked from '../components/Liked.vue'
import Detail from '../components/Detail.vue'
Vue.use(VueRouter)

const routes = [
    {
        path:'/',
        name:'Home',
        component:Home,

    },
    {
        path:'/cart',
        name:'Cart',
        component:Cart
    },
    {
        path:'/liked',
        name:'Liked',
        component:Liked
    },
    {
        path:'/:slug',
        name:'Detail',
        props:true,
        component:Detail
    }
    
]






const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
  })
  
export default router
  