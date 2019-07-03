<?php

namespace App;

use Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'nombreCat'
    ];


    public function products(){
      return $this->belongsToMany('App\Product');
    }


}
