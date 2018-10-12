<template>


<div class="saved">


    
    <p v-show="listings.length < 1 "> No saved Listings</p>
    
  <ListingSummary class="listing-summary" v-for="el in listings" 
                    
                    
          :key="el.id" 
                  
          :listing="el" >
        
    </ListingSummary>      
    
    

</div>
</template>




<script>
import ListingSummary from './ListingSummary'
    
    export default{
        
        name:'Saved',
        
        components:{
            
            ListingSummary
        },
        
        data(){
            
            
            return{
                
                
                
                
            }
        },
        
        
        computed:{
            
            listings(){
                
                
                let listings = this.$store.state.listings
                
                let saved = this.$store.state.saved
                
                let found = []
                
                
                for(var i = 0; i< saved.length; i++){
                    
                    
                    let elfound =   listings.find(el => el.id == saved[i])
                    
                    found.push(elfound)
                }
                
                
                return found
            }
        }
        
           
    }


</script>



<style scoped>

    
        .saved{
        

   
       display: flex;
    flex-direction: row;
    margin-left:10px;
        
        flex-grow: 1;
  flex-shrink: 1;
          flex-basis: 20px;

    }
    

    
    


</style>



