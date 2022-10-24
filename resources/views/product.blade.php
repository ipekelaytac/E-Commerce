@extends('layouts.master')
@section('title', $product->product_name)
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}">Anasayfa</a></li>

            @foreach($categories as $category)
                <li><a href="{{ route('categories', $category->slug) }}">{{ $category->category_name }}</a></li>
            @endforeach
            <li class="active">{{$product->product_name}}</li>
        </ol>
        @include('layouts.partials.alert')
        @include('layouts.partials.errors')

        <div class="bg-content">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-responsive"
                         src="{{ $product->detail->product_image!=null ? asset('uploads/products/' . $product->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}">
                    <hr>
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="https://via.placeholder.com/60?text=UrunResmi"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="https://via.placeholder.com/60?text=UrunResmi"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="https://via.placeholder.com/60?text=UrunResmi"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h1>{{$product->product_name}}</h1>
                    <p class="price">{{$product->price,2}} ₺</p>
                    <p>ürün puanı :{{$point,1}}</p>
                    @if($product->stock < 10 && $product->stock > 0)
                        <p> Stokta son {{$product->stock}} ürün var.</p>
                    @endif
                    @if($product->stock == 0)
                        <p> Stokta ürün yok!</p>
                        <form action="{{route('cart.add')}}" method="post">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-theme" value="Sepete Ekle" disabled>
                        </form>
                    @endif
                    @if($product->stock > 0)
                        <form action="{{route('cart.add')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="submit" class="btn btn-theme" value="Sepete Ekle">
                        </form>
                    @endif
                    @auth()
                        <form action="{{route('favorite_products.add')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="submit" class="btn btn-theme" value="fav Ekle">
                        </form>


                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Koleksiyona Ekle
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Koleksiyionlar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($favorite_collections as $collection)
                                            <form action="{{route('collection_product_add')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="product_id" value="{{ $product->id}}">
                                                <input type="hidden" name="collection_id" value="{{ $collection->id }}">
                                                <input type="submit" class="btn btn-theme"
                                                       value="{{ $collection->collection_name }}">

                                            </form>
                                        @endforeach
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth
                    <hr>
                    <p>Ürün Markası:</p>
                        <p>{{ $brand->brand_name }}</p>
                        <img class="img-responsive"
                             src="{{ $brand->brand_image!=null ? asset('uploads/brands/' . $brand->brand_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}">
                </div>
            </div>
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#t1" data-toggle="tab">Ürün Açıklaması</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="t1">{{$product->comment}}</div>
                </div>
            </div>
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a href="#t2" data-toggle="tab">Yorumlar</a></li>
                </ul>
                <div class="tab-content">
                    @if(count($comments) == 0 )
                        <div role="tabpanel" class="tab-pane active" id="t2">Henüz yorum yapılmadı.</div>
                    @endif
                    @foreach($comments as $comment )
                        <hr>
                        <div role="tabpanel" class="tab-pane active" id="t2">kullanıcı
                            adı:{{ $comment->name_surname }}</div>
                        <div role="tabpanel" class="tab-pane active" id="t2">yorum:{{ $comment->comment }}</div>
                        <div role="tabpanel" class="tab-pane active" id="t2">puan:{{ $comment->point }}</div>
                        <div role="tabpanel" class="tab-pane active" id="t2">resim:
                            <img src="/uploads/comments/{{ $comment->comment_image }}">
                        </div>
                        <div role="tabpanel" class="tab-pane active" id="t2">yorum
                            tarihi:{{ $comment->updated_at }}</div>
                        <hr>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
