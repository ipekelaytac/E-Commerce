@extends('customer.layouts.master')
@section('title', 'Koleksiyonlar')
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
                        <li>Koleksiyonlar</li>
                    </ul>
                </div>
                    <div class="d-flex justify-content-between">
                    <h1 class="d-flex flex-row">Koleksiyonlar</h1>
                    <div class="d-flex flex-row-reverse">

                        <form action="{{ route('customer.collection.add') }}" method="post">
                            {{ csrf_field() }}
                            <label class="mt-1">Koleksiyon Ekle</label>
                            <input type="text" name="collection_name">
                            <button type="submit" class="btn btn-success">
                                Ekle
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /page_header -->
            <table class="table table-striped cart-list">
                <thead>
                <tr>
                    <th>
                        Koleksiyon
                    </th>

                    <th>
                        Sil
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($favorite_collections as $collection)
                <tr>
                    <td>
                        <a href="{{ route('customer.collection.detail',$collection->slug) }}">
                        <span class="item_cart  m-1">{{ $collection->collection_name }}</span>
                        </a>
                    </td>

                    <td class="options">
                        <a href="{{ route('customer.collection.delete',$collection->id ) }}"><i class="ti-trash"></i></a>
                    </td>
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
