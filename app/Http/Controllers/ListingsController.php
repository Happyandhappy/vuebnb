<?php

namespace App\Http\Controllers;

use App\Listing; 

use Illuminate\Http\Request;


use Auth;

class ListingsController extends Controller
    
    
{
    //
    

    
    
    // API
    
    public function get_listing($id){
                    
        $listing = Listing::find($id);
        

        for($i=1; $i<=4; $i++){
            
            $listing['image_'.$i] =  asset( 'images/' . $listing->id   . '/Image_' . $i . '.jpg' );
            
        }
        
        return response()->json($listing);
        
    }   
    
    
        // API
    
    public function get_listings(Request $request){
        
        
        
        
              $listingsU = Listing::all(['id', 'address', 'title', 'price_per_night']);
        
        
        $listingsU->transform(function($listing){
            
            $listing->thumb = asset('images/' . $listing->id . '/Image_1_thumb.jpg'); 
            
            return $listing;
        });
        
        
        
        $listings =[];
        
        $listings['listings'] = $listingsU;
        
        $listing['saved'] = Auth::check() ? Auth::user()->saved : [];
        

        return response()->json($listings);
        
    }
    
    
    // ROUTER
    public function  single($id, Request $request){
        
        
            
    $listing = Listing::find($id);
        
        
    for($i=1; $i<=4; $i++){
            
            $listing['image_'.$i] =  asset( 'images/' . $listing->id   . '/Image_' . $i . '.jpg' );
            
        }        
        
    
        $listing['path'] =  $request->getPathInfo();

        return view('app', ['listing' => $listing]);
        
        
    }
    
    
    public function home (Request $request){
        
        
        
        $listingsU = Listing::all(['id', 'address', 'title', 'price_per_night']);
        
        
        $listingsU->transform(function($listing){
            
            $listing->thumb = asset('images/' . $listing->id . '/Image_1_thumb.jpg'); 
            
            return $listing;
        });
        
        
        $listings = [];
        
        $listings['listings'] = $listingsU;
        $listings['path'] = $request->getPathInfo();
        // returns true id user is authenticated
        $listings['auth'] = Auth::check();
        
        // add saved items if the user is authenticated, otherwise return empty array
        $listings['saved'] = Auth::check() ? Auth::user()->saved : [];
        
    
        return view('app', ['listing' => $listings]);
    
    
    }
    
    

}
