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
                <tr>
                    <th>Ürün</th>
                    <th>Fiyat</th>
                    <th>Adet</th>
                    <th>Toplam Fiyat</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(Cart::getContent() as $product)
                    @php
                        $image = $product->attributes['conditions']['product_image'] ?? null;
                    @endphp
                    <tr>
                        <td>
                            <div class="thumb_cart">
                                <img src="{{ $image ? asset('uploads/products/' . $image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"
                                     alt="{{ $product->name }}">
                            </div>
                            <span class="item_cart">{{ $product->name }}</span>
                        </td>
                        <td><strong>{{ number_format($product->price, 2) }} ₺</strong></td>
                        <td>
                            <div class="numbers-row">
                                <input type="text" value="{{ $product->quantity }}" id="quantity_{{ $product->id }}" class="qty2" readonly>

                                <a href="#" class="button_inc inc" data-id="{{ $product->id }}">+</a>
                                <a href="#" class="button_inc dec" data-id="{{ $product->id }}">-</a>
                            </div>
                        </td>
                        <td>
                            <strong id="subtotal_{{ $product->id }}">
                                {{ number_format($product->price * $product->quantity, 2) }} ₺
                            </strong>
                        </td>
                        <td class="options">
                            <form id="del-{{ $product->id }}" action="{{ route('customer.cart.delete', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="action" onclick="document.getElementById('del-{{ $product->id }}').submit();">
                                    <i class="ti-trash"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /container -->


        <div class="box_cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <ul>
                            <li>
                                Toplam Fiyat

                            </li>






                        </ul>
                        <a href="{{ route('customer.payment') }}" class="btn_1 full-width cart">Sipariş Ver</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- /box_cart -->
    </main>
@endsection

@section('js')
    <script>$(document).ready(function() {
            // sayfa yüklendiğinde toplam fiyat için text node ekleyelim
                // Toplam fiyat text node olarak ekle
                $('li:contains("Toplam Fiyat")').each(function() {
                    if (!$(this).data('price-appended')) {
                        let total = "{{ number_format(Cart::getContent()->sum(fn($item) => $item->price * $item->quantity), 2) }}";
                        $(this).text('Toplam Fiyat : ' + total + ' ₺');
                        $(this).data('price-appended', true);
                    }
                });



            // quantity değiştiğinde Ajax ile güncelle
            $(document).on('click', 'a.button_inc', function(e){
                e.preventDefault();
                const $btn = $(this);
                const $input = $btn.siblings('input.qty2');
                let current = parseInt($input.val());

                if ($btn.hasClass('inc')) current += 1;
                else if ($btn.hasClass('dec') && current > 1) current -= 1;

                const productId = $btn.data('id');

                $.ajax({
                    type: 'PATCH',
                    url: '/sepet/guncelle/' + productId,
                    data: { number: current, _token: '{{ csrf_token() }}' },
                    success: function(res){
                        $input.val(current);
                        $('#subtotal_' + productId).text(res.subtotal.toFixed(2) + ' ₺');

                        // span olmadan text node güncelle
                        $('li:contains("Toplam Fiyat")').each(function() {
                            const text = $(this).text();
                            const parts = text.split(':'); // önceki değeri sil
                            $(this).contents().filter(function(){ return this.nodeType === 3; }).first().replaceWith('Toplam Fiyat : ' + res.total.toFixed(2) + ' ₺');
                        });
                    }
                });
            });
        });

    </script>
@endsection
