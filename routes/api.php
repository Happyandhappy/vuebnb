<?php

use Illuminate\Http\Request;
    
use App\Listing;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('listing/{id}', [
    
    'uses' =>  'ListingsController@get_listing',
    'as' => 'listing.single'
    
]);



Route::get('/', [
    
    'uses' => 'ListingsController@get_listings',
    'as' => 'listings.get'
    
]);


Route::post('/user/toggle_saved',[
   
    'uses' => 'UserController@toggle_saved'
    
])->middleware('auth:api');
