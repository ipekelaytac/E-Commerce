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
                    <th>İncele</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <span>#23</span>
                    </td>
                    <td>
                        <strong>10</strong>
                    </td>
                    <td>
                        <strong>$140.00</strong>
                    </td>
                    <td>
                        <strong>Sipariş Tamamlandı.</strong>
                    </td>
                    <td class="options">
                        <a href="#"><i class="ti-info"></i></a>
                    </td>
                </tr>

                </tbody>
            </table>


        </div>
        <!-- /container -->


    </main>

@endsection
@section('js')
@endsection
