<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->truncate();
        $id =  DB::table('kategori')->insertGetId(['kategori_ad'=>'Elektronik','slug'=>'elektronik']);
        DB::table('kategori')->insert(['kategori_ad'=>'Bilgisayar/Tablet','slug'=>'bilgisayar-tablet','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_ad'=>'Tv/Ses Sistemleri','slug'=>'tv-ses-sistem','ust_id'=>$id]);

        $id =  DB::table('kategori')->insertGetId(['kategori_ad'=>'Kitap','slug'=>'kitap']);
        DB::table('kategori')->insert(['kategori_ad'=>'Edebiyat','slug'=>'edebiyat','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_ad'=>'Bilim Kurgu','slug'=>'bilim-kurgu','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_ad'=>'Polisiye','slug'=>'polisiye','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_ad'=>'Tarih','slug'=>'tarih','ust_id'=>$id]);

        DB::table('kategori')->insert(['kategori_ad'=>'Mobilya','slug'=>'mobilya']);
        DB::table('kategori')->insert(['kategori_ad'=>'Dergi','slug'=>'dergi']);
        DB::table('kategori')->insert(['kategori_ad'=>'Dekorasyon','slug'=>'dekorasyon']);
        DB::table('kategori')->insert(['kategori_ad'=>'Kozmetik','slug'=>'kozmetik']);
        DB::table('kategori')->insert(['kategori_ad'=>'Kişisel Bakım','slug'=>'kisisel-bakim']);
        DB::table('kategori')->insert(['kategori_ad'=>'Giyim ve Moda','slug'=>'giyim-moda']);
        DB::table('kategori')->insert(['kategori_ad'=>'Anne ve Bebek','slug'=>'anne-bebek']);
        //
    }
}
