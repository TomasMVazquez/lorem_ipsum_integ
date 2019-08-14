<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Image;

class AdminController extends Controller
{
    public function index()
    {
      $products = Product::all();
      $categories = Category::all();
      $subcategories = Subcategory::all();
      $images = Image::all();

      return view('admin',compact('products','categories','subcategories','images'));
    }

    public function destroy ($id)
  	{
  		$productToDelete = Product::find($id);
      $productToDelete->delete();
  		return redirect('/admin');
  	}

  	public function edit ($id)
  	{
  		$productToEdit = Product::find($id);
      $categories = Category::all();
      $subcategories = Subcategory::all();
      $images = Image::where('product_id','=',$id)->get();
  		return view('product-edit', compact('productToEdit','categories','subcategories','images'));
  	}

  	public function update ($id, Request $request)
  	{
      $productToUpdate = Product::find($id);
  		$productToUpdate->name            = $request['name'];
  		$productToUpdate->brief           = $request['brief'];
  		$productToUpdate->description     = $request['description'];
  		$productToUpdate->rating          = $request['rating'];
  		$productToUpdate->benefits        = $request['benefits'];
      $productToUpdate->uses            = $request['uses'];
  		$productToUpdate->subcategory_id  = $request['subcategory_id'];
  		$productToUpdate->save();
  		return redirect('/admin');
  	}
}
