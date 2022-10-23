@extends('layouts.master')
@section('title', 'Anasayfa')
@section('content')

    @include('layouts.partials.alert')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($categories as $category)
                            <a href="{{ route('categories', $category->slug) }}" class="list-group-item"><i
                                    class="fa fa-television"></i>
                                {{ $category->category_name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @if (count($products_slider)==0)
                            <div class="col-md-12">Sliderda henüz ürün bulunmamaktadır!</div>
                        @endif
                        @for($i=0;$i<count($products_slider);$i++)
                            <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}"
                                class="{{ $i == 0 ? 'active' : '' }}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($products_slider as $index => $product)
                            <a href="{{ route('products', $product->product->slug) }}"
                               class="item {{ $index == 0 ? 'active' : '' }}">
                                <img class="img-responsive"
                                     src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"
                                     class="img-responsive" style="min-width: 100%;">
                                <div class="carousel-caption">
                                    {{ $product->product->product_name}}
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün Fırsatı</div>
                    @if (count($product_opportunity_of_the_day)==0)
                        <div class="col-md-12">Günün fırsatında henüz ürün bulunmamaktadır!</div>
                    @endif
                    @foreach($product_opportunity_of_the_day as $product)
                        <div class="panel-body">
                            <a href="{{ route('products', $product->product->slug) }}">
                                <img class="img-responsive"
                                     src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"
                                     style="min-width: 100%;">
                                {{ $product->product->product_name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($products_featured as $product)
                            <div class="col-md-3 product">
                                <a href="{{ route('products', $product->product->slug) }}">
                                    <img class="img-responsive"
                                         src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}">
                                </a>
                                <p>
                                    <a href="{{ route('products', $product->product->slug) }}">{{ $product->product->product_name }}</a>
                                </p>
                                <p class="price">{{ round($product->product->price, 2) }} ₺</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($products_lots_selling as $product)
                            <div class="col-md-3 product">
                                <a href="{{ route('products', $product->product->slug) }}">
                                    <img class="img-responsive"
                                         src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}">
                                </a>
                                <p>
                                    <a href="{{ route('products', $product->product->slug) }}">{{ $product->product->product_name }}</a>
                                </p>
                                <p class="price">{{ round($product->product->price, 2) }} ₺</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirimli Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($products_discount as $product)
                            <div class="col-md-3 product">
                                <a href="{{ route('products', $product->product->slug) }}">
                                    <img class="img-responsive"
                                         src="{{ $product->product_image!=null ? asset('uploads/products/' . $product->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}">
                                </a>
                                <p>
                                    <a href="{{ route('products', $product->product->slug) }}">{{ $product->product->product_name }}</a>
                                </p>
                                <p class="price">{{ round($product->product->price, 2) }} ₺</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

