@extends('layouts.master')
@section('title', 'Sipariş Detay')
@section('content')
    <div class="container">
        <div class="bg-content">
            <a href="{{ route('orders') }}" class="btn btn-xs btn-primary">
                <i class="glyphicon glyphicon-arrow-left"></i> Siparişlere Dön
            </a>
            <h2>Sipariş (SP-{{$order->id}})</h2>
            @include('layouts.partials.alert')
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>Ara Toplam</th>
                    <th>Durum</th>
                    @if($evaluation > 0)
                    <th>Değerlendir</th>
                     @endif
                </tr>
                @foreach($order->MainCart->cartproducts as $cart_product)
                    <tr>

                        <td><img  class="img-responsive" src="{{ $cart_product->product->detail->product_image!=null ? asset('uploads/products/' . $cart_product->product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"></td>
                        <td>{{$cart_product->product->product_name}}</td>
                        <td>{{$cart_product->price}}</td>
                        <td>{{$cart_product->number}}</td>
                        <td>{{$cart_product->price * $cart_product->number}}</td>
                        <td>{{$cart_product->situation}}</td>
                        @if($evaluation > 0)
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Değerlendir
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ürün Değerlendir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('order.evaluation_save')}}" method="post">
                                            {{ csrf_field() }}
                                            @foreach($evaluation_product as $evaluation)
                                                @if($evaluation->product_id = $cart_product->product->id)
                                        <div class="modal-body">
                                                    <p>Puan ver</p>
                                            <input type="text" name="point" value="{{ $evaluation->point}}">
                                                    <p>yorum yap</p>
                                                    <input type="text" name="comment" value="{{ $evaluation->comment}}">
                                                    <p>resim ekle</p>

                                                                @if ($evaluation->comment_image!=null)
                                                                    <img src="/uploads/comments/{{ $evaluation->comment_image }}"
                                                                         style="height: 100px; margin-right: 20px;" class="thumbnail pull-left">
                                                                @endif
                                                                <input type="file" id="comment_image" name="comment_image">

                                            <input type="hidden" name="product_id" value="{{ $cart_product->product->id}}">
                                            <input type="hidden" name="order_id" value="{{$order->id}}">
                                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                            <input type="submit" class="btn btn-success"  value="Gönder">
                                        </div>
                                                @endif
                                                @endforeach
                                                @if(count($evaluation_product) == 0)
                                            <div class="modal-body">
                                                <p>Puan ver</p>
                                                <input type="text" name="point" value="">
                                                <p>yorum yap</p>
                                                <input type="text" name="comment" value="">
                                                <p>resim ekle</p>
                                                <input type="file" id="comment_image" name="comment_image">
                                                <input type="hidden" name="product_id" value="{{ $cart_product->product->id}}">
                                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                                <input type="submit" class="btn btn-success"  value="Gönder">
                                            </div>
                                                    @endif
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </td>
                            @endif
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4">Toplam Tutar</th>
                    <th colspan="2">{{ $order->order_price }} ₺</th>
                </tr>
{{--                <tr>--}}
{{--                    <th>Toplam Tutar (KDV Dahil)</th>--}}
{{--                    <th>{{ $order->order_price * ((100+config('cart.tax'))/100) }} ₺</th>--}}
{{--                </tr>--}}
                <tr>
                    <th colspan="4">Sipariş Durumu</th>
                    <th colspan="2">{{ $order->situation }}</th>
                </tr>

            </table>
        </div>
    </div>

@endsection
