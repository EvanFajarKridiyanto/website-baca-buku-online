<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LamanController;
use App\Http\Controllers\GapressController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TampilController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\VidioController;
use App\Http\Controllers\DetailVidioController;
use App\Http\Controllers\MenutampilController;
use App\Http\Controllers\KomentarController;
use Illuminate\Support\Facades\Route;



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
// 127.0.0.1:8000/==>view welcome
//Route::get('/', function () {
   // return view('welcome');
//});

          //  // 127.0.0.1:8000/pembaca ==> <h1>kulo pembaca</h1>
           // Route::get('/pembaca', function () {
                //     return '<h1>kulo pembaca</h1>';
           // });

           // // 127.0.0.1:8000/pembaca/1 ==> <h1>kulo pembaca ke 1</h1>
             //    Route::get('/pembaca/{id}', function ($id) {
                  //   return "<h1>kulo pembaca ke $id</h1>";
               //  })->where ('id', '[0-9]+');


              //   Route::get('/pembaca/{id}/{nama}', function ($id, $nama) {
                  //   return "<h1>kulo pembaca ke $id dengan nama $nama</h1>";
               //  })->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);

         //->middleware(['isLogin']);
         //->middleware('isTamu');
               
                                //data 
                                Route::resource('buku',BukuController::class)->middleware(['admin']);

               //login 
               Route::get('/',[LoginController::class,'index'])->middleware('isTamu');
               Route::post('/',[LoginController::class,'login'])->middleware('isTamu');
               Route::get('/login/logout',[LoginController::class,'logout']);

               //awal
               // Route::get('/',[LamanController::class,'index']);

               //register
               Route::get('/login/register',[LoginController::class,'register'])->middleware('isTamu');
               Route::post('/login/create',[LoginController::class,'create'])->middleware('isTamu');




               //gapress
               Route::resource('gapress',GapressController::class);
               
               //contac
               Route::get('/rekomendasi',[ContacController::class,'index']);
               Route::get('/rekomendasi/about',[ContacController::class,'about']);

               //detail
               Route::get('/detail/{id}',[DetailController::class,'index'])->middleware('isLogin');


               //detail halaman
               Route::get('/read/{id}',[ReadController::class,'index'])->middleware('isLogin');




               //cart
               Route::post('/add_to_cart',[BukuController::class,'cart'])->name('addtocart');

               //cartpage
               Route::get('cartlist',[BukuController::class,'cartpage'])->name('cartlist');
               Route::get('/hapuscart/{id}',[BukuController::class,'hapuscart']);


               //karya
               Route::resource('karya',KaryaController::class)->middleware('isLogin');
               

                    //Category
                    Route::resource('categories',CategoryController::class)->middleware('admin');
               
               
               //Category tampil 
               Route::get('/tampil',[TampilController::class,'index'])->middleware(['admin']);
               
               //Halaman
               Route::resource('halaman', HalamanController::class)->middleware(['isLogin']);
               
               //halaman tampil
               Route::get('/menu',[MenutampilController::class,'index'])->middleware('isLogin');



                 //user
                
                 Route::get('/user',[UserController::class,'index'])->middleware('isLogin');
                
          

                 Route::resource('vidio',VidioController::class)->middleware('isLogin');


               //   Route::resource('komen',KomentarController::class)->middleware(['isLogin']);


               //detailvidio
               Route::get('/detailvidio/{id}',[DetailVidioController::class,'index'])->middleware('isLogin');
               Route::post('/detailvidio/{id}',[DetailVidioController::class,'postkomentar'])->middleware('isLogin');
               // Route::get('/hapuscart/{id}',[BukuController::class,'hapuscart']);

               // Route::get('/detailvidio/{id}',[DetailVidioController::class,'komentartampil'])->name('komentartampil');