<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Image;

class UserController extends Controller
{
    public function show(){
    	$categories = Category::all();
    	$products = Product::all();
    	$subcategories = Subcategory::all();
      $images = Image::all();
    	return view('profile', compact('products','subcategories', 'categories','images'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $req
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

    public function update(Request $req){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();
    	$userToUpdate = \Auth::user();

        // Valide los campos modificables que son requeridos. En el caso del email tengo que aclarar que el mail, que es único, salvo que el mail que viene en el form es el mismo ya registrado por ese usuario. Ya que daba el error de no poder modificar el mail del usuario.

        $req->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.$userToUpdate->id,
            'country' => 'required',
            
        ], [
            'first_name.required' => 'Por favor, ingresá tu nombre',
            'last_name.required' => 'Por favor, ingresá tu apellido',
            'email.required' => 'Por favor, ingresá tu email',
        ]);

        // Si viene una imagen, se guarda y reemplaza lo que hay en la base. Si no, simplemente deja lo que está ya guardado.

    	if(isset($req['avatar'])){

         
            $image = $req["avatar"];
            $finalImage = uniqid("img_") . "." . $image->extension();
            $image->storePubliclyAs("public/avatars", $finalImage);
            $userToUpdate->avatar = $finalImage;

      }
        //Actualizo las subcategorias seleccionadas por el usuario con sync

        if(isset($req['subcategories'])){
            $subcategories = $req['subcategories'];
            $userToUpdate->subcategories()->sync($subcategories);
        }

        // Actualizo si el usuario desea recibir notificaciones. Si del form  llega NULO es 0 sino 1. 

        $userToUpdate->notifications = ($req['notifications']==NULL) ? 0 : 1;
        
       
        // Guardo nombre, apellido, email, país.
         
		$userToUpdate->first_name = $req['first_name'];
		$userToUpdate->last_name = $req['last_name'];
		$userToUpdate->email = $req['email'];
		$userToUpdate->country = $req['country'];
        

		$userToUpdate->save();

		return redirect()->to('profile');

    }


}
