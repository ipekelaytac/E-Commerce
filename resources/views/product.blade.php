@extends('layouts.master')
@section('title', $product->product_name)
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}">Anasayfa</a></li>

            @foreach($categories as $category)
                <li><a href="{{ route('categories', $category->slug) }}">{{ $category->category_name }}</a></li>
            @endforeach
            <li class="active">{{$product->product_name}}</li>
        </ol>
        @include('layouts.partials.alert')

        <div class="bg-content">
            <div class="row">
                <div class="col-md-5">
                    <img  class="img-responsive" src="{{ $product->detail->product_image!=null ? asset('uploads/products/' . $product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}">
                    <hr>
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="https://via.placeholder.com/60?text=UrunResmi"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="https://via.placeholder.com/60?text=UrunResmi"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="https://via.placeholder.com/60?text=UrunResmi"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h1>{{$product->product_name}}</h1>
                    <p class="price">{{$product->price,2}} ₺</p>
                    @if($product->stock < 10 && $product->stock > 0)
                        <p> Stokta son {{$product->stock}} ürün var.</p>
                    @endif
                    @if($product->stock == 0)
                        <p> Stokta ürün yok!</p>
                        <form action="{{route('cart.add')}}" method="post">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-theme" value="Sepete Ekle" disabled>
                        </form>
                    @endif
                    @if($product->stock > 0)
                    <form action="{{route('cart.add')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="submit" class="btn btn-theme" value="Sepete Ekle">
                    </form>
                        @endif
                    <form action="{{route('favorite_products.add')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="submit" class="btn btn-theme" value="fav Ekle">
                    </form>
                </div>
            </div>

            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#t1" data-toggle="tab">Ürün Açıklaması</a></li>
                    <li role="presentation"><a href="#t2" data-toggle="tab">Yorumlar</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="t1">{{$product->comment}}</div>
                    <div role="tabpanel" class="tab-pane" id="t2">Henüz yorum yapılmadı.</div>
                </div>
            </div>

        </div>
    </div>
@endsection
