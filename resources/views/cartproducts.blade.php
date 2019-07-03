@extends('layouts.index')


@section('center')
<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
    </div>
    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>

          {{ $userData->name }}

          <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="description"></td>
            <td class="price">Precio</td>
            <td class="quantity">Cantidad</td>
            <td class="total">Total</td>
            <td></td>
          </tr>
        </thead>
        <tbody>


          @foreach($cartItems->items as $item)

          <tr>

            <td class="cart_product">



            </td>
            <td class="cart_description">
              <h4><a href="">{{ $item['data']['nombre']}}</a></h4>
              <p>Id: {{ $item['data']['id']}}</p>
              <p>{{ $item['data']['tipo']}}</p>
            </td>
            <td class="cart_price">
              <p>{{ $item['data']['precio']}}</p>
            </td>
            <td class="cart_quantity">
              <div class="cart_quantity_button">
                <a class="cart_quantity_up" href="{{route('IncreaseSingleProduct', ['id'=>$item['data']['id']]) }}"> + </a>
                <input class="cart_quantity_input" type="text" name="cantidad" value="{{$item['cantidad']}}" autocomplete="off" size="2">
                <a class="cart_quantity_down" href="{{ route('DecreaseSingleProduct',['id' => $item['data']['id']]) }}"> - </a>
              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price">{{$item['totalSinglePrecio'] }}</p>
            </td>
            <td class="cart_delete">
              <a class="cart_quantity_delete" href="{{route('DeleteItemFromCart', ['id'=>$item['data']['id']]) }} "><i class="fa fa-times"></i></a>
            </td>
          </tr>

          @endforeach






        </tbody>
      </table>
    </div>
  </div>
</section> <!--/#cart_items-->

<section id="do_action">
  <div class="container">
    <div class="heading">
      <h3>Cual es su próximo paso?</h3>
      <p>Elegir si tiene cupón de descuento!</p>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="chose_area">
          <ul class="user_option">
            <li>
              <input type="checkbox">
              <label>Usar código cupón</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Usar voucher de regalo</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Estimate Shipping & Taxes</label>
            </li>
          </ul>
          <ul class="user_info">
            <li class="single_field">
              <label>Ciudad:</label>
              <select>
                <option>Santa Cruz</option>
                <option>Cochabamba</option>

              </select>

            </li>
            <li class="single_field">
              <label>Estado:</label>
              <select>
                <option>Select</option>
                <option>Cbba</option>
                <option>Andrés Ibañez</option>
              </select>

            </li>
            <li class="single_field zip-field">
              <label>Zip Code:</label>
              <input type="text">
            </li>
          </ul>
          <a class="btn btn-default update" href="">Get Quotes</a>
          <a class="btn btn-default check_out" href="">Continue</a>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="total_area">
          <ul>

            <li>Cantidad de Productos:<span>{{$cartItems->totalCantidad}}</span></li>
            <li>Precio de Envío:<span>Gratis</span></li>
            <li>Total a Cancelar: <span>{{$cartItems->totalPrecio}}</span></li>
          </ul>
            <a class="btn btn-default update" href="">Update</a>
            <a class="btn btn-default check_out" href="{{route('createOrder')}}">Check Out</a>
        </div>
      </div>
    </div>
  </div>
</section><!--/#do_action-->
@endsection
