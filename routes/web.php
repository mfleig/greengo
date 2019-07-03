<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('test');
});

Route::get('/test', function () {

  $array = ['John', 'Martin', 'Susan'];
    return $array;
});


//Route::get('products/{id}', 'ProductsController@singleproduct')->name('products.singleproduct');


//youtube


Route::get('/products/{id}', 'ProductsController@singleproduct')->name('show.singleproduct');



Route::get('products', ["uses"=>"ProductsController@index", "as"=>"allProducts"]);


//Frutas
Route::get('products/frutas', ["uses"=>"ProductsController@homeFrutas", "as"=>"homeFrutas"]);

//Verduras
Route::get('products/verduras', ["uses"=>"ProductsController@homeVerduras", "as"=>"homeVerduras"]);

//aumentaar y disminuir Cantidad

Route::get('product/increaseSingleProduct/{id}', ['uses'=>'productsController@increaseSingleProduct', 'as'=>'IncreaseSingleProduct']);
Route::get('product/decreaseSingleProduct/{id}', ['uses'=>'productsController@decreaseSingleProduct', 'as'=>'DecreaseSingleProduct']);


Route::get('product/addToCart/{id}', ['uses'=>'ProductsController@addProductToCart', 'as'=>'AddToCartProduct']);

Route::get('cart', ["uses"=>"ProductsController@showCart", "as"=>"cartproducts"]);

Route::get('product/deleteItemFromCart/{id}', ['uses'=>'ProductsController@deleteItemFromCart', 'as'=>'DeleteItemFromCart']);

//autentificacion de usuario
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Panel de Administracion
Route::get('admin/products', ["uses"=>"Admin\AdminProductsController@index", "as"=>"adminDisplayProducts"]);



Route::get('admin/adminVerItems/{id}', ["uses"=>"Admin\AdminProductsController@verItems", "as"=> "adminVerItems"]);


//display edit product form
Route::get('admin/editProductForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductForm", "as"=> "adminEditProductForm"]);


//display edit product image form
Route::get('admin/editProductImageForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductImageForm", "as"=> "adminEditProductImageForm"]);


//delete product
Route::get('admin/deleteProduct/{id}', ["uses"=>"Admin\AdminProductsController@deleteProduct", "as"=> "adminDeleteProduct"]);

//update product image
Route::post('admin/updateProductImage/{id}', ["uses"=>"Admin\AdminProductsController@updateProductImage", "as"=> "adminUpdateProductImage"]);


//update product data
Route::post('admin/updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);





//create product
Route::get('admin/createProductForm', ["uses"=>"Admin\AdminProductsController@createProductForm", "as"=> "adminCreateProductForm"]);

//send new product data to database
Route::post('admin/sendCreateProductForm/', ["uses"=>"Admin\AdminProductsController@sendCreateProductForm", "as"=> "adminSendCreateProductForm"]);




//crear orden
Route::get('product/createOrder/',['uses'=>'ProductsController@createOrder','as'=>'createOrder']);





//panel ordenes

//orders control panel
Route::get('admin/ordersPanel/', ["uses" => "Admin\AdminProductsController@ordersPanel" , "as" => "ordersPanel"]);
