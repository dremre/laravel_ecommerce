<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Emre',function (){
   return "Emre Alkan";
});

Route::get('api/v1/merhaba',function (){
   return ['mesaj'=>'Emre Alkan:)'];
});

Route::get('/urun/{urunadi}/{id?}',function ($urunadi,$id=0){
    return "Ürün adi: $urunadi /
            Ürün id : $id";
})->name('urun-detay');

Route::get('/kampanya',function (){
   return redirect()->route('urun-detay',['urunadi'=>'elma','id'=>5]);
});
