<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;

class UserController extends Controller
{
    //
    
    
    public function toggle_saved(Request $request){
        
        
        
        $id = $request->id;

              
        // only accessible with auth middleware
        $user = Auth::user();
        
        $saved = $user->saved;
        
        
        $key = array_search($id, $saved);
        
        
        if($key === false){
            
            array_push($saved, $id);
        }else{
            
            array_splice($saved, $key, 1);
        }
        
        
        $user->saved = $saved;
        
        $user->save();
        
  
        
        return response()->json(['saved' => $saved, 'key' => $key]);
        
    }
}
