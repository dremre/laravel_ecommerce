<?php

use App\Http\Controllers\Yonetim\KullaniciKontroller;
use App\Models\Kullanici;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnasayfaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UrunController;
use App\Http\Controllers\SepetController;
use App\Http\Controllers\OdemeController;
use App\Http\Controllers\SiparisController;
use App\Http\Controllers\KullaniciController;

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

Route::group(['prefix' =>'yonetim','namespace'=>'Yonetim'], function () {
    Route::redirect('/','/yonetim/oturumac');
    Route::match(['get','post'],'/oturumac',[KullaniciKontroller::class,'oturumac'])->name('yonetim.oturumac');
    Route::get('/oturumukapat',[KullaniciKontroller::class,'oturumukapat'])->name('yonetim.oturumukapat');
    Route::group(['middleware'=>'yonetim'],function (){
        Route::get('/anasayfa',[\App\Http\Controllers\Yonetim\AnasayfaController::class,'index'])->name('yonetim.anasayfa');

        Route::group(['prefix'=>'kullanici'],function (){
            Route::match(['get','post'],'/',[KullaniciKontroller::class,'index'])->name('yonetim.kullanici');
            Route::get('/yeni',[KullaniciKontroller::class,'form'])->name('yonetim.kullanici.yeni');
            Route::get('/duzenle/{id}',[KullaniciKontroller::class,'form'])->name('yonetim.kullanici.duzenle');
            Route::get('/kaydet/{id}',[KullaniciKontroller::class,'kaydet'])->name('yonetim.kullanici.kaydet');
            Route::post('/sil/{id}',[KullaniciKontroller::class,'sil'])->name('yonetim.kullanici.sil');

        });



    });



});





Route::get('/',[AnasayfaController::class,'index'])->name('anasayfa');

Route::get('/kategori/{slug_kategoriad}',[KategoriController::class,'index'])->name('kategori');
Route::get('/urun/{slug_urunadi}',[UrunController::class,'index'])->name('urun');

Route::post('/ara',[UrunController::class,'ara'])->name('urun_ara');
Route::get('/ara',[UrunController::class,'ara'])->name('urun_ara');


Route::group(['prefix'=>'sepet'],function (){
    Route::get('/',[SepetController::class,'index'])->name('sepet');
    Route::post('/ekle',[SepetController::class,'ekle'])->name('sepet.ekle');
    Route::delete('/kaldir/{rowid}',[SepetController::class,'kaldir'])->name('sepet.kaldir');
    Route::delete('/bosalt',[SepetController::class,'bosalt'])->name('sepet.bosalt');
    Route::patch('/guncelle/{rowid}',[SepetController::class,'guncelle'])->name('sepet.guncelle');

});

Route::get('/odeme',[OdemeController::class,'index'])->name('odeme');
Route::post('/odeme',[OdemeController::class,'odemeyap'])->name('odemeyap');

Route::group(['middleware'=>'auth'],function (){
    Route::get('/siparisler',[SiparisController::class,'index'])->name('siparisler');
    Route::get('/siparisler/{id}',[SiparisController::class,'detay'])->name('siparis');
});


Route::group(['prefix'=>'kullanici'],function (){
    Route::get('/oturumac',[KullaniciController::class,'giris_form'])->name('kullanici.oturumac');
    Route::post('/oturumac',[KullaniciController::class,'giris']);
    Route::get('/kaydol',[KullaniciController::class,'kaydol_form'])->name('kullanici.kaydol');
    Route::post('/kaydol',[KullaniciController::class,'kaydol']);
    Route::get('/aktiflestir/{anahtar}',[KullaniciController::class,'aktiflestir'])->name('aktiflestir');
    Route::post('/oturumukapat',[KullaniciController::class,'oturumukapat'])->name('kullanici.oturumukapat');
});

Route::get('/test/mail',function (){
    $kullanici = Kullanici::find(1);

  return new App\Mail\KullaniciKayitMail($kullanici);
});






