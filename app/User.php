<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Prophecy\Doubler\ClassPatch\DisableConstructorPatch;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'first_name', 'last_name', 'email', 'country', 'province', 'avatar', 'notifications','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relaciones
    //Con Subcategories
    public function subcategories()
    {
      return $this->belongsToMany(Subcategory::class, 'user_subcategory', 'user_id', 'subcategory_id');
    }

    // Con Productos
    public function products()
    {
      return $this->belongsToMany(Product::class, 'user_product', 'user_id', 'product_id');

    }


    public function isAdmin()
    {
        if(Auth::user()->admin){
            return true;
        }
        return false;
    }
}
