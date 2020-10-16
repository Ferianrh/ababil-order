<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function(){
        return view('welcome');
        
    });
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});

// Route::get('/','')



Auth::routes();

//admin
Route::get('admin/dashboard', function(){
    return view('admin/dashboard');
})->middleware(['role','auth'])->name('admin.dashboard');
//user
Route::get('/home', 'HomeController@index')->middleware(['auth'])->name('home');


// Route::get('/jersey', function(){
//     return view("jersey");
// });

Route::get('/form-jersey', function(){
    return view("form-jersey");
});
Route::get('/setting', function(){
    return view("setting-profile");
});
