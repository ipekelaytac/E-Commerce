@extends('layouts.master')
@section('title', 'Favori Ürünler')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Favori Ürünler</h2>
            @include('layouts.partials.alert')
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th colspan="2">Ürün</th>
                        <th>Fiyat</th>
                    </tr>

                    @foreach($favorite_products as $favorite_product)
                        <tr>
                            <td>
                                <a href="">
                                    <img  class="img-responsive" src="{{ $favorite_product->product->detail->product_image!=null ? asset('uploads/products/' . $favorite_product->product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}">
                                </a>
                            </td>
                            <td>
                                <a href="">
                                    <p>{{ $favorite_product->product->product_name }}
                                    </p>
                                        <a href="{{ route('favorite_products.delete',$favorite_product->id ) }}"><input  type="submit" class="btn btn-danger btn-xs" value="Sepetten kaldır"></a>
                                </a>
                            </td>
                            <td>
                                <p>{{ $favorite_product->product->price }}
                                @if($favorite_product->product->stock < 10)
                                <p>{{ $favorite_product->product->stock }}
                                @endif
                            </td>

                            <td>

{{--                                @if($productCartItem->options->stock < 10)--}}
{{--                                    <span> Stokta son  ürün var.</span>--}}
{{--                                @endif--}}

                            </td>
                        </tr>
                    @endforeach

                    <tr>



                    </tr>
                </table>

                <tr>
                    <td colspan="5">Henüz favorilerde ürün yok</td>
                </tr>


        </div>
    </div>
@endsection
@section('footer')
@endsection
