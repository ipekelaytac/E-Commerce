@extends('customer.layouts.master')
@section('title', 'Anasayfa')
@section('head')

@endsection
@section('content')



@foreach($api as $ap)
    <p>{{ $ap->Isim }}</p>
@endforeach
    <main>
        <div id="carousel-home">
            <div class="owl-carousel owl-theme">
                @foreach($products_slider as $index => $product)

                <div class="owl-slide cover"
                     style="background-image: url(/customer/img/slides/slide_home_2.jpg);">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-end">
                                <div class="col-lg-6 static">
                                    <div class="slide-text text-end white">
                                        <h2 class="owl-slide-animated owl-slide-title">{{ $product->product->product_name}}
                                        </h2>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div id="icon_drag_mobile"></div>
        </div>
        <!--/carousel-->
        @include('customer.layouts.partials.alert')
        @include('customer.layouts.partials.errors')

        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Öne Çıkan</h2>
                <span>Ürünler</span>
                <p>Öne Çıkan Ürünlerimiz</p>
            </div>
            <div class="row small-gutters">
                @foreach($products_featured as $product)

                <div class="col-6 col-md-4 col-xl-3">
                    <div class="grid_item">
                        <figure>
                            <a href="{{ route('customer.products', $product->product->slug) }}">
                                <img class="img-fluid lazy"
                                     src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'customer/img/products/product_placeholder_square_medium.jpg' }}"
                                     data-src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'customer/img/products/product_placeholder_square_medium.jpg' }}" alt="">
                            </a>
                        </figure>
{{--                        <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i--}}
{{--                                class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>--}}
{{--                        </div>--}}
                        <a href="{{ route('customer.products', $product->product->slug) }}">
                            <h3>{{ $product->product->product_name }}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">{{ $product->product->price }}₺</span>
                        </div>
{{--                        <ul>--}}
{{--                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"--}}
{{--                                   title="Add to favorites"><i class="ti-heart"></i><span>Favorilere Ekle</span></a>--}}
{{--                            </li>--}}
{{--                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"--}}
{{--                                   title="Add to cart"><i class="ti-shopping-cart"></i><span>Sepete Ekle</span></a></li>--}}
{{--                        </ul>--}}
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /col -->
                @endforeach

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->


        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Çok Satan</h2>
                <span>Ürünler</span>
                <p>En Çok Satan Ürünlerimiz</p>
            </div>
            <div class="row small-gutters">
                @foreach($products_lots_selling as $product)

                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="grid_item">
                            <figure>
                                <a href="{{ route('customer.products', $product->product->slug) }}">
                                    <img class="img-fluid lazy"
                                         data-src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'customer/img/products/product_placeholder_square_medium.jpg' }}" alt="">
                                </a>
                            </figure>
                            {{--                        <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i--}}
                            {{--                                class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>--}}
                            {{--                        </div>--}}
                            <a href="{{ route('customer.products', $product->product->slug) }}">
                                <h3>{{ $product->product->product_name }}</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">{{ $product->product->price }}₺</span>
                            </div>
                        </div>
                        <!-- /grid_item -->
                    </div>
                    <!-- /col -->
                @endforeach
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>İndirimli</h2>
                <span>Ürünler</span>
                <p>İndirimli Ürünlerimiz</p>
            </div>
            <div class="owl-carousel owl-theme products_carousel">
                @foreach($products_discount as $product)

                <div class="item">
                    <div class="grid_item">
{{--                        <span class="ribbon off">-30%</span>--}}
                        <figure>
                            <a href="{{ route('customer.products', $product->product->slug) }}">
                                <img class="owl-lazy"
                                     src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'customer/img/products/product_placeholder_square_medium.jpg' }}"
                                     data-src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'customer/img/products/product_placeholder_square_medium.jpg' }}" alt="">
                            </a>
                        </figure>

                        <a href="{{ route('customer.products', $product->product->slug) }}">
                            <h3>{{ $product->product->product_name }}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">{{ $product->product->price }}₺</span>
                        </div>
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /item -->
                @endforeach

            </div>
            <!-- /products_carousel -->
        </div>
        <!-- /container -->

        <div class="bg_gray">
            <div class="container margin_30">
                <div id="brands" class="owl-carousel owl-theme">
                    @foreach($brands as $brand)
                    <div class="item">
                        <a href="#"><img src="{{ $brand!=null ? asset('uploads/brands/' . $brand->brand_image) : 'customer/img/brands/placeholder_brands.png' }}"
                                          data-src="{{ $brand!=null ? asset('uploads/brands/' . $brand->brand_image) : 'customer/img/brands/placeholder_brands.png' }}" alt=""
                                          class="owl-lazy"></a>
                    </div><!-- /item -->
                    @endforeach
                </div><!-- /carousel -->
            </div><!-- /container -->
        </div>
        <!-- /bg_gray -->

        <!-- /container -->
    </main>
    <!-- /main -->

@endsection
@section('js')
    <script src="{{ asset('customer/js/carousel-home.min.js') }}"></script>
@endsection

