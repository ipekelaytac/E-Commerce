@extends('customer.layouts.master')
@section('title', 'Siparişer')
@section('head')
    <link href="{{ asset('customer/css/cart.css') }}" rel="stylesheet">
@endsection
@section('content')

    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Anasayfa</a></li>
                        <li>Siparişler</li>
                    </ul>
                </div>
                <h1>Siparişler Sayfası</h1>
            </div>
            <!-- /page_header -->
            <table class="table table-striped cart-list">
                <thead>
                <tr>
                    <th>Sipariş Kodu</th>
                    <th>Toplam Ürün</th>
                    <th>Tutar</th>
                    <th>Durum</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)

                    <tr>
                    <td>
                        <span>SP-{{ $order->id }}</span>
                    </td>
                    <td>
                        <strong>{{ $order->order_price * ((100+config('cart.tax'))/100) }} ₺</strong>
                    </td>
                    <td>
                        <strong>{{ $order->MainCart->cartproductnumber() }}/strong>
                    </td>
                    <td>
                        <strong>{{ $order->situation }}</strong>
                    </td>
                    <td class="options">
                        <a href="{{ route('customer.order',$order->id) }}"><i class="ti-info-alt"></i></a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>


        </div>
        <!-- /container -->


    </main>

@endsection
@section('js')
@endsection
