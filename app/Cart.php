<?php

namespace App;

class Cart {

public $items; // ['id' => ['cantidad' => ,'precio' => , 'data' => ]]
public $totalCantidad;
public $totalPrecio;


  public function __construct($prevCart) {
    if($prevCart != null) {
        $this->items = $prevCart->items;
        $this->totalCantidad = $prevCart->totalCantidad;
        $this->totalPrecio = $prevCart->totalPrecio;
    } else {
      $this->items = [];
      $this->totalCantidad = 0;
      $this->totalPrecio = 0;
    }
  }

    public function addItem($id, $product) {

      $precio = (int) str_replace("BS ", "",$product->precio);

      //el item ya existe
      if(array_key_exists($id,$this->items)) {
        $productToAdd = $this->items[$id];
        $productToAdd['cantidad']++;
        $productToAdd['totalSinglePrecio'] = $productToAdd['cantidad'] * $precio;
      //primera vez agregar
      } else {
        $productToAdd = ['cantidad' => 1, 'totalSinglePrecio' => $precio, 'data'=>$product];
      }

      $this->items[$id] = $productToAdd;
      $this->totalCantidad++;
      $this->totalPrecio = $this->totalPrecio + $precio;


    }

    public function updatePriceAndQuantity() {
      $totalPrecio = 0 ;
      $totalCantidad = 0;

      foreach($this->items as $item ) {
        $totalCantidad = $totalCantidad + $item['cantidad'];
        $totalPrecio = $totalPrecio + $item['totalSinglePrecio'];



      }

      $this->totalCantidad = $totalCantidad;
      $this->totalPrecio = $totalPrecio;
    }




  }
