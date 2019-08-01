<?php
use Gloudemans\Shoppingcart\Facades\Cart;
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
    return view('welcome');
});

//main page
Route::get('/cursor','CursorController@index')->name('Cursor');
Route::get('/detail/{pid}','CursorController@show')->name('detail');
//shop page
Route::get('/shop','CursorController@shop')->name('shoppage');


//Cart
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.store');
Route::delete('/cart/{product}','CartController@destroy')->name('cart.destory');
//payment
Route::get('/pay/check','CartController@getcheckout')->name('pay.checkoutform');
Route::post('pay/checking','CartController@postcheckout')->name('pay.checking');
Route::get('/pay/checked','CartController@getchecked')->name('pay.orderthank');

Route::get('/cart/update','CartController@update')->name('cart.update');
//////4
//category
Route::get('/cursor/nonno','CategoryController@getnonno')->name('cate.nonno');
Route::get('/cursor/mensnonno','CategoryController@getmensnonno')->name('cate.mensnonno');
Route::get('/cursor/anan','CategoryController@getanan')->name('cate.anan');
Route::get('/cursor/seventeen','CategoryController@getseventeen')->name('cate.seventeen');
Route::get('/cursor/jelly','CategoryController@getjelly')->name('cate.jelly');
Route::get('/cursor/leane','CategoryController@getleane')->name('cate.leane');
Route::get('/cursor/nylon','CategoryController@getnylon')->name('cate.nylon');


//users -> signup
Route::get('/signup','UserController@getsignup')->name('user.signup');
Route::post('/signup','UserController@postsignup')->name('user.postsignup');
//user -> sign in
Route::get('/signin','UserController@getsignin')->name('user.signin');
Route::post('/signin','UserController@postsignin')->name('user.postsignin');
//LOGOUT profile
Route::get('/userlogout','UserController@logout')->name('userlogout');
//profile
Route::get('/user/profile','UserController@getprofile')->name('user.uprofile');
Route::get('/user/profile/product/{id}','UserController@getprofileProduct')->name('user.udetail');
Route::get('/user/profile/update','UserController@getprofileupdate')->name('user.profileupdate');
Route::post('/user/profile/updating','UserController@update')->name('user.update');
//Contact
Route::post('/cursor/contact','ContactController@storeCursor')->name('user.contact');

Auth::routes();


//ADMIN
Route::get('/admin','AdminController@index')->name('admin');
ROUTE::post('/admin','AdminController@login')->name('adminid.check');
//LOGOUT
ROUTE::get('/logout','AdminController@logout')->name('logout');
//ADMIN CRUD in
Route::get('/adminPage','AdminController@index2')->name('adminpage');
//admin product crud
//product page open
Route::get('uploadPage','ProductController@create')->name('upload');
//product CRUD
//product list
Route::get('/list','ProductController@index')->name('product.list');
//product create
Route::post('upload','ProductController@store')->name('image.upload.product');
//product deatil show
Route::get('/show/{pid}','ProductController@show')->name('product.show');
//product Update form
Route::get('/update/{pid}','ProductController@edit')->name('product.update');
//product Updating
Route::post('/update/{pid}','ProductController@update')->name('updating.product');
//product delete
Route::get('delete/{pid}','ProductController@destory')->name('product.delete');

//admin orders
Route::get('/admin/orders','OrderController@index')->name('admin.orders');
Route::get('/admin/orders/deatil/{id}','OrderController@show')->name('admin.detail');

//admin Contact
Route::get('/admin/contacts','ContactController@index')->name('admin.contact');
//admin Product_Qty
Route::get('/admin/Product_Qty','OrderController@qty')->name('admin.qty');

Auth::routes();
