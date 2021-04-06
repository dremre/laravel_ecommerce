<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()


    {

        $isim ="Emre";
        $soyisim = "Alkan";
        //return  view('homepage',compact('isim','soyisim'));
       // return view('homepage', ['isim' => 'Emre']);
        return view('homepage')->with(['isim'=>$isim,'soyisim'=>$soyisim]);
    }
    //
}
