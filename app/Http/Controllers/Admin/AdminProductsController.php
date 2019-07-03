<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Categoria;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller
{
    //mostrar productos al admin
    public function index() {
      $products = Product::all();
      return view("admin.displayProducts", ['products'=>$products]);
    }


    //display create product form
    public function createProductForm(){
      $categorias = Categoria::all();
        return view("admin.createProductForm", compact('categorias'));

        
    }


    //store new product to database
    public function sendCreateProductForm(Request $request){


        $nombre =  $request->input('nombre');
        $descripcion =  $request->input('descripcion');
        $tipo = $request->input('tipo');
        $precio = $request->input('precio');
        $stock = $request->input('stock');
        $categoria_id = $request->input('categoria_id');







        Validator::make($request->all(),['imagen'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        $ext =  $request->file("imagen")->getClientOriginalExtension();
        $stringImageReFormat = str_replace(" ","",$request->input('nombre'));

        $imageName = $stringImageReFormat.".".$ext; //blackdress.jpg
        $imageEncoded = File::get($request->imagen);
        Storage::disk('local')->put('public/product_images/'.$imageName, $imageEncoded);

        $newProductArray = array("nombre"=>$nombre, "descripcion"=> $descripcion,"imagen"=> $imageName,"tipo"=>$tipo,"precio"=>$precio,"stock"=>$stock);

        $created = DB::table("products")->insert($newProductArray);


        if($created){
            return redirect()->route("adminDisplayProducts");
        }else{
           return "Product was not Created";

        }

    }



    //display edit product form
    public function editProductForm($id){
        $product = Product::find($id);
         return view('admin.editProductForm',['product'=>$product]);

    }


    //display edit product image form
    public function editProductImageForm($id){
        $product = Product::find($id);
        return view('admin.editProductImageForm',['product'=>$product]);
    }


    //update product Image
    public function updateProductImage(Request $request,$id){


        Validator::make($request->all(),['imagen'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();


        if($request->hasFile("imagen")){

            $product = Product::find($id);
          $exists = Storage::disk('local')->exists("public/product_images/".$product->imagen);

          //delete old image
          if($exists){
             Storage::delete('public/product_images/'.$product->imagen);

          }

          //upload new image
            $ext = $request->file('imagen')->getClientOriginalExtension(); //jpg

            $request->imagen->storeAs("public/product_images/",$product->imagen);

            $arrayToUpdate = array('imagen'=>$product->imagen);
            DB::table('products')->where('id',$id)->update($arrayToUpdate);


            return redirect()->route("adminDisplayProducts");

        }else{

           $error = "NO Image was Selected";
           return $error;

        }
}


//update product fields (name,description....)
public function updateProduct(Request $request,$id){

   $nombre =  $request->input('nombre');
   $descripcion =  $request->input('descripcion');
   $tipo = $request->input('tipo');
   $precio = $request->input('precio');
   $stock = $request->input('stock');

   $updateArray = array("nombre"=>$nombre, "descripcion"=> $descripcion,"tipo"=>$tipo,"precio"=>$precio,"stock"=>$stock);

    DB::table('products')->where('id',$id)->update($updateArray);

    return redirect()->route("adminDisplayProducts");

}



//delete product
public function deleteProduct($id){

    $product = Product::find($id);

  $exists =  Storage::disk("local")->exists("public/product_images/".$product->imagen);

  //if old image exists
  if($exists){
      //delete it
      Storage::delete('public/product_images/'.$product->imagen);
  }


  Product::destroy($id);

  return redirect()->route("adminDisplayProducts");

}






public function ordersPanel(){

          $orders = DB::table('orders')->paginate(10);
          //print_r($orders);
          return view('admin.ordersPanel', ["orders" => $orders]);


        }

}
