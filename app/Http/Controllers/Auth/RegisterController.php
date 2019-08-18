<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Category;
use App\Subcategory;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
      $categories = Category::all();
      $subcategories = Subcategory::all();
      return view('auth.register', compact('categories', 'subcategories'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user' => ['required', 'string', 'max:100', 'unique:users'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'country' => ['required'],
            'avatar' => ['image'],
            'password' => ['required', 'min:5', 'confirmed'],
        ], [
            'user.required' => 'Debes ingresar un nombre de usuarie',
            'user.unique' => 'Ya existe une usuarie con ese nombre',
            'first_name.required' => 'Debes ingresar tu nombre',
            'last_name.required' => 'Debes ingresar tu apellido',
            'email.required' => 'Debes ingresar tu email',
            'email.unique' => 'Ya existe une usuarie con ese email',
            'country.required' => 'Debes seleccionar tu país',
            'image' => 'El archivo seleccionado no es una imagen',
            'password.required' => 'Debes ingresar una contraseña',
            'password.min' => 'Tu conraseña debe tener al menos 5 caracteres'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $request = app('request');

      // Imagen de perfil
      if($request->hasfile('avatar')){

        // Recupero
        $image = $data["avatar"];

        // Armo un nombre único para este archivo
        $finalImage = uniqid("img_") . "." . $image->extension();

        // Subo el archivo en la carpeta elegida
        $image->storePubliclyAs("public/avatars", $finalImage);

      } else {
        $finalImage = 'img_avatar4.png';
      }

/*
        return User::create([
            'user' => $data['user'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'country' => $data['country'],
<<<<<<< Updated upstream
            'avatar' => $finalImage,
            //'subcategories'=> $data['notifications'],
            'notifications'=> $data['notifications'],
=======

          //  'avatar' => $data['avatar'],
          //  'notifications'=> $data['notifications'],
>>>>>>> Stashed changes
            'password' => Hash::make($data['password']),
        ]);

*/
        $user = User::create([
            'user' => $data['user'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'country' => $data['country'],
            'avatar' => $finalImage,
            'notifications'=> $data['notifications'],
            'password' => Hash::make($data['password']),
        ]);

        // Subcategorias
        if($request->has('subcategories')){

          $subcategories = $data['subcategories'];
          $user->subcategories()->attach($subcategories);
        }

          return $user;

  }
}
