@extends('layouts.admin')

@section('body')


<div class="table-responsive">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>

            <li>{!! print_r($errors->all()) !!}</li>

        </ul>
    </div>
    @endif


    <h2>Crear nuevo producto</h2>

    <form action="{{ route('adminSendCreateProductForm')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del producto" required>
        </div>
        <div class="form-group">
          <label for="description">Descripcion</label>
          <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion" required>
        </div>

        <div class="form-group">
          <label for="image">Imagen</label>
          <input type="file" class=""  name="imagen" id="imagen" required>
        </div>
        <div class="form-group">
          <label for="type">Tipo</label>
          <input type="text" class="form-control" name="tipo" id="tipo" placeholder="tipo" required>
        </div>

        <div class="form-group">
          <label for="type">Precio</label>
          <input type="text" class="form-control" name="precio" id="precio" placeholder="precio" required>
        </div>
        <div class="form-group">
          <label for="type">Stock</label>
          <input type="text" class="form-control" name="stock" id="stock" placeholder="stock" required>
        </div>
        <div class="form-group">
          <label for="type">Categoria</label>
          <select class="form-control" name="categoria_id" id="categoria_id">

            @foreach($categorias as $categoria)
            <option value="{{$categoria->id_categoria}}" >{{$categoria->nombre}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection
