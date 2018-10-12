<?php


use App\Listing;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/listing/{id}',  [
    
    'uses' => 'ListingsController@single',
    'as' => 'listing.single'
 ]);




Route::get('/',  [
    
    'uses' => 'ListingsController@home',
    'as' => 'listings'
 ]);




Auth::routes();


// auth middleware requires login. can be applied to any route

Route::get('/saved', 'ListingsController@home')->middleware('auth');