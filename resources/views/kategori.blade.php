@extends('layouts.master')
@section('title',$kategori->kategori_ad)
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
            <li><a href="#">Kategori</a></li>
            <li class="active">{{$kategori->kategori_ad}}</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$kategori->kategori_ad}}</div>
                    <div class="panel-body">
                        <h3>Alt Kategoriler</h3>
                        <div class="list-group categories">
                            @foreach($alt_kategoriler as $alt_kategori)
                            <a href="{{route('kategori',$alt_kategori->slug)}}" class="list-group-item"><i class="fa fa-arrow-circle-right"></i>{{$alt_kategori->kategori_ad}}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    <div class="row">
                        @if(count($urunler)>0)
                            Sırala
                            <a href="?order=coksatanlar" class="btn btn-default">Çok Satanlar</a>
                            <a href="?order=yeni" class="btn btn-default">Yeni Ürünler</a>
                            <hr>

                        @endif
                        @if(count($urunler)==0)
                            <div class="col-md-12">Bu kategoride henüz ürün yok :(</div>
                        @endif
                        @foreach($urunler as $urun)
                        <div class="col-md-3 product">
                            <a href="{{route('urun',$urun->slug)}}"><img src="https://via.placeholder.com/400?text=UrunResmi"></a>
                            <p><a href="{{route('urun',$urun->slug)}}">{{$urun->urun_ad}}</a></p>
                            <p class="price">{{$urun->fiyati}} ₺</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
                        @endforeach

                    </div>
                    {{ request()->has('order') ? $urunler->appends(['order',request('order')])->links(): $urunler->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
