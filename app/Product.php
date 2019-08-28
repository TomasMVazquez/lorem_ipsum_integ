<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // Agergamos esta linea para permitir el sofdelete
    use SoftDeletes;

    // Especificamos las columnas que podemos escribir
    protected $fillable = ['name', 'brief', 'description', 'benefits', 'uses', 'subcategory_id'];

    // Especificamos las columnas que están protegidas
  	protected $guarded = ['id'];

    // Relaciones
    // Con Subcategory
    public function subcategory()
  	{

  		return $this->belongsTo(Subcategory::class, 'subcategory_id');
  	}

    // Con Users
  	public function users()
  	{
  		return $this->belongsToMany(User::class, 'user_product', 'product_id', 'user_id');
  	}

    // Con Images
    public function images()
    {
      return $this->hasMany(Image::class, 'product_id');
    }

    // Con Presentaciones
    public function presentation()
  	{
  		return $this->belongsToMany(Presentation::class, 'presentation_product', 'product_id', 'presentation_id');
    }
}
