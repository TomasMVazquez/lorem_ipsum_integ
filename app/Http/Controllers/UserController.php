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

    public function update(Request $req){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();
    	$userToUpdate = \Auth::user();

    	if(ISSET($req['avatar'])){

            // Recupero
            $image = $req["avatar"];

            // Armo un nombre único para este archivo
            $finalImage = uniqid("img_") . "." . $image->extension();

            // Subo el archivo en la carpeta elegida
            $image->storePubliclyAs("public/avatars", $finalImage);

      }
        if(isset($req['subcategories'])){
            $subcategories = $req['subcategories'];
            $userToUpdate->subcategories()->sync($subcategories);
        }

        $userToUpdate->notifications = ($req['notifications']==NULL) ? 0 : 1;
        // $userToUpdate->notifications = (isset($req['notifications'])) ? 1 : 0;
       
        if(isset($req['avatar'])){
            $userToUpdate->avatar = $finalImage;
        }
         
		$userToUpdate->first_name = $req['first_name'];
		$userToUpdate->last_name = $req['last_name'];
		$userToUpdate->email = $req['email'];
		$userToUpdate->country = $req['country'];
        $userToUpdate->notifications = $req['notifications'];

		$userToUpdate->save();

		return redirect()->to('profile');

    }


}
