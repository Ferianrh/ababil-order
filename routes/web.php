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

// Route::resource('admin/jenis-jahit','JenisJahitController')->middleware(['role','auth']);
Route::resource('admin/ukuran','UkuranController')->middleware(['role','auth']);
Route::resource('admin/sisi-print','SisiPrintController')->middleware(['role','auth']);
Route::resource('admin/kain','KainController')->middleware(['role','auth']);
Route::resource('admin/katalog','KatalogController')->middleware(['role','auth']);
//user
Route::get('/home', 'HomeController@index')->middleware(['auth'])->name('home');


// Route::get('/jersey', function(){
//     return view("jersey");
// });

Route::get('/form-jersey', function(){
    return view("form-jersey");
});
