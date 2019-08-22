<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Image;
use App\User;

class ProductController extends Controller
{
    public function show($id)
    {

      return view('product-detail', compact('id'));
    }

    public function index()
    {
      $products = Product::all();
      $images = Image::all();
      $title = null;
    	return view('products', compact('products','images','title'));
    }

    public function categoria($id)
    {
      $products = Product::select('*','products')
                  ->join('subcategories','subcategories.id','=','subcategory_id')
                  ->select('products.*')
                  ->where('subcategories.category_id','=',$id)
                  ->get();

      $images = Image::all();
      $title = Category::find($id);
      return view('products', compact('products','images','title'));
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
