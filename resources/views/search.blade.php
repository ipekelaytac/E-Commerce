@extends('layouts.master')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('index')}}"></a></li>
        <li class="active">Arama Sonucu</li>
        </ol>
        <div class="products bg-content">
            <div class="row">
                @if( count($products)==0)
                <div class="col-md-12 text-center">
                    Bir ürün bulunamadı!
                </div>
                @endif
                @foreach($products as $product)
                <div class="col-md-3 product">
                    <a href="{{ route('products',$product->slug) }}">
                        <img  class="img-responsive" src="{{ $product->detail->product_image!=null ? asset('uploads/products/' . $product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}" alt="{{$product->product_name}}">
                    </a>
                    <p>
                        <a href="{{route('products',$product->slug)}}">
                            {{$product->product_name}}
                        </a>
                    </p>
                    <p class="price">{{$product->price,2}} ₺</p>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
