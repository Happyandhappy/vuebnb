<template>


<div>
    
    
<div id="toolbar">
    
    
 <router-link to="/"> <img class="icon" src="/images/logo.png"> </router-link>
  <h1>vuebnb</h1>
    
    
    
     <router-link to="/login" v-show="!$store.state.auth"> <h1 id="login"> Login </h1>  </router-link> 
    
    
     <a @click="logout" class="logout" v-show="$store.state.auth"><h1>Log Out</h1></a>
         <form
           style="display: hidden"
           action="/logout"
           method="POST"
           id="logout" >
           <input type="hidden" name="_token" :value="csrf_token"/>

    </form>
    
  <router-link to="/saved" > <h1 id="saved"> Saved </h1>  </router-link> 
    
</div>

<router-view>
    
    </router-view>
    
    
    </div>

</template>




<script>
    
import Listing from './Listing'
import Home from './Home'

    export default{
        
        name:'App',
        components:{
            
            Listing,
            Home
        },
        
        data(){
            
                return{
                    
             csrf_token: window.csrf_token

                }
        
        },
        
        methods:{
            
            logout(){
                
                document.getElementById('logout').submit();
            }
        }
    }


</script>



<style scoped>
    
    #saved{
        
        position:absolute;
        right:10px;
        top:15px;
    }

    
    
    #toolbar{
        
        position:relative;
    }

    
    
    #login{
        
       margin-left:50px;
    }
    
    .logout{
        margin-left:50px;
        cursor:pointer;
    }
</style>