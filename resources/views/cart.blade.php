@extends('layouts.master')
@section('title', 'Sepet')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @include('layouts.partials.alert')
            @if(count(Cart::content())>0)
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th colspan="2">Ürün</th>
                        <th>Adet fiyatı</th>
                        <th>Adet</th>
                        <th>Tutar</th>
                    </tr>
                    @foreach(Cart::content() as $productCartItem)
                        <tr>
                            <td>
                                <a href="{{ route('products',Str::slug($productCartItem->name)) }}">
                                    <img  class="img-responsive" src="{{ $productCartItem->options->product_image!=null ? asset('uploads/products/' . $productCartItem->options->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('products',Str::slug($productCartItem->name)) }}">
                                   <p> {{ $productCartItem->name }}
                                   </p>
                                    <form action="{{ route('cart.delete',$productCartItem->rowId) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="btn btn-danger btn-xs" value="Sepetten kaldır">
                                    </form>
                                    </a>
                            </td>
                            <td>{{$productCartItem->price}} ₺</td>

                            <td>
                                <a href="#" class="btn btn-xs btn-default product-reduce-the-amount"
                                   data-id="{{ $productCartItem->rowId}}"
                                   data-number="{{ $productCartItem->qty-1 }}">-</a>
                                <span style="padding: 10px 20px">{{$productCartItem->qty}}</span>
                                <a href="#" class="btn btn-xs btn-default product-increase-the-amount"
                                   data-id="{{ $productCartItem->rowId}}"
                                   data-number="{{ $productCartItem->qty+1 }}">+</a><br>
                                <br>
                                @if($productCartItem->options->stock < 10)
                                    <span> Stokta son {{$productCartItem->options->stock}} ürün var.</span>
                                @endif

                            </td>
                            <td class="text-right">{{$productCartItem->subtotal}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="4" class="text-right">Toplam tutar</th>
                        <td class="text-right">{{Cart::subtotal()}} ₺</td>

                    </tr>
                    <tr>



                    </tr>
                </table>
                <form action="{{ route('cart.unload',$productCartItem->rowId) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-info btn-lg" value="Sepeti Boşalt">
                </form>
                @foreach(Cart::content() as $productCartItem)
                    @if($productCartItem->options->stock < $productCartItem->qty)
                        @if($stock_error > 0 )
                        {{ $productCartItem->name }},
                        @endif
                    @endif
                @endforeach

                @if($stock_error > 0)
                    <p>   Stok Sorunu!</p>
                    <a href="{{route('payment')}}" class="btn btn-success pull-right btn-lg" disabled>Ödeme Yap</a>

                @else
                    <a href="{{route('payment')}}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
                @endif

            @else
                <tr>
                    <td colspan="5">Henüz sepette ürün yok</td>
                </tr>
            @endif


        </div>
    </div>
@endsection
@section('footer')
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
                        window.location.href = '{{route('cart')}}';
                    }
                });
            });
        });
    </script>
@endsection
