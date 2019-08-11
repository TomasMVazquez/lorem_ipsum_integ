<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
  // Especificamos las columnas que podemos escribir
  protected $fillable = ['type'];

  // Especificamos las columnas que están protegidas
  protected $guarded = ['id'];

  // Relaciones
  // Con Products
  public function products()
  {
    return $this->belongsToMany(Product::class, "presentation_product", "presentation_id", "product_id");
  }
}
