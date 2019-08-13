<?php
use App\Http\Middleware\isAdmin;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/faqs', function () {return view('faqs');});

Route::get('/products', 'ProductController@index')->name('index');

Route::get('/products/{id}', 'ProductController@show')->name('show');

Route::get('/profile', 'UserController@show')->name('profile');
Route::get('/admin', 'AdminController@index')->middleware('isAdmin');
