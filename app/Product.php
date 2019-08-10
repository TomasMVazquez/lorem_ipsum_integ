<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Innecesarias - borrar
      // public $table = "products";
      // public $primaryKey = "id";

    // Aclaramos que no están definidas estas columnas
    public $timestamps = false;

    // Especificamos las columnas que podemos escribir
    protected $fillable = ['name', 'brief', 'description', 'rating', 'presentation', 'benefits', 'use', 'subcategory_id'];

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
