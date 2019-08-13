<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=['route', 'product_id'];
    protected $guarded =['id'];

    public function product(){
      return $this->belongsTo(Product::class, "product_id");
    }

}
