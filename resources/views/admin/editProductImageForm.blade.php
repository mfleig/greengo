
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



    <h3>Current Image</h3>
    <div><img src="{{asset ('storage')}}/product_images/{{$product['imagen']}}" width="100" height="100" style="max-height:220px" ></div>

    <form action="{{ route('adminUpdateProductImage',['id' => $product->id ])}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}



        <div class="form-group">
            <label for="description">Update Image</label>
            <input type="file" class=""  name="imagen" id="imagen" placeholder="Image" value="{{$product->imagen}}" required>
        </div>

        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection
