<?php

namespace App\Http\Controllers;
use Database\Seeders\UrunTableSeeder;
use Illuminate\Http\Request;
use App\Models\Urun;

class UrunController extends  Controller{
    public function index($slug_urunadi){
        $urun = Urun::where('slug',$slug_urunadi)->firstOrFail();
        return view('urun',compact('urun'));
    }

    public function ara(){
        $aranan =request()->input('aranan');
        $urunler = Urun::where('urun_ad','like',"%$aranan%")

            ->orWhere('aciklama','like',"%$aranan%")
            ->paginate(2);
        request()->flash();

        return view('arama',compact('urunler'));
    }
}
