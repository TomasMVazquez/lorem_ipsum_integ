<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  public $table = "subcategories";

  // Especificamos las columnas que podemos escribir
  protected $fillable = ['name', 'category_id'];

  // Especificamos las columnas que están protegidas
  protected $guarded = ['id'];

  // Relaciones
  // Con Category
  public function category()
	{
		return $this->belongsTo(Category::class);
	}

  // Con Product
  public function product()
  {
    return $this->hasMany(Product::class);
  }

  // Con User
  public function users()
  {
    return $this->belongsToMany(User::class, "user_subcategory", "subcategory_id", "user_id");
  }

}
