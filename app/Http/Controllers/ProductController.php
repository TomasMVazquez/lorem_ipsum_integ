<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Image;
use App\User;

class ProductController extends Controller
{
    public function show($id)
    {

      return view('product-detail', compact('id'));
    }

    public function index(){
    	$products = Product::all();
      $images = Image::all();
    	return view('products', compact('products','images'));
    }

    public function fav(Request $request)
    {
      $myUser = User::find($request['user-id']);
      $myUser->products()->attach($request['fav-id']);

      $products = Product::all();
      $images = Image::all();
      return view('products', compact('products','images'));
    }


}
