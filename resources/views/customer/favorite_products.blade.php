@extends('customer.layouts.master')
@section('title', 'Favoriler')
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
                        <li><a href="#">ANASAYFA</a></li>
                        <li>Favoriler</li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between">
                <h1>Favori Ürünler</h1>
                <h6 class=""><a href="{{ route('customer.collection') }}">Koleksiyonlarım</a></h6>
                </div>
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
                @foreach($favorite_products as $favorite_product)
                <tr>

                    <td>
                        <a href="{{ route('customer.products',$favorite_product->product->slug) }}">

                        <div class="thumb_cart">
                            <img src="{{ $favorite_product->product->detail->product_image!=null ? asset('uploads/products/' . $favorite_product->product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"
                                 data-src="{{ $favorite_product->product->detail->product_image!=null ? asset('uploads/products/' . $favorite_product->product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}" class="lazy" alt="Image">
                        </div>
                        <span class="item_cart">{{ $favorite_product->product->product_name }}</span>
                        </a>
                    </td>


                    <td>
                        <strong>{{ $favorite_product->product->price }} ₺</strong>
                    </td>
                    <td class="options">
                        <a href="{{ route('customer.favorite_products.delete',$favorite_product->id ) }}"><i class="ti-trash"></i></a>
                        <a onclick="document.getElementById('fav').submit();"><i class="ti-shopping-cart"></i></a>

                        <form id="fav" action="{{route('customer.favorite_products.add')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $favorite_product->product->id }}">

                        </form>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <!-- /cart_actions -->

        </div>
        <!-- /container -->


    </main>

@endsection
@section('js')
@endsection
