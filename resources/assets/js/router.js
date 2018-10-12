import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Home from './components/Home'
import Listing from './components/Listing'
import Saved from './components/Saved'
import Login from './components/Login'
import store from './store'

export default new VueRouter({
    
    mode:'history',
    routes:[

         {
            name:'Home',
            path:'/',
            component:Home,
        },
        

        {
            name:'Listing',
            path:'/listing/:listing',
            component:Listing,
        },
        
        
        {
            
            name:'Saved',
            path:'/saved',
            component:Saved,
            beforeEnter:(to,from,next) =>{
                
                
                if(!store.state.auth){
                     next('/login')

                }else{
                    
                    next()
                }
                
            }
        },
        
        {
            
            name:'Login',
            path:'/login',
            component:Login
        }
          
    ],
    
    
 
    
            
    scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 }
  },

    
});