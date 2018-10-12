<template>



<div class="save">
    
    <button v-on:click="toggleSave()">
    
<i class="fas fa-heart"  v-bind:class="{icon:isSaved}"></i>
    
        
        {{toggleButton}}
    
    </button>
  
    </div>


</template>



<script>

    export default {
        
        name:'Save',
            
        props:['id'],
        
            
            data(){
            
               return{
            
            
            }
            
        },
            
        
           methods:{
                
                toggleSave(){
                
                        
                this.$store.dispatch('toggleSaved', this.id)
                
            },
               
            
                
        },
        
        
        
        computed:{
            
             isSaved(){
            
            return this.$store.state.saved.find(el =>  el == this.id)
            
        },
            
            
               toggleButton(){
                   
                  let found =  this.$store.state.saved.find(el=> el==this.id)
                   
                  if(found){
                      
                      return 'Saved'
                  }else{
                      
                      return 'Save'
                  }
                   
               }
        
            
        }
        
        
       
     
        
     
    }


</script>




<style scoped>


    .save{
        position:absolute;
        top:10px;
        right:2px;
    }
    
    
    i{
        
        font-size:20px;
    }
    
    
    .icon{
        color:red;
        
    }

</style>