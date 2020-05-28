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


Auth::routes();

Route::get('/', function (){
    return view('user.index');
});

/*Route::group(['middleware' => ['auth', 'admin']], function (){
    /*Route::get('/admin', function (){
        return view('home');*/
    /*Route::get('/admin/dashboard', 'AdminController@dashboard');*/
/*});*/

/*Route::get('/', 'Customer\FrontController@index')->name('front.index');
Route::get('/article', 'Customer\FrontController@article')->name('front.article');
Route::get('/article/cari', 'Customer\FrontController@cari');

//**Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home'); //JADI ROUTING INI SUDAH ADA DARI ARTIKEL SEBELUMNYA TAPI KITA PINDAHKAN KEDALAM GROUPING

    Route::resource('article', 'ArticleController');
    Route::resource('psikolog', 'PsikologController');
});
Route::group(['prefix'=>'customer'], function (){
    Route::get('/login', 'Customer\LoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'Customer\LoginController@login')->name('customer.login.submit');

});

Route::get('/payment', function (){
    return view('ecommerce.payment');
});

Route::get('/checkout-finish', function (){
    return view('ecommerce.checkout_finish');
});*/

