<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Image;
use App\Presentation;

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

    public function add ()
    {
      $categories = Category::all();
      $subcategories = Subcategory::all();
      $presentations = Presentation::all();
      return view('product-add', compact('categories','subcategories','presentations'));
    }

    public function destroy ($id)
  	{
  		$productToDelete = Product::find($id);
      $productToDelete->delete();
  		return redirect('/admin');
  	}

    //View para ver que producto a editar
  	public function edit ($id)
  	{
  		$productToEdit = Product::find($id);
      $categories = Category::all();
      $subcategories = Subcategory::all();
      $presentations = Presentation::all();
      $images = Image::where('product_id','=',$id)->get();
  		return view('product-edit', compact('productToEdit','categories','subcategories','presentations','images'));
  	}

    //Funcion para editar el producto
  	public function update ($id, Request $request)
  	{
      // dd($request);

      $request->validate([
  			'category' => 'required',
        'subcategory_id' => 'required',
        'image' => 'image',
        'name' => 'required',
        'brief' => 'required',
        'description' => 'required',
        'uses' => 'required',
        'benefits' => 'required',
  			'presentation' => 'required',
  			'rating' => 'required | numeric | between:0,10'
  		], [
  			'name.required' => 'El nombre es obligatorio',
        'brief.required' => 'El resumen es obligatorio',
        'description.required' => 'La descripcion es obligatorio',
        'uses.required' => 'Los usos son obligatorio',
        'benefits.required' => 'Los beneficios son obligatorio',
        'presentation.required' => 'Los tipos de presentaciones son obligatorio',
        'rating.required' => 'El rating es obligatorio',
        'rating.numeric' => 'El rating debe ser un numero del 1 al 10',
        'rating.between' => 'El rating debe ser un numero del 1 al 10'
  		]);

      $productToUpdate = Product::find($id);

      // Imagen
      if($request->hasfile('image')){

        // Recupero
        $image = $request["image"];

        // Armo un nombre único para este archivo
        $finalImage = uniqid("$productToUpdate->id _") . "." . $image->extension();

        // Subo el archivo en la carpeta elegida
        $image->storePubliclyAs("public/items", $finalImage);

        $newProdImage = new image(['product_id' => $productToUpdate->id,'route' => $finalImage]);
        $productToUpdate->images()->save($newProdImage);
      }

      // dd($request['presentation']);
      $productToUpdate->presentation()->sync($request['presentation']);

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
