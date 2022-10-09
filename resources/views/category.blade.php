@extends('layouts.master')
@section('title', 'Kategoriler')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}">Anasayfa</a></li>
            @if ($topcategories != null)
                <li>
                    <a href="{{ route('categories', $topcategories->slug) }}">
                    {{ $topcategories->category_name }}</a>
                </li>
                <li><a href="">{{ $categories->category_name }}</a></li>

            @else
            <li><a href="">{{ $categories->category_name }}</a></li>
            @endif
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $categories->category_name }}</div>
                        <div class="panel-body">
                        Toplam {{ $categories->products->count() }} ürün var.
                        @if (count($botcategories)>0)
                            <h3>Alt Kategoriler</h3>
                            <div class="list-group categories">
                                @foreach($botcategories as $botcategory)
                                    <a href="{{ route('categories', $botcategory->slug) }}" class="list-group-item">
                                        <i class="fa fa-television"></i>
                                        {{ $botcategory->category_name }}</a>
                                @endforeach
                            </div>
                        @else
                            @if ($topcategories != null)
                                <a href="{{ route('categories', $topcategories->slug) }}"
                                   class="btn btn-xs btn-block btn-primary">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    {{ $topcategories->category_name }}
                                </a>
                            @endif
                            {{ $categories->category_name }} kategorisinde başka alt kategori bulunmuyor.
                        @endif
                        </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    @if (count($products)>0)
                        Sırala
                        <a href="?sırala=coksatanlar" class="btn btn-default">Çok Satanlar</a>
                        <a href="?sırala=yeni" class="btn btn-default">Yeni Ürünler</a>
                        <a href="?sırala=fiyatagoreartan" class="btn btn-default">Fiyata Göre Artan</a>
                        <a href="?sırala=fiyatagoreazalan" class="btn btn-default">Fiyata Göre Azalan</a>
                        <hr>
                    @endif
                    <div class="row">
                        @if (count($products)==0)
                            <div class="col-md-12">Bu kategoride henüz ürün bulunmamaktadır!</div>
                        @endif
                        @foreach($products as $product)
                            <div class="col-md-3 product">
                                <a href="{{ route('products', $product->slug) }}"><img
                                        class="img-responsive" src="{{ $product->detail->product_image!=null ? asset('uploads/products/' . $product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"></a>
                                <p><a href="{{ route('products', $product->slug) }}">{{$product->product_name}}</a></p>
                                <p class="price">{{$product->price, 2}}</p>
{{--                                     @if($product->stock < 10 && $product->stock < 0)--}}
{{--                                        <p> Stokta son {{$product->stock}} ürün var.</p>--}}
{{--                                    @endif--}}
{{--                                @if($product->stock == 0)--}}
{{--                                    <p> Stokta ürün yok!</p>--}}
{{--                                @endif--}}
{{--                                <form action="{{route('cart.add')}}" method="post">--}}
{{--                                    {{ csrf_field() }}--}}
{{--                                    <input type="hidden" name="id" value="{{ $product->id }}">--}}
{{--                                    <input type="submit" class="btn btn-theme" value="Sepete Ekle">--}}
{{--                                </form>--}}
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
