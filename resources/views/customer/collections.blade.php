@extends('customer.layouts.master')
@section('title', 'Koleksiyonlar')
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
                        <li>Koleksiyonlar</li>
                    </ul>
                </div>
                <div class="row">
                    <h1 class="d-flex flex-row">Koleksiyonlar</h1>
                    <div class="d-flex flex-row-reverse">

                        <form action="" method="post">
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
                <tr>
                    <td>
                        <span class="item_cart  m-1">Armor Air x Fear</span>

                    </td>

                    <td class="options">
                        <a href="#"><i class="ti-trash"></i></a>
                    </td>
                </tr>

                </tbody>
            </table>


        </div>
        <!-- /container -->


    </main>

@endsection
@section('js')
@endsection
