@extends('layouts.admin')

@section('body')


<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>



  <style>

                  /* The payment window */
                .payment-window {
                  display: none; /* Hidden by default */
                  position: fixed; /* Stay in place */
                  z-index: 1; /* Sit on top */
                  padding-top: 100px; /* Location of the box */
                  left: 0;
                  top: 0;
                  width: 100%; /* Full width */
                  height: 100%; /* Full height */
                  overflow: auto; /* Enable scroll if needed */
                  background-color: rgb(0,0,0); /* Fallback color */
                  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                }

                /* payment window content */
                .payment-window-content {
                  background-color: #fefefe;
                  margin: auto;
                  padding: 30px;
                  border: 1px solid #888;
                  width: 45%;
                }

                /*  payment window close button */
                .payment-window-close {
                  color: #aaaaaa;
                  float:right;
                  margin-left:20px;
                  font-size: 28px;
                  font-weight: bold;
                }


                .payment-window-close:hover,
                .payment-window-close:focus {
                  color: #aaaaaa;
                  text-decoration: none;
                  cursor: pointer;
                }



     </style>


<h1>Pedidos</h1>

@if(session('orderDeletionStatus'))
<div class="alert alert-danger"> {{session('orderDeletionStatus')}} </div>
@endif



<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#order_id</th>
            <th>Fecha</th>
            <th>Fecha Envio</th>
            <th>Precio</th>
            <th>Estado</th>

        </tr>
        </thead>
        <tbody>

        @foreach($orders as $order)
        <tr>
            <td>{{$order->order_id}}</td>

            <td>{{$order->fecha}}</td>
            <td>{{$order->fecha_envio}}</td>
            <td>{{$order->precio}}</td>
            <td>{{$order->estado}}</td>
            <td><a href="{{ route('adminVerItems',['id' => $orders['order_id'] ])}}" class="btn btn-primary">Ver Items</a></td>



        </tr>

        @endforeach





        </tbody>
    </table>






        <!-- The payment window -->
        <div id="my-payment-window" class="payment-window">

          <!-- status content -->
          <div class="payment-window-content">
            <span class="payment-window-close">&times;</span>
            <h2>Payment Info</h2>
            <p>Loading..</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>

          </div>

        </div>




    {{$orders->links()}}

</div>




<script>








</script>





@endsection
