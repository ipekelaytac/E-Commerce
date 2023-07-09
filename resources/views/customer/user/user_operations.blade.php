@extends('customer.layouts.master')
@section('title', 'Kullanıcı İşlemleri')
@section('head')
    <link href="customer/css/account.css" rel="stylesheet">

@endsection
@section('content')

    <main class="bg_gray">

        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Anasayfa</a></li>
                        <li>Kullanıcı İşlemleri</li>
                    </ul>
                </div>
                <h1>Giriş Yap veya Üye Ol</h1>
            </div>
            <!-- /page_header -->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="client">Giriş Yap</h3>
                        <form role="form" method="POST" action="{{route('customer.user.login')}}">
                            {{ csrf_field() }}
                            <div class="form_container">
                                {{--                            <div class="row no-gutters">--}}
                                {{--                                <div class="col-lg-6 pr-lg-1">--}}
                                {{--                                    <a href="#0" class="social_bt facebook">Login with Facebook</a>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col-lg-6 pl-lg-1">--}}
                                {{--                                    <a href="#0" class="social_bt google">Login with Google</a>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                                {{--                            <div class="divider"><span>Or</span></div>--}}
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Email*">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password_in"
                                           value=""
                                           placeholder="Şifre*">
                                </div>
                                <div class="clearfix add_bottom_15">
                                    <div class="checkboxes float-start">
                                        <label class="container_check">Beni Hatırla
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="float-end"><a id="forgot" href="javascript:void(0);">Şifre Yenile?</a>
                                    </div>
                                </div>
                                <div class="text-center"><input type="submit" value="Giriş Yap"
                                                                class="btn_1 full-width">
                                </div>
                                <div id="forgot_pw">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email_forgot" id="email_forgot"
                                               placeholder="E-postanızı yazın">
                                    </div>
                                    <p>Kısa süre içinde yeni bir şifre gönderilecektir. .</p>
                                    <div class="text-center"><input type="submit" value="Şifre Yenile" class="btn_1">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- /form_container -->
                    </div>


                    <!-- /box_account -->
                    <div class="row">
                        <div class="col-md-6 d-none d-lg-block">
                            <ul class="list_ok">
                                <li>Veri Koruma</li>
                                <li>Güvenli Ödeme</li>
                                <li>7/24 Destek</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>

                    <div class="col-xl-6 col-lg-6 col-md-8">
                        <form  role="form" method="POST" action="{{ route ('customer.user.register')}}">
                            {{ csrf_field() }}
                        <div class="box_account">
                            <h3 class="new_client">Yeni Müşteri</h3> <small class="float-right pt-2">* Yeni Müşteri
                                Zorunlu
                                Alanlar</small>
                            <div class="form_container">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email_2"
                                           placeholder="Email*">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password_in_2"
                                           value="" placeholder="Şifre*">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_in_2"
                                           value="" placeholder="Yeni Şifre Tekrar*">
                                </div>
                                <hr>
                                {{--                            <div class="form-group">--}}
                                {{--                                <label class="container_radio" style="display: inline-block; margin-right: 15px;">Private--}}
                                {{--                                    <input type="radio" name="client_type" checked value="private">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                                <label class="container_radio" style="display: inline-block;">Company--}}
                                {{--                                    <input type="radio" name="client_type" value="company">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                            </div>--}}
                                 <small class="float-right pt-2">* Yeni Müşteri
                                    Zorunlu Olmayan
                                    Alanlar</small>
                                <div class="private box">
                                    <div class="row no-gutters">
                                        <div class="col-12 pr-1">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name_surname" placeholder="Ad Soyad*">
                                            </div>
                                        </div>
                                        {{--                                    <div class="col-12">--}}
                                        {{--                                        <div class="form-group">--}}
                                        {{--                                            <input type="text" class="form-control" placeholder="Full Address*">--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-12 pr-1">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address" placeholder="Adres*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-12 pr-1">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="phone" placeholder="Yerel Telefon*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-12 pr-1">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="mobile_phone" placeholder="Mobil Telefon*">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    {{--                                <div class="row no-gutters">--}}
                                    {{--                                    <div class="col-6 pr-1">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <input type="text" class="form-control" placeholder="City*">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="col-6 pl-1">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <input type="text" class="form-control" placeholder="Postal Code*">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                    {{--                                <!-- /row -->--}}

                                    {{--                                <div class="row no-gutters">--}}
                                    {{--                                    <div class="col-6 pr-1">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <div class="custom-select-form">--}}
                                    {{--                                                <select class="wide add_bottom_10" name="country" id="country">--}}
                                    {{--                                                    <option value="" selected>Country*</option>--}}
                                    {{--                                                    <option value="Europe">Europe</option>--}}
                                    {{--                                                    <option value="United states">United states</option>--}}
                                    {{--                                                    <option value="Asia">Asia</option>--}}
                                    {{--                                                </select>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="col-6 pl-1">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <input type="text" class="form-control" placeholder="Telephone *">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                    {{--                                <!-- /row -->--}}

                                </div>
                                <!-- /private -->
                                {{--                            <div class="company box" style="display: none;">--}}
                                {{--                                <div class="row no-gutters">--}}
                                {{--                                    <div class="col-12">--}}
                                {{--                                        <div class="form-group">--}}
                                {{--                                            <input type="text" class="form-control" placeholder="Company Name*">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-12">--}}
                                {{--                                        <div class="form-group">--}}
                                {{--                                            <input type="text" class="form-control" placeholder="Full Address">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <!-- /row -->--}}
                                {{--                                <div class="row no-gutters">--}}
                                {{--                                    <div class="col-6 pr-1">--}}
                                {{--                                        <div class="form-group">--}}
                                {{--                                            <input type="text" class="form-control" placeholder="City*">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-6 pl-1">--}}
                                {{--                                        <div class="form-group">--}}
                                {{--                                            <input type="text" class="form-control" placeholder="Postal Code*">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <!-- /row -->--}}
                                {{--                                <div class="row no-gutters">--}}
                                {{--                                    <div class="col-6 pr-1">--}}
                                {{--                                        <div class="form-group">--}}
                                {{--                                            <div class="custom-select-form">--}}
                                {{--                                                <select class="wide add_bottom_10" name="country" id="country_2">--}}
                                {{--                                                    <option value="" selected>Country*</option>--}}
                                {{--                                                    <option value="Europe">Europe</option>--}}
                                {{--                                                    <option value="United states">United states</option>--}}
                                {{--                                                    <option value="Asia">Asia</option>--}}
                                {{--                                                </select>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-6 pl-1">--}}
                                {{--                                        <div class="form-group">--}}
                                {{--                                            <input type="text" class="form-control" placeholder="Telephone *">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <!-- /row -->--}}
                                {{--                            </div>--}}
                                <!-- /company -->
                                <hr>
                                <div class="form-group">
                                    <label class="container_check">Okudum <a href="#0">Onaylıyorum.</a>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="text-center"><input type="submit" value="Kayıt Ol" class="btn_1 full-width">
                                </div>
                            </div>
                            <!-- /form_container -->

                        </div>
                        </form>

                        <!-- /box_account -->
                    </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>

@endsection
@section('js')
    <script src="customer/js/common_scripts.min.js"></script>
    <script src="customer/js/main.js"></script>

    <script>
        // Client type Panel
        $('input[name="client_type"]').on("click", function () {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    </script>
@endsection
