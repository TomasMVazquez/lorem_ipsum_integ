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

}
