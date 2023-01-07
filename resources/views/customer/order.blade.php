@extends('customer.layouts.master')
@section('title', 'Sepet')
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
                        <li>Sepet</li>
                    </ul>
                </div>
                <h1>Sepet Sayfası</h1>
            </div>
            <!-- /page_header -->
            <table class="table table-striped cart-list">
                <thead>
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th colspan="2">Ürün</th>
                        <th>Tutar</th>
                        <th>Adet</th>
                        <th>Ara Toplam</th>
{{--                        @if($evaluation > 0)--}}
                            <th>Değerlendir</th>
{{--                        @endif--}}
                    </tr>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="2">
                        <div class="thumb_cart">
                            <img src="customer/img/products/product_placeholder_square_small.jpg"
                                 data-src="customer/img/products/shoes/2.jpg" class="lazy" alt="Image">
                        </div>
                        <span class="item_cart">Armor Okwahn II</span>
                    </td>
                    <td>
                        <strong class="item_cart">$30.00</strong>
                    </td>
                    <td>
                        <strong class="item_cart">3</strong>

                    </td>
                    <td>
                        <strong class="item_cart">$90.00</strong>
                    </td>
                    <td class="options ">
                        <a href="#" class="item_cart"><i class="ti-comments"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                <div class="col-sm-4 text-end">
                    <button type="button" class="btn_1 gray">Update Cart</button>
                </div>
                {{--                <div class="col-sm-8">--}}
                {{--                    <div class="apply-coupon">--}}
                {{--                        <div class="form-group">--}}
                {{--                            <div class="row g-2">--}}
                {{--                                <div class="col-md-6"><input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"></div>--}}
                {{--                                <div class="col-md-4"><button type="button" class="btn_1 outline">Apply Coupon</button></div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <!-- /cart_actions -->

        </div>
        <!-- /container -->

        <div class="box_cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <ul>
                            <li>
                                <span>Toplam Fiyat</span> $240.00
                            </li>
                            {{--                            <li>--}}
                            {{--                                <span>Kargo</span> $7.00--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <span>Total</span> $247.00--}}
                            {{--                            </li>--}}
                        </ul>
                        <a href="cart-2.html" class="btn_1 full-width cart">Sipariş Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /box_cart -->

    </main>

@endsection
@section('js')
@endsection
