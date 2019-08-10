<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = "categories";

  // Especificamos las columnas que podemos escribir
  protected $fillable = ['name'];

  // Especificamos las columnas que están protegidas
  protected $guarded = ['id'];

  // Relaciones
  public function subcategory()
  {
    return $this->hasMany(Subcategory::class, 'subcategory_id');
  }
}
