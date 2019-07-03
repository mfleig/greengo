@extends('layouts.index')


@section('center')

<div class="header-bottom"><!--header-bottom-->
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="mainmenu pull-left">
          <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="index.html" class="active">Home</a></li>
            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Productos</a></li>

                <li><a href="checkout.html">Checkout</a></li>
                <li><a href="cart.html">Carrito</a></li>
                <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>

            <li><a href="contact-us.html">Contacto</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="search_box pull-right">
          <input type="text" placeholder="Search"/>
        </div>
      </div>
    </div>

    <div class="col-sm-8">
      <div class="shop-menu pull-right">
        <ul class="nav navbar-nav">
          <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
          <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
          <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
          <li><a href="{{ route('cartproducts')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>

          @if(Auth::check())
          <li><a href="#"><i class="fa fa-lock"></i> Profile</a></li>
          @else
          <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div><!--/header-bottom-->
</header><!--/header-->

<div class="container">
  @include('alert')
</div>

<section id="slider"><!--slider-->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div id="slider-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#slider-carousel" data-slide-to="1"></li>
          <li data-target="#slider-carousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active">
            <div class="col-sm-6">
              <h1><span>Green</span>GO</h1>
              <h2>Tu salud en la puerta de la casa</h2>
              <p> Los mejores productos saludables en un sólo lugar.</p>
              <button type="button" class="btn btn-default get">Ver Productos</button>
            </div>
            <div class="col-sm-6">
              <img src="{{asset('images/organic1.jpg')}}" class="girl img-responsive" alt="" />
              <img src="{{asset('images/organiclogo.png')}}" class="pricing" alt="" />

            </div>
          </div>
          <div class="item">
            <div class="col-sm-6">
              <h1><span>Green</span>GO</h1>
              <h2>100% Orgánico</h2>
              <p>Elegimos los mejores alimentos para tu familia. </p>
              <button type="button" class="btn btn-default get">Ver Productos</button>
            </div>
            <div class="col-sm-6">
              <img src="{{asset('images/organic2.png')}}" class="girl img-responsive" alt="" />
              <img src="{{asset('images/organiclogo.png')}}" class="pricing" alt="" />

            </div>
          </div>

          <div class="item">
            <div class="col-sm-6">
              <h1><span>Green</span>GO</h1>
              <h2>La salud en tus manos</h2>
              <p> El mejor servicio, los mejores alimentos, en la puerta de tu casa! </p>
              <button type="button" class="btn btn-default get">Ver Productos</button>
            </div>
            <div class="col-sm-6">
              <img src="{{asset('images/organic3.png')}}" class="girl img-responsive" alt="" />
              <img src="{{asset('images/organiclogo.png')}}" class="pricing" alt="" />
            </div>
          </div>

        </div>

        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>

    </div>
  </div>
</div>
</section><!--/slider-->

<section>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="left-sidebar">
        <h2>Categorías</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a href=" {{ route('homeFrutas')}}">Frutas</a></h4>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a href="{{ route('homeVerduras')}}">Verduras</a></h4>
            </div>
          </div>
        </div><!--/category-products-->



        <div class="price-range"><!--price-range-->
          <h2>Rango de precio</h2>
          <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">Bs 0</b> <b class="pull-right">Bs 200</b>
          </div>
        </div><!--/price-range-->



      </div>
    </div>

    <div class="col-sm-9 padding-right">
      <div class="features_items"><!--features_items-->
        <h2 class="title text-center">OFERTAS</h2>

        @foreach ($products as $product)

        <div class="col-sm-4">
          <div class="product-image-wrapper" a href=" ">
            <div class="single-products">
                <div class="productinfo text-center">
                  <img src="{{Storage::disk('local')->url('product_images/'.$product->imagen)}}" alt="" width="200px" height="200px"/>
                  <h2>{{ $product->precio}}</h2>
                  <p>{{ $product->nombre }}</p>
                  <a href="{{ route('AddToCartProduct', ['id'=>$product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Añadir al carrito</a>
                </div>

            </div>

          </div>
        </div>

        @endforeach

          </div><!--features_items-->



          <div class="recommended_items"><!--recommended_items-->
  <h2 class="title text-center">OFERTAS DE LA SEMANA</h2>
        @foreach ($products as $product)





                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{Storage::disk('local')->url('product_images/'.$product->imagen)}}" alt="" width="200px" height="200px"/>
                        <h2>{{ $product->precio}}</h2>
                        <p>{{ $product->nombre }}</p>
                        <p>{{ $product->idCategory }}</p>





                        <a href="{{ route('AddToCartProduct', ['id'=>$product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Añadir al carrito</a>
                      </div>

                    </div>
                  </div>
                </div>





        @endforeach

    </div><!--/recommended_items-->



      <!-- <div class="category-tab">
        <div class="col-sm-12">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
            <li><a href="#kids" data-toggle="tab">Kids</a></li>
            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane fade active in" id="tshirt" >
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery1.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery2.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery3.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery4.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="blazers" >
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery4.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery3.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery2.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery1.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="sunglass" >
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery3.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery4.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery1.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery2.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="kids" >
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery1.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery2.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery3.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery4.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="poloshirt" >
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery2.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery4.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery3.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/home/gallery1.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!--/category-tab-->



    </div>
  </div>
</div>
</section>
