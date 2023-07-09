@extends('customer.layouts.master')
@section('title', 'Sepet')
@section('head')
    <link href="{{ asset('customer/css/cart.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('customer.layouts.partials.alert')

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
                <tr>
                    <th>
                        Ürün
                    </th>
                    <th>
                        Fiyat
                    </th>
                    <th>
                        Adet
                    </th>
                    <th>
                        Toplam Fiyat
                    </th>
                    <th>

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach(Cart::content() as $productCartItem)

                    <tr>
                        <td>
                            <div class="thumb_cart">
                                <img
                                    src="{{ $productCartItem->options->product_image!=null ? asset('uploads/products/' . $productCartItem->options->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"
                                    data-src="{{ $productCartItem->options->product_image!=null ? asset('uploads/products/' . $productCartItem->options->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"
                                    class="lazy" alt="Image">
                            </div>
                            <span class="item_cart">{{ $productCartItem->product_name }}</span>
                        </td>
                        <td>
                            <strong>{{$productCartItem->price}} ₺</strong>
                        </td>
                        <td>
{{--                            <a href="#" class="btn btn-xs btn-default product-reduce-the-amount"--}}
{{--                               data-id="{{ $productCartItem->rowId}}"--}}
{{--                               data-number="{{ $productCartItem->qty-1 }}">-</a>--}}
{{--                            <span style="padding: 10px 20px">{{$productCartItem->qty}}</span>--}}
{{--                            <a href="#" class="btn btn-xs btn-default product-increase-the-amount"--}}
{{--                               data-id="{{ $productCartItem->rowId}}"--}}
{{--                               data-number="{{ $productCartItem->qty+1 }}">+</a>--}}

                                                    <div class="numbers-row">
                                                        <input type="text" value="{{$productCartItem->qty}}" id="quantity_1" class="qty2" name="quantity_1">
                                                        <a href="#"  data-id="{{ $productCartItem->rowId}}"
                                                           data-number="{{ $productCartItem->qty+1 }}" class="inc button_inc">+</a>
                                                        <a href="#"  data-id="{{ $productCartItem->rowId}}"
                                                           data-number="{{ $productCartItem->qty-1 }}" class="dec button_inc">-</a>
                                                    </div>
                        </td>
                        <td>
                            <strong>{{$productCartItem->subtotal}} ₺</strong>
                        </td>
                        <td class="options">

                        <form id="del" action="{{ route('customer.cart.delete',$productCartItem->rowId) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a class="action"onclick="document.getElementById('del').submit();"><i class="ti-trash"></i></a>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

{{--            <div class="row add_top_30 flex-sm-row-reverse cart_actions">--}}
{{--                <div class="col-sm-4 text-end">--}}
{{--                    <button type="button" class="btn_1 gray">Update Cart</button>--}}
{{--                </div>--}}
{{--                --}}{{--                <div class="col-sm-8">--}}
{{--                --}}{{--                    <div class="apply-coupon">--}}
{{--                --}}{{--                        <div class="form-group">--}}
{{--                --}}{{--                            <div class="row g-2">--}}
{{--                --}}{{--                                <div class="col-md-6"><input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"></div>--}}
{{--                --}}{{--                                <div class="col-md-4"><button type="button" class="btn_1 outline">Apply Coupon</button></div>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                        </div>--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /cart_actions -->--}}

        </div>
        <!-- /container -->

        <div class="box_cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <ul>
                            <li>
                                <span>Toplam Fiyat</span> {{Cart::subtotal()}} ₺
                            </li>
                            {{--                            <li>--}}
                            {{--                                <span>Kargo</span> $7.00--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <span>Total</span> $247.00--}}
                            {{--                            </li>--}}
                        </ul>
                        <a href="{{route('customer.payment')}}" class="btn_1 full-width cart">Sipariş Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /box_cart -->

    </main>

@endsection
@section('js')
    <script>
        $(function () {
            $('.product-increase-the-amount,.product-reduce-the-amount').on('click', function () {
                var id = $(this).attr('data-id');
                var number = $(this).attr('data-number');
                $.ajax({
                    type: 'PATCH',
                    url: '{{ url('sepet/guncelle') }}/' + id,
                    data: {number: number},
                    success: function (result) {
                        window.location.href = '{{route('customer.cart')}}';
                    }
                });
            });
        });
    </script>
@endsection
