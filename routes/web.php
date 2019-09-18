<?php
use App\Http\Middleware\isAdmin;
use Illuminate\Http\Request;
use App\User;
use App\Subcategory;
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
Route::get('/products/category/{category_id}', 'ProductController@category')->name('index');
Route::put('/products/category/{category_id}', 'ProductController@fav')->middleware('auth');

//Rutas para ir por subcategoria
Route::get('/products/subcategory/{subcategory_id}', 'ProductController@subcategory')->name('index');

//agregar favoritoss
Route::post('/favorito', function(Request $req){
  //Le pedimos el input dentro del fromJS al request que fue enviado con el datatosend
  $data = json_decode($req->input('fromJS'),true);
  //buscamos el usuario por el id
  $myUser = User::find($data['user_id']);
  //validamos si el usuario ya tiene como fav ese product
  if (!$myUser->products()->find($data['product_id'])) {
    //sino lo tiene lo agregamos
    $myUser->products()->attach($data['product_id']);
    return ['status' => 'Added'];
  }else {
    //si lo tiene lo sacamos
    $myUser->products()->detach($data['product_id']);
    return ['status' => 'taken out'];
  }
})->middleware('auth');

//Ruta para el buscador
Route::get('/products/search', 'ProductController@search');



//ruta para detalle producto
Route::get('/products/{id}', 'ProductController@show')->name('show');

Route::get('/profile', 'UserController@show')->name('profile');

Route::put('/profile', 'UserController@update')->name('update');


//ChangePass

//Route::get('/changePass', 'UserController@showChangePassForm');

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
//Eliminar imagenes en el Edit
use App\Image;
Route::get('/removeImg/{id}', function($id){
    Image::find($id)->delete();
    return ['status' => 'taken out'];
})->middleware('isAdmin');;

//test
Route::get('/subcategories/{category_id}', function($categoryId){
  $subcategories = Subcategory::select('id','name')->where('category_id','=',$categoryId)->get();
  foreach ($subcategories as $subcategory) {
    $rdo[] = [$subcategory->id => $subcategory->name];
  }
  return $rdo;
})->middleware('auth');
