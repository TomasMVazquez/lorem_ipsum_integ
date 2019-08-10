<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  public $table = "subcategories";
  //public $primaryKey = "id";

  // Especificamos las columnas que podemos escribir
  protected $fillable = ['name', 'category_id'];

  // Especificamos las columnas que están protegidas
  protected $guarded = ['id'];

  // Relaciones
  public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
