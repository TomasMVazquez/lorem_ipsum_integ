<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;

class UserController extends Controller
{
    public function show(){
    	$categories = Category::all();
    	$products = Product::all();
    	$subcategories = Subcategory::all();
    	return view('profile', compact('products','subcategories', 'categories'));
    }

    public function update(Request $req){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();
    	$userToUpdate = \Auth::user();

    	// if($req->hasfile('avatar')){

	    //     // Recupero
	    //     $image = $req["avatar"];

	    //     // Armo un nombre único para este archivo
	    //     $finalImage = uniqid("img_") . "." . $image->extension();

	    //     // Subo el archivo en la carpeta elegida
	    //     $image->storePubliclyAs("public/avatars", $finalImage);

	    //   }  

	    if($req->has('subcategories')){

          $subcategories = $req['subcategories'];
          $userToUpdate->subcategories()->attach($subcategories);
        }

    	// $userToUpdate->avatar = $finalImage;
    	// $userToUpdate->user = $req['user'];
		$userToUpdate->first_name = $req['first_name'];
		$userToUpdate->last_name = $req['last_name'];
		$userToUpdate->email = $req['email'];
		$userToUpdate->country = $req['country'];


		$userToUpdate->save();

		return redirect()->to('profile');

    }

   
}
