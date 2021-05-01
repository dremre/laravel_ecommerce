<?php
namespace App\Http\Controllers;
use App\Models\Sepeturun;
use App\Models\Urun;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Validator;
use App\Models\Sepet;
class SepetController extends Controller{

    public function  index(){
        return view('sepet');
    }

    public function ekle(){

        $urun=Urun::find(request('id'));
        $cartItem=Cart::add($urun->id,$urun->urun_ad,1,$urun->fiyati,0,['slug'=>$urun->slug]) ;

        if (auth()->check()) {
            $aktif_sepet_id = session('aktif_sepet_id');
            if (!$aktif_sepet_id) {
                $aktif_sepet = Sepet::create([
                    'kullanici_id' => auth()->id()
                ]);
                $aktif_sepet_id = $aktif_sepet->id;
                session()->put('aktif_sepet_id', $aktif_sepet_id);
            }

            SepetUrun::updateOrCreate(
                ['sepet_id' => $aktif_sepet_id, 'urun_id' => $urun->id],
                ['adet' => $cartItem->qty, 'fiyati' => $urun->fiyati, 'durum' => 'Beklemede']
            );
        }
        Cart::setGlobalTax(18);
        return redirect()->route('sepet')
            ->with('mesaj_tur','success')
            ->with('mesaj','Ürün sepete eklendi.');


    }

    public function kaldir($rowid){

        if (auth()->check()) {
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::get($rowid);
            SepetUrun::where('sepet_id', $aktif_sepet_id)->where('urun_id', $cartItem->id)->delete();
        }

        Cart::remove($rowid);

        return redirect()->route('sepet')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Ürün sepetten kaldırıldı.');
    }

    public function bosalt(){


        if (auth()->check()) {
            $aktif_sepet_id = session('aktif_sepet_id');

            SepetUrun::where('sepet_id', $aktif_sepet_id)->delete();
        }

        Cart::destroy();

        return redirect()->route('sepet')
            ->with('mesaj_tur','success')
            ->with('mesaj','Sepet tamamen boşaltıldı  ');
    }

    public function guncelle($rowid){
        $validator = Validator::make(request()->all(),[
           'adet'=>'required|numeric|between:0,5'
        ]);
        if($validator->fails()){
            session()->flash('mesaj_tur','danger');
            session()->flash('mesaj','Adet değeri 1 ile 5 arası olmalıdır');
            return response()->json(['success'=>false]);
        }
        if (auth()->check()) {
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem=Cart::get($rowid);
            if(request('adet')==0)
                SepetUrun::where('sepet_id', $aktif_sepet_id)->where('urun_id',$cartItem->id)->delete();
            else
                SepetUrun::where('sepet_id', $aktif_sepet_id)->where('urun_id',$cartItem->id)
                ->update(['adet'=>request('adet')]);
        }


        Cart::update($rowid,request('adet'));
        session()->flash('mesaj_tur','success');
        session()->flash('mesaj','Adet güncellendi');

        return response()->json(['success'=>true]);

    }





}
