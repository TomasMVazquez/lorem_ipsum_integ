<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Especificamos las columnas que podemos escribir
    protected $fillable = ['name', 'brief', 'description', 'rating', 'benefits', 'uses', 'subcategory_id'];

    // Especificamos las columnas que están protegidas
  	protected $guarded = ['id'];

    // Relaciones
    public function subcategory()
  	{
  		return $this->belongsTo(Subcategory::class);
  	}

  	public function users()
  	{
  		return $this->belongsToMany(User::class);
  	}
}
