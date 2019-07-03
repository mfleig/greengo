@extends('layouts.admin')

@section('body')


<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Editar Imagen</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
        <tr>
            <td>{{$product['id']}}</td>
             <td><img src="{{asset ('storage')}}/product_images/{{$product['imagen']}}" alt="{{asset ('storage')}}/product_images/{{$product['imagen']}}" width="100" height="100" style="max-height:220px" ></td>
           <!-- <td>  <img src="{{ Storage::url('product_images/'.$product['image'])}}"
                       alt="<?php echo Storage::url($product['imagen']); ?>" width="100" height="100" style="max-height:220px" >   </td> -->
            <td>{{$product['nombre']}}</td>
            <td>{{$product['descripcion']}}</td>
            <td>{{$product['tipo']}}</td>
            <td>{{$product['precio']}}</td>
            <td>{{$product['stock']}}</td>

            <td><a href="{{ route('adminEditProductImageForm',['id' => $product['id'] ])}}" class="btn btn-primary">Editar Imagen</a></td>
            <td><a href="{{ route('adminEditProductForm',['id' => $product['id'] ])}}" class="btn btn-primary">Editar</a></td>
            <td><a href="{{ route('adminDeleteProduct',['id' => $product['id']])}}"  class="btn btn-warning">Eliminar </a></td>



        </tr>

        @endforeach





        </tbody>
    </table>



</div>
@endsection
