import Vue from 'vue'
import Vuex from 'vuex'
import router from './router'
import axios from 'axios'
Vue.use(Vuex)


   axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
     'X-CSRF-TOKEN': window.csrf_token
   };


export default new Vuex.Store({
    
    
    state:{
        
        
        saved:[],
        listings:[],
        auth:false,
    },
    
    
    mutations:{
        
        toggleSave(state, id){
            
    

      let index = state.saved.findIndex(saved => saved === id);
                
        if (index === -1) {
        state.saved.push(id);
                    
                    
      } else {
          
          
        state.saved.splice(index, 1);
      }
     
    
            
        },
        
        push(state, list){
            

            state.listings = list
            
        },
        
        
        pushAuth(state, auth){
            
            state.auth = auth
        },
        
        InitSaved(state, saved){
            
            state.saved = saved
            
            
        }
    },
    
    
    actions:{
        
        toggleSaved({commit,state}, id){
            
            
        if(state.auth){

                axios.post('/api/user/toggle_saved', {id} ).then(
                
                () => {
                    
                        commit('toggleSave', id)
                          
                          
                          }
                );

        } else{
            
            router.push('/login')
        }

            
            
        },
        
        
    }
});