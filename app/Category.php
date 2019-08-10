<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public $table = "categories";
  //public $primaryKey = "id";

  // Especificamos las columnas que podemos escribir
  protected $fillable = ['name'];

  // Especificamos las columnas que están protegidas
  protected $guarded = ['id'];

  // Relaciones

}
