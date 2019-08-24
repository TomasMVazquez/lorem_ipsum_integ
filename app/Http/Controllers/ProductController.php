<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;
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

    public function category($id)
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

    public function search()
    {

      $search = Input::get('search');
      $products = Product::where('name','LIKE','%'.$search.'%')
                  ->orWhere('brief','LIKE','%'.$search.'%')
                  ->orWhere('description','LIKE','%'.$search.'%')
                  ->orWhere('benefits','LIKE','%'.$search.'%')
                  ->orWhere('uses','LIKE','%'.$search.'%')
                  ->get();

      if (count($products) > 0){

        $images = Image::all();
        $title = "Encontrado!";
        return view('products', compact('products','images','title'))->withQuery($search);;

      }else {

        return view ('index');
      }

    }

}
