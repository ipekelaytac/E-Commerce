@extends('customer.layouts.master')
@section('title', 'Sipariş Detay')
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
                        <li>Sipariş Detay</li>
                    </ul>
                </div>
                <h1>Siparişim</h1>
            </div>
            <!-- /page_header -->
            <table class="table table-striped cart-list">
                <thead>
                    <tr>
                        <th colspan="2">Ürün</th>
                        <th>Tutar</th>
                        <th>Adet</th>
                        <th>Ara Toplam</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->MainCart->cartproducts as $cart_product)

                        <tr>
                            <td colspan="2">
                                <a href="{{ route('customer.products',$cart_product->product->slug) }}">
                                <div class="thumb_cart">
                                    <img
                                        src="{{ $cart_product->product->detail->product_image!=null ? asset('uploads/products/' . $cart_product->product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"
                                        data-src="{{ $cart_product->product->detail->product_image!=null ? asset('uploads/products/' . $cart_product->product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"
                                        class="lazy" alt="Image">
                                </div>
                                <span class="item_cart">{{ $cart_product->product->product_name }}</span>
                                </a>
                            </td>
                            <td>
                                <strong class="item_cart">{{ $cart_product->product->price }} ₺</strong>
                            </td>
                            <td>
                                <strong class="item_cart">{{ $cart_product->number }}</strong>

                            </td>
                            <td>
                                <strong class="item_cart">{{$cart_product->price * $cart_product->number}} ₺</strong>
                            </td>
                            <td class="options ">
                                <a href="#sign-in-dialog" class="item_cart"><i class="ti-comments"></i></a>
                            </td>
{{--                            <div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor my-mfp-zoom-in mfp-ready" tabindex="-1" style="overflow: hidden auto;"><div class="mfp-container mfp-inline-holder"><div class="mfp-content"><div id="sign-in-dialog" class="zoom-anim-dialog">--}}
{{--                                            <div class="modal_header">--}}
{{--                                                <h3>Sign In</h3>--}}
{{--                                            </div>--}}
{{--                                            <form>--}}
{{--                                                <div class="sign-in-wrapper">--}}
{{--                                                    <a href="#0" class="social_bt facebook">Login with Facebook</a>--}}
{{--                                                    <a href="#0" class="social_bt google">Login with Google</a>--}}
{{--                                                    <div class="divider"><span>Or</span></div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>Email</label>--}}
{{--                                                        <input type="email" class="form-control" name="email" id="email">--}}
{{--                                                        <i class="ti-email"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>Password</label>--}}
{{--                                                        <input type="password" class="form-control" name="password" id="password" value="">--}}
{{--                                                        <i class="ti-lock"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="clearfix add_bottom_15">--}}
{{--                                                        <div class="checkboxes float-start">--}}
{{--                                                            <label class="container_check">Remember me--}}
{{--                                                                <input type="checkbox">--}}
{{--                                                                <span class="checkmark"></span>--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="float-end mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="text-center">--}}
{{--                                                        <input type="submit" value="Log In" class="btn_1 full-width">--}}
{{--                                                        Don’t have an account? <a href="account.html">Sign up</a>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="forgot_pw">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label>Please confirm login email below</label>--}}
{{--                                                            <input type="email" class="form-control" name="email_forgot" id="email_forgot">--}}
{{--                                                            <i class="ti-email"></i>--}}
{{--                                                        </div>--}}
{{--                                                        <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>--}}
{{--                                                        <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                            <!--form -->--}}
{{--                                            <button title="Close (Esc)" type="button" class="mfp-close"></button></div></div></div></div>--}}

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
