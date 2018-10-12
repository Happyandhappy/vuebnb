<template>


<div class="home-container">
    
    

<div v-for="(group,country) in listings">
    
    
    
    
    <h1> Places in {{country}}</h1>
    
    
    
    <div class="listing-summaries">
    
        
        
    <ListingSummary class="listing-summary" v-for="listing in group" 
                    
                    
          :key="listing.id" 
          :listing="listing"  >
        
    </ListingSummary>  
        
        
    </div>

    </div>
    
    
    
    
    
    </div>

</template>




<script>

    import ListingSummary from './ListingSummary'
    
    
    
              let listings = JSON.parse(window.vueListing);

    


    
    export default{
   
        
        name:'Home',
        
        components:{
            
            ListingSummary:ListingSummary
        },
      data(){
          
          
          return{
              
              
              listings:[],
              rawlist:null,
              auth:null,
              saved: [],
          }
      },
        
        created(){
            
            
           this.$store.commit('InitSaved', listings.saved)
        },
        
        
        methods:{
          
            
            injectlist(){
                
                this.$store.commit('push', this.rawlist)
            },
            
            injectAuth(){
                
                this.$store.commit('pushAuth', this.auth)
            },
            
            injectSaved(){
                
                this.$store.commit('pushSaved', this.saved)
            }
            
        },
        
        
          beforeRouteUpdate(to, from, next) {
    this.$options.beforeRouteEnter(to, from, next)
  },
        
          watch: {
    rawlist:  'injectlist',
              
    auth:'injectAuth',
              
        saved:'injectSaved'
  },
    
        
        
         beforeRouteEnter(to, from, next) {
 
              let groupByCountry = function (listings) {
              if (!listings) return {};
              return listings.reduce(function (rv, x) {
                let key = ['Taiwan', 'Poland', 'Cuba'].find(country => x.address.indexOf(country) > -1);
                if (!rv[key]) {
                  rv[key] = [];
                }
                rv[key].push(x);
                return rv;
              }, {});
            };

                // Parse data from controller
             
             
             // Check that data is correct
             if(to.path == listings.path){
                 
                 let listingGroup = groupByCountry(listings.listings);     
                 
                 

                 console.log(listings.saved)
                 
                 next(component=> {component.listings = listingGroup;
                                   component.rawlist = listings.listings;
                                  component.auth = listings.auth;
                                  
                                  })
             }else{
                 
                 
                 axios.get('/api/').then(({data}) => {
                     
                     
                     console.log(data.saved)
                      
                     let listingGroup =  groupByCountry(data);
                     
                     next(component => {component.listings = listingGroup;          
                                          component.rawlist = data.listings;
                                       });
                 });
                 
                 
             }
    
        
        }
        
        
    }

        
   
    


</script>




<style scoped>

    .listing-summaries{
        

   
       display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-left:10px;
        
        flex-grow: 1;
  flex-shrink: 1;
          flex-basis: 20px;

    }
    
    .home-container{
        
        margin: 0 auto;
        overflow-x:hidden;
    }
    
    
    @media(min-width:1131px){
        
        .home-container{
            width: 1100px;
        }
    }

  .listing-summaries > .listing-summary {
    margin-right: 15px;
  }
    
    



</style>