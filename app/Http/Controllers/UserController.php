<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(/*$user*/)
    {
      return view('profile'/*, compact('user')*/);
    }
}
