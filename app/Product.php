<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Category;

class Product extends Model
{
  protected $fillable = [
      'nombre', 'descripcion', 'imagen', 'precio', 'tipo', 'categoria_id', 'idCategory',
  ];

  public function categories() {
      return $this->belongsTo('App\Category');
  }

  public function getPrecioAttribute($valor) {
    $newForm = 'BS '.$valor;
    return $newForm;
  }
}
