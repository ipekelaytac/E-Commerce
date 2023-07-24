@extends('customer.layouts.master')
@section('title', 'Kategoriler')
@section('head')

    <link href="{{ asset('customer/css/listing.css') }}" rel="stylesheet">

@endsection
@section('content')

    <main>
        <div class="container margin_30">
            <div class="row">
                <aside class="col-lg-3" id="sidebar_fixed">
                    <div class="filter_col">
                        <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
{{--                        @foreach($categories as $category)--}}
{{--                        <div class="filter_type version_2">--}}
{{--                            <h4><a href="#filter-{{ $category->id }}" data-bs-toggle="collapse" class="opened">{{ $category->category_name }}</a></h4>--}}
{{--                            <div class="collapse hide" id="filter-{{ $category->id }}">--}}
{{--                                <a href="{{ route('customer.categories', $category->slug) }}" data-bs-toggle="collapse" class="opened">{{ $category->category_name }}</a>--}}
{{--                                        <ul>--}}
{{--                                            @foreach($categories as $bot_category)--}}
{{--                                                @if($category->id == $bot_category->top_id)--}}
{{--                                                <li>--}}
{{--                                            <a href="{{ route('customer.categories', $bot_category->slug) }}"><label class="container_check">{{ $bot_category->category_name }}--}}
{{--                                                </label></a></li>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                            </div>--}}

{{--                            <!-- /filter_type -->--}}
{{--                        </div>--}}
{{--                        @endforeach--}}

                            <div class="filter_type version_2">
                                <h4><a href="#filter-1" data-bs-toggle="collapse" class="opened"> Ana Kategoriler</a></h4>
                                <div class="collapse show" id="filter-1">
                                    <ul>
                                        @foreach($categories as $category)
                                                <li>
                                                    <a href="{{ route('customer.categories', $category->slug) }}"><label class="container_check">{{ $category->category_name }}
                                                        </label></a></li>
                                            @if($category->slug == $slug_categoryname)
                                                @foreach($botcategories as $botcategory)
                                                    <ul>
                                                    <li>
                                                        <a href="{{ route('customer.categories', $botcategory->slug) }}"><label class="container_check">- {{ $botcategory->category_name }}
                                                            </label></a></li></ul>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- /filter_type -->
                            </div>
                        <!-- /filter_type -->
                        <div class="filter_type version_2">
                            <h4><a href="#filter_2" data-bs-toggle="collapse" class="opened">Color</a></h4>
                            <div class="collapse show" id="filter_2">
                                <ul>
                                    <li>
                                        <label class="container_check">Blue <small>06</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Red <small>12</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Orange <small>17</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Black <small>43</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /filter_type -->
                        <div class="filter_type version_2">
                            <h4><a href="#filter_3" data-bs-toggle="collapse" class="closed">Brands</a></h4>
                            <div class="collapse" id="filter_3">
                                <ul>
                                    <li>
                                        <label class="container_check">Adidas <small>11</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Nike <small>08</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Vans <small>05</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Puma <small>18</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /filter_type -->
                        <div class="filter_type version_2">
                            <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">Price</a></h4>
                            <div class="collapse" id="filter_4">
                                <ul>
                                    <li>
                                        <label class="container_check">$0 — $50<small>11</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$50 — $100<small>08</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$100 — $150<small>05</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$150 — $200<small>18</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /filter_type -->
                        <div class="buttons">
                            <a href="#0" class="btn_1">Filter</a> <a href="#0" class="btn_1 gray">Reset</a>
                        </div>
                    </div>
                </aside>
                <!-- /col -->
                <div class="col-lg-9">
                    <div id="stick_here"></div>
                    <div class="toolbox elemento_stick add_bottom_30">
                        <div class="container">
                            <ul class="clearfix">
                                <li>
                                        @if (count($products)>0)
                                        <a href="?sırala=cok-satanlar" class="btn btn-default" style="margin:20px"><img src="/customer/img/filter-circle-dollar-solid.svg" width="20">  Çok Satanlar</a>
                                        <a href="?sırala=yeni" class="btn btn-default" style="margin-right:20px"><img src="/customer/img/arrow-up-wide-short-solid.svg" width="20">  Yeni Ürünler</a>
                                        <a href="?sırala=fiyata-gore-artan" class="btn btn-default" style="margin-right:20px"><img src="/customer/img/arrow-up-9-1-solid.svg" width="20">  Fiyata Göre Artan</a>
                                        <a href="?sırala=fiyata-gore-azalan" class="btn btn-default" style="margin-right:20px"><img src="/customer/img/arrow-down-9-1-solid.svg" width="20">  Fiyata Göre Azalan</a>
                                            @endif
                                </li>
{{--                                <li>--}}
{{--                                    <a href="#0"><i class="ti-view-grid"></i></a>--}}
{{--                                    <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#0" class="open_filters">--}}
{{--                                        <i class="ti-filter"></i><span>Filters</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                    <!-- /toolbox -->
                    @if (count($products)==0)
                        <div class="col-md-12">Bu kategoride henüz ürün bulunmamaktadır!</div>
                    @endif
                    @foreach($products as $product)
                    <div class="row row_item">
                        <div class="col-sm-4">
                            <figure>
{{--                                <span class="ribbon off">-30%</span>--}}
                                <a href="{{ route('customer.products', $product->slug) }}">
                                    <img class="img-fluid lazy"
                                         src="{{ $product->detail->product_image!=null ? asset('uploads/products/' . $product->detail->product_image) : 'customer/img/products/product_placeholder_square_medium.jpg' }}"
                                         data-src="{{ $product->detail->product_image!=null ? asset('uploads/products/' . $product->detail->product_image) : 'customer/img/products/product_placeholder_square_medium.jpg' }}" alt="">
                                </a>
{{--                                <div data-countdown="2019/05/15" class="countdown"></div>--}}
                            </figure>
                        </div>
                        <div class="col-sm-8">
                            <a href="{{ route('customer.products', $product->slug) }}">
                                <h3>{{ $product->product_name }}</h3>
                            </a>
                            <p>{{      Str::limit($product->comment,200,'...')}}</p>
                            <div class="price_box">
                                <span class="new_price">{{ $product->price }} ₺</span>
{{--                                <span class="old_price">$60.00</span>--}}
                            </div>
                            <ul>
                                <li>
                                    <form action="{{route('customer.cart.add')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <div class="btn_add_to_cart"><button type="submit"  class="btn_1">Sepete Ekle</button></div>
                                    </form>

                                </li>
                                @auth

                                <li>
                                <form id="fav" action="{{route('customer.favorite_products.add')}}" method="post">
                                    {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <a onclick="document.getElementById('fav').submit();" class="btn_1 gray tooltip-1" data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="Add to favorites"><i class="ti-heart"></i><span>Favorilere Ekle</span></a>
                                </form>
                                </li>@endauth

                            </ul>
                        </div>
                    </div>
                    <!-- /row_item -->
                    @endforeach
{{--                    <div class="pagination__wrapper">--}}
{{--                        <ul class="pagination">--}}
{{--                            <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>--}}
{{--                            <li>--}}
{{--                                <a href="#0" class="active">1</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#0">2</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#0">3</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#0">4</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="#0" class="next" title="next page">&#10095;</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>

@endsection
@section('js')

    <script src="{{ asset('customer/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('customer/js/specific_listing.js') }}"></script>
@endsection
