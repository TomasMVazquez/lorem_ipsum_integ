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

//ruta para todos los productos
Route::get('/products', 'ProductController@index')->name('index');

//Rutas para ir por categoria
Route::get('/products/categoria/{category_id}', 'ProductController@categoria')->name('index');
Route::put('/products/categoria/{category_id}', 'ProductController@fav')->middleware('auth');

//Ruta para el buscador
Route::any('/search', 'ProductController@search');

//ruta para detalle producto
Route::get('/products/{id}', 'ProductController@show')->name('show');

Route::get('/profile', 'UserController@show')->name('profile');

Route::put('/profile', 'UserController@update')->name('update');

// Administrador index
Route::get('/admin', 'AdminController@index')->middleware('isAdmin');
// Adminstrador crear producto
Route::get('/admin/add', 'AdminController@add')->middleware('isAdmin');
Route::post('/admin/add', 'AdminController@store')->middleware('isAdmin');
Route::post('/admin/addCat', 'AdminController@storeCategory')->middleware('isAdmin');
Route::post('/admin/addSubCat', 'AdminController@storeSubCategory')->middleware('isAdmin');
Route::post('/admin/addPres', 'AdminController@storePresentation')->middleware('isAdmin');
// Administrador Editar Producto
Route::get('/admin/{id}', 'AdminController@edit')->middleware('isAdmin')->name('edit');
Route::put('/admin/{id}', 'AdminController@update')->middleware('isAdmin');
// Administrador Eliminar Producto
Route::delete('/admin/{id}', 'AdminController@destroy')->middleware('isAdmin');
