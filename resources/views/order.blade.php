@extends('layouts.master')
@section('title', 'Sipariş Detay')
@section('content')
    <div class="container">
        <div class="bg-content">
            <a href="{{ route('orders') }}" class="btn btn-xs btn-primary">
                <i class="glyphicon glyphicon-arrow-left"></i> Siparişlere Dön
            </a>
            <h2>Sipariş (SP-{{$order->id}})</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>Ara Toplam</th>
                    <th>Durum</th>
                </tr>
                @foreach($order->MainCart->cartproducts as $cart_product)
                    <tr>

                        <td><img  class="img-responsive" src="{{ $cart_product->product->detail->product_image!=null ? asset('uploads/products/' . $cart_product->product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"></td>
                        <td>{{$cart_product->product->product_name}}</td>
                        <td>{{$cart_product->price}}</td>
                        <td>{{$cart_product->number}}</td>
                        <td>{{$cart_product->price * $cart_product->number}}</td>
                        <td>{{$cart_product->situation}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4">Toplam Tutar</th>
                    <th colspan="2">{{ $order->order_price }} ₺</th>
                </tr>
{{--                <tr>--}}
{{--                    <th>Toplam Tutar (KDV Dahil)</th>--}}
{{--                    <th>{{ $order->order_price * ((100+config('cart.tax'))/100) }} ₺</th>--}}
{{--                </tr>--}}
                <tr>
                    <th colspan="4">Sipariş Durumu</th>
                    <th colspan="2">{{ $order->situation }}</th>
                </tr>

            </table>
        </div>
    </div>

@endsection
