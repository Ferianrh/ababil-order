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
    Route::get('/','WelcomeController@index');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/produk','WelcomeController@product')->name('produk');

});

// Route::get('/','')



Auth::routes();

//admin
// Route::get('admin/dashboard', function(){
//     return view('admin/dashboard');
// })->middleware(['role','auth'])->name('admin.dashboard');

Route::get('admin/dashboard','DashboardController@index')->middleware(['role','auth'])->name('admin.dashboard');


// Route::resource('admin/jenis-jahit','JenisJahitController')->middleware(['role','auth']);
Route::resource('admin/ukuran','UkuranController')->middleware(['role','auth']);
Route::resource('admin/sisi-print','SisiPrintController')->middleware(['role','auth']);
Route::resource('admin/kain','KainController')->middleware(['role','auth']);
Route::resource('admin/katalog','KatalogController')->middleware(['role','auth']);
Route::get('admin/pelanggan','PelangganController@index')->middleware(['role','auth'])->name('pelanggan.index');
Route::resource('admin/custom-print','CustomPrintController')->middleware(['role','auth']);
Route::resource('pesanan-admin','PesananAdminController')->middleware(['role','auth']);
Route::get('admin/laporan','LaporanController@index')->middleware(['role','auth'])->name('laporan.index');
Route::get('admin/laporan/cetak','LaporanController@cetak')->middleware(['role','auth'])->name('laporan.cetak');


//ajax data
Route::get('/getUkuran/{id}','CustomPrintController@getUkuran');
Route::get('/getJenis','CustomPrintController@getJenis');
Route::get('/getSisi','CustomPrintController@getSisi');
Route::get('/ukuran/{id}/{jenis}','PesanController@ukuran');
Route::get('/getKain','PesanController@kain');
Route::get('/getProvince','LocationsController@getProvince');
Route::get('/getCity/{id}','LocationsController@getCity');
Route::post('/getService','LocationsController@getService')->name('rajaongkir.service');
Route::post('/getCost', 'LocationsController@getCost')->name('rajaongkir.cost');


//user
Route::get('/home', 'HomeController@index')->middleware(['auth'])->name('home');
Route::resource('/setting', 'SettingController')->middleware(['auth']);
Route::resource('/pesan','PesanController')->middleware(['auth']);
Route::post('/pesanCustom','PesanController@pesanCustom')->middleware(['auth'])->name('pesan.custom');

Route::get('/sign-up','PelangganController@signUp')->name('daftar');
Route::post('/daftar','PelangganController@store')->name('signUp');


Route::get('/about', function(){
    return view("user/about");
});
Route::get('/contact', function(){
    return view("user/contact");
});

Route::resource('/pengiriman', 'PengirimanController')->middleware(['auth']);
Route::resource('/pembayaran','PembayaranController')->middleware(['auth']);


// Route::get('/jersey', function(){
//     return view("jersey");
// });


// Route::get('/pemesanan', function(){
//     return view("pemesanan");
// });

Route::get('/bayar', function(){
    return view("pembayaran");
});
