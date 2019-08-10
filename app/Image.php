<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  // Especificamos las columnas que podemos escribir
  protected $fillable = ['route', 'product_id'];

  // Especificamos las columnas que están protegidas
  public $guarded = ['id'];

  // Relaciones
  // Con Products
  public function product()
  {
    return $this->belongsTo(Product::class, "product_id");
  }


}
