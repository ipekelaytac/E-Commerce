@extends('customer.layouts.master')
@section('title', 'Favoriler')
@section('head')
    <link href="{{ asset('customer/css/cart.css') }}" rel="stylesheet">

@endsection
@section('content')

    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">ANASAYFA</a></li>
                        <li>Favoriler</li>
                    </ul>
                </div>
                <h1>Favori Ürünler</h1>
            </div>
            <!-- /page_header -->
            <table class="table table-striped cart-list">
                <thead>
                <tr>
                    <th>
                        Ürün
                    </th>
                    <th>
                        Fiyat
                    </th>
                    <th>
                        İşlem
                    </th>
                    <th>

                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="thumb_cart">
                            <img src="img/products/product_placeholder_square_small.jpg"
                                 data-src="img/products/shoes/2.jpg" class="lazy" alt="Image">
                        </div>
                        <span class="item_cart">Armor Okwahn II</span>
                    </td>


                    <td>
                        <strong>$110.00</strong>
                    </td>
                    <td class="options">
                        <a href="#"><i class="ti-trash"></i></a>
                        <a href="#"><i class="ti-shopping-cart"></i></a>

                    </td>
                </tr>
                </tbody>
            </table>


            <!-- /cart_actions -->

        </div>
        <!-- /container -->


    </main>

@endsection
@section('js')
@endsection
