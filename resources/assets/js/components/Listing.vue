<template>


<div>

 <div class="header">
     <div class="header-img" v-bind:style="headerImageStyle">
    
    
         <Save v-bind:id="id" ></Save>
    
    
    </div>
        
        
            </div> 

    <div class="container">
     <div class="heading">
    <h1> {{title }}</h1>
    <p>{{address }}</p>
  </div>
    
    
  <hr>
    
    
  <div class="about">
    <h3>About this listing</h3>
    <p>{{about }}</p>
  </div>
        
        
        <hr>
        

    <h5>Amenities</h5>
    
    <span v-for="amenity in amenities">
    
    
    
    <i v-bind:class="amenity.icon">   </i>
        
       <span style="margin-right:20px;" >{{amenity.title}}</span> 
    
    </span>

        
    <hr>
    
    <h5> Prices</h5>
        
        
        
        
       <p>Price per night : {{prices.pricepernight}}</p> 
        
        <p>Extra people : {{prices.priceextrapeople}}</p> 

        
        <p>Monthly Discount : {{prices.pricemonthlydiscount}}</p> 


    
</div>
    
    
    
    <div style="display:flex; flex-wrap:wrap">

        
        <div style="margin-left:70px" v-for="img in images">
        

            <img style="height:400px; width:500px":src="img"> 
            
            
            </div>
        
        </div>
    
    
    </div>
    
</template>


<script>
    
    
          import Save from './Save' 

    
  

export default {
 
    components:{
        
        Save,
    },
    
    
    data(){
        
        
        return{
            
    title: null,
    address: null,
    about: null,
     id:null,
     headerImageStyle: {
    'background-image': ''
  },
  amenities: [],
  prices:[],
   images:[],
        

      
  }
            
    },
    
    
  
    
     beforeRouteEnter(to, from, next) {
            
           
function formatListing(listing){


// Format AMenities data from databae into an array
 let amenityU = [
                {title:'Wireless Internet', icon:' fas fa-wifi', bool: listing['amenity_wifi']},
                {title:'Breakfast', icon:'fas fa-coffee', bool: listing['amenity_breakfast']},
                {title:'Kitchen', icon:'fas fa-utensils', bool: listing['amenity_kitchen']},
                {title:'TV', icon:'fas fa-tv', bool: listing['amenity_laptop']},
                  ];


let amenityArr = amenityU.filter(el => el.bool == 1);

// Format Prices data from databae into an array
let prices = {  pricepernight: listing['price_per_night'], 
              priceextrapeople:listing['price_extra_people'],
              pricemonthlydiscount:listing['price_monthly_discount']

                };


// Format Images data from MODEL 
let imagesU = [
             listing['image_1'],
              listing['image_2'],
              listing['image_3'],
              listing['image_4']
              ];
    

let imagesF = imagesU.filter(el => el !== null );
        
        
        
        return [amenityArr, prices, imagesF]
        
    }       
         
         var listing = JSON.parse(window.vueListing)

         
         
            

              // Check that data is correct
             if(to.path == listing.path){
                                  
                 
        let Arr =  formatListing(listing);
                 
        let amenityArr = Arr[0];
         let prices = Arr[1];
         let imagesF = Arr[2];
                 
                 next(component => {
                     
                     
                     component.amenities =  amenityArr;
                     component.prices = prices;
                     component.images = imagesF;
                     component.title = listing.title;
                    component.about= listing.about;
                        component.address = listing.address;
                     component.headerImageStyle = {'background-image':'url(' + imagesF[0] + ')'};
                     component.id = listing.id;

                    component.listing = listing;

                                   
                     
                                   
                                   
                                   });
         
              
             }else{
                 
                                  
          axios.get('/api' + to.path ).then(({data}) => {
                     
              
              
              
              let listing = data;
              
              let Arr =  formatListing(data);
                 
                let amenityArr = Arr[0];
                 let prices = Arr[1];
                 let imagesF = Arr[2];
                            
              
                    next(component => {
                     
                     
                     component.amenities =  amenityArr;
                     component.prices = prices;
                     component.images = imagesF;
                     component.title = listing.title;
                     component.about= listing.about;
                     component.address = listing.address;
                     component.headerImageStyle = {'background-image':'url(' + imagesF[0] + ')'};
                    component.id = listing.id;


                                   
                                   });
                               
                 });
                 
                 
             }
    
        
        }
                    
            
    
    }
</script>



<style scoped>


    .header{
        
        position:relative;
    }
  
</style>
