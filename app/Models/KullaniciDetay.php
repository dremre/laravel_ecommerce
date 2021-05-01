<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kullanici;
class KullaniciDetay extends Model
{
    protected $table="kullanici_detay";
    public $timestamps=false;
    protected $guarded=[];

    public function kullanici(){
        return $this->belongsTo(Kullanici::class);
    }


    use HasFactory;
}
