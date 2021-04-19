<h1>{{config('app.name')}}</h1>
<p>Merhaba {{$kullanici->adsoyad}}, Kayıt başarılı </p>
<p>Kayıt aktivasyonu için <a href="{{config('app.url')}}/kullanici/aktiflestir/{{$kullanici->aktivasyon_anahtar}}">Tıklayın.</a>
    veya aşağıdaki bağlantıyı tarayıcınızda açın></p>
</p>{{config('app.url')}}/kullanici/aktiflestir/{{$kullanici->aktivasyon_anahtar}}</p>
