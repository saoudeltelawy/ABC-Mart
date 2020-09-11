<?php


use Illuminate\Support\Facades\Route;

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

// Route::get('/admin/dashboard' , function(){
//     return view('admin.admindashboard');
// });






Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        
        Route::group(['prefix' => 'admin' , 'namespace'=>'admin'], function () {
    
            Route::get('/dashboard' , 'adminController@main')->name('dash.main');
            
            });

            
    });

