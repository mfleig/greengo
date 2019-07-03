@extends('layouts.admin')

@section('body')


<div class="table-responsive">

    <form action="{{ route('adminUpdateProduct',['id' => $product->id ])}}" method="post">
      <form action="{{ route('adminUpdateProduct',['id' => $product->id ])}}" method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Product Name" value="{{$product->nombre}}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="description" value="{{$product->descripcion}}" required>
        </div>


        <div class="form-group">
            <label for="type">Tipo</label>
            <input type="text" class="form-control" name="tipo" id="tipo" placeholder="type" value="{{$product->tipo}}" required>
        </div>

        <div class="form-group">
            <label for="type">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio" placeholder="price" value="{{$product->precio}}" required>
        </div>

        <div class="form-group">
            <label for="type">Stock</label>
            <input type="text" class="form-control" name="stock" id="stock" placeholder="price" value="{{$product->stock}}" required>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>




@endsection
