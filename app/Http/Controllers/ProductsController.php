<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Category;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    // Datos de prueba

    public function index() {

      //Datos de Prueba
      // $products = [0=>["nombre"=>'iPhone Xs', "categoria"=>"Smart Phones", "precio"=>1000],
      //              1=>["nombre"=>'Galaxy', "categoria"=>"Smart Phones", "precio"=>700],
      //              2=>["nombre"=>'Sony Bravia 32', "categoria"=>"TV", "precio"=>1800]];


      //Datos sin usar modelo
      //$products = DB::table('products')->get();

      //$products = Product::all();


      //StackoverFlow
      $products = Product::all();
    //  $categories = Category::all();

    //  return View::make('allproducts')->with('products', $products)->with('categories', $categories);

    $products = DB::table('products')
      //Fin StackOverflow


    ->join('categories', 'products.idCategory', '=', 'categories.idCategory')->get();

      return view("allproducts", compact('products'));

    }


    public function singleproduct($id) {

      $product = Product::where('id', $id)->firstorfail();

      //return view("detalleproducto", compact('products'));

      return view('detalleproducto')->with('detalleproducto', $product);
    }





    public function homeFrutas() {

      $products = DB::table('products')->where('idCategory', 1)->get();

      return view('homeFrutas', compact('products'));

    }

    public function homeVerduras() {
      $products = DB::table('products')->where('idCategory', 2)->get();
      return view('homeVerduras', compact('products'));
    }

    public function addProductToCart(Request $request, $id){


      // $request->session()->forget("cart");
      // $request->session()->flush();

      $prevCart = $request->session()->get('cart');
      $cart = new Cart($prevCart);

      $product = Product::find($id);
      $cart->addItem($id, $product);
      $request->session()->put('cart', $cart);

      //dump($cart);

      return redirect()->route("allProducts");

      //print_r('PRUEBA, añadiendo Producto nr:');
      //print_r($id);
    }

    public function showCart() {

      $cart = Session::get('cart');

      //cart no esta vacio
      if($cart) {


          return view('cartproducts', ['cartItems' => $cart]);

      //cart vacio
      } else {

          return redirect()->route("cartproducts");
      }
    }

    public function deleteItemFromCart(Request $request, $id) {

      $cart = $request->session()->get("cart");

      if (array_key_exists($id, $cart->items)) {

          unset($cart->items[$id]);
      }

        $prevCart = $request->session()->get("cart");

        $updatedCart = new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put("cart", $updatedCart);

        return redirect()->route('cartproducts');
    }







    public function createOrder(){
        $cart = Session::get('cart');

        //cart is not empty
        if($cart) {
        // dump($cart);
            $fecha = date('Y-m-d H:i:s');
            $newOrderArray = array("estado"=>"en_espera","fecha"=>$fecha,"fecha_envio"=>$fecha,"precio"=>$cart->totalPrecio);
            $created_order = DB::table("orders")->insert($newOrderArray);
            $order_id = DB::getPdo()->lastInsertId();;


            foreach ($cart->items as $cart_item){
                $item_id = $cart_item['data']['id'];
                $item_nombre = $cart_item['data']['nombre'];
                $item_precio = $cart_item['data']['precio'];
                $newItemsInCurrentOrder = array("item_id"=>$item_id,"order_id"=>$order_id,"item_nombre"=>$item_nombre,"item_precio"=>$item_precio);
                $created_order_items = DB::table("order_items")->insert($newItemsInCurrentOrder);
            }



            //delete cart
            Session::forget("cart");
            Session::flush();
            return redirect()->route("allProducts")->withsuccess("Gracias por comprar con GreenGo!");

        }else{

            return redirect()->route("allProducts");

        }
      }






        public function increaseSingleProduct(Request $request,$id){


        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id,$product);
        $request->session()->put('cart', $cart);

        //dump($cart);

        return redirect()->route("cartproducts");


    }








       public function decreaseSingleProduct(Request $request,$id){



        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        if( $cart->items[$id]['cantidad'] > 1){
                  $product = Product::find($id);
                  $cart->items[$id]['cantidad'] = $cart->items[$id]['cantidad']-1;
                  $cart->items[$id]['totalSinglePrecio'] = $cart->items[$id]['cantidad'] *  $product['precio'];
                  $cart->updatePriceAndQuantity();

                  $request->session()->put('cart', $cart);

          }



        return redirect()->route("cartproducts");


    }


    }
