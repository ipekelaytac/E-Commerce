@extends('customer.layouts.master')
@section('title', $product->product_name)
@section('head')
    <link href="{{ asset('customer/css/product_page.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('customer.layouts.partials.alert')
    @include('customer.layouts.partials.errors')

    <main>
        <div class="container margin_30">
{{--            <div class="countdown_inner">-20% This offer ends in--}}
{{--                <div data-countdown="2020/05/15" class="countdown"></div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-lg-6 magnific-gallery">
                    <p>
                        <a href="img/products/shoes/large/1.jpg" title="Photo title" data-effect="mfp-zoom-in"><img
                                    src="{{ $product->detail->product_image!=null ? asset('uploads/products/' . $product->detail->product_image) : 'https://via.placeholder.com/500?text=UrunResmi' }}" alt="" class="img-fluid"></a>
                    </p>
                </div>
                <div class="col-lg-6" id="sidebar_fixed">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Anasayfa</a></li>
                            <li>
                                @foreach($categories as $category)
                                <a class="and" href="{{ route('customer.categories', $category->slug) }}">{{ $category->category_name }}</a>
                            @endforeach
                            </li>
                            <li>{{$product->product_name}}</li>
                        </ul>
                    </div>
                    <!-- /page_header -->
                    <div class="prod_info">
                        <h1>{{$product->product_name}}</h1>
                        <span class="rating">
                            @for( $i=0; $i<$point; $i++)
                                <i class="icon-star voted"></i>
                            @endfor
                                @for( $i=0; $i<5-$point; $i++)
                                    <i class="icon-star "></i>
                                @endfor
                                @if(count($comments) == 0 )
                                  <em>Değerlendirme Yok</em></span>
                        @else
                            <em>  {{ count($comments) }} Değerlendirme </em></span>

                        @endif
                        <p><small>Ürün Kodu: #{{$product->id}}</small><br>{!!      Str::limit($product->comment,250,'...')!!}
                        <div class="prod_options">
                            {{--                            <div class="row">--}}
                            {{--                                <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color</strong></label>--}}
                            {{--                                <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">--}}
                            {{--                                    <ul>--}}
                            {{--                                        <li><a href="#0" class="color color_1 active"></a></li>--}}
                            {{--                                        <li><a href="#0" class="color color_2"></a></li>--}}
                            {{--                                        <li><a href="#0" class="color color_3"></a></li>--}}
                            {{--                                        <li><a href="#0" class="color color_4"></a></li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="row">--}}
                            {{--                                <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>--}}
                            {{--                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">--}}
                            {{--                                    <div class="custom-select-form">--}}
                            {{--                                        <select class="wide">--}}
                            {{--                                            <option value="" selected>Small (S)</option>--}}
                            {{--                                            <option value="">M</option>--}}
                            {{--                                            <option value=" ">L</option>--}}
                            {{--                                            <option value=" ">XL</option>--}}
                            {{--                                        </select>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class=" row col-5 offset-5">
                                <p class="float-end">   @if($product->stock < 10 && $product->stock > 0)
                                        Stokta son {{$product->stock}} ürün var.
                                    @endif
                                    @if($product->stock == 0)
                                        Stokta ürün yok!
                                    @endif
                                </p>
                            </div>
                            <div class="row">
                                <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Adet</strong></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                    <div class="numbers-row">
                                        <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="price_main"><span class="new_price">{{$product->price}}₺</span><span class="percentage">-20%</span>
                                    <span class="old_price">{{$product->price}}₺</span></div>
                            </div>
                            <div class="col-lg-4 col-md-6">

                                    <form action="{{route('customer.cart.add')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <div class="btn_add_to_cart"><button type="submit"  class="btn_1">Sepete Ekle</button></div>
                                    </form>
                            </div>
                        </div>
                    </div>

                    @auth()
                        <div class="product_actions">
                            <ul>
                                <li>
                                    <form id="fav" action="{{route('customer.favorite_products.add')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                    <a onclick="document.getElementById('fav').submit();"><i class="ti-heart"></i><span>Favorilere Ekle</span></a>
                                    </form>

                                </li>
                                <li>
                                    <a onclick="showHide()"  ><i class="ti-bookmark"></i><span>Koleksiyona Ekle</span></a>
                                    <div id="list"  style="display:none">
                                        @foreach($favorite_collections as $collection)
                                            <form action="{{route('customer.collection_product.add')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="product_id" value="{{ $product->id}}">
                                                <input type="hidden" name="collection_id" value="{{ $collection->id }}">
                                                <input type="submit" class="btn btn-theme"
                                                       value="{{ $collection->collection_name }}">
                                            </form>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endauth
                    <!-- /prod_info -->
                    <!-- /product_actions -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

        <div class="tabs_product">
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab"
                           role="tab">Özellikler</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Değerlendirmeler</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /tabs_product -->
        <div class="tab_content_wrapper">
            <div class="container">
                <div class="tab-content" role="tablist">
                    <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                        <div class="card-header" role="tab" id="heading-A">
                            <h5 class="mb-0">
                                <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false"
                                   aria-controls="collapse-A">
                                    Özellikler
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Detay</h3>
                                        {!! $product->comment !!}
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Özellikler</h3>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-striped">
                                                <tbody>
                                                <tr>
                                                    <td><strong>Color</strong></td>
                                                    <td>Blue, Purple</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Size</strong></td>
                                                    <td>150x100x100</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Weight</strong></td>
                                                    <td>0.6kg</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Manifacturer</strong></td>
                                                    <td>Manifacturer</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /table-responsive -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                        <div class="card-header" role="tab" id="heading-B">
                            <h5 class="mb-0">
                                <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false"
                                   aria-controls="collapse-B">
                                    Yorumlar
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    @if(count($comments) == 0 )
                                        <h4>Henüz yorum yapılmadı.</h4>
                                    @endif
                                    @foreach($comments as $comment )
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                 <span class="rating">
                                                 @for( $i=0; $i<$comment->point; $i++)
                                                        <i class="icon-star"></i>
                                                    @endfor
                                                    @if($comment->point == 0 )
                                                        <em>Değerlendirme Yok</em></span>

                                                @endif



                                                    <em>5/{{ $comment->point }}</em></span>
                                                <em>{{ $comment->updated_at }}</em>
                                            </div>
                                            <h4>{{ $comment->comment_title }}</h4>
                                            <b>{{ $comment->name_surname }}</b>
                                            <p>{{ $comment->comment }}</p>
                                            <img
                                                 src="{{ $comment->comment_image!=null ? asset('uploads/comments/' . $comment->comment_image) : 'customer/img/products/product_placeholder_square_medium.jpg' }}" alt="">
                                        </div>
                                    </div>
                                        @endforeach


                                </div>
                                <!-- /row -->
                                <!-- /row -->
                            </div>
                            <!-- /card-body -->
                        </div>
                    </div>
                </div>
                <!-- /tab-content -->
            </div>
        </div>

        <!-- /container -->

        <div class="feat">
            <div class="container">
                <ul>
                    <li>
                        <div class="box">
                            <i class="ti-gift"></i>
                            <div class="justify-content-center">
                                <h3>Ücretsiz Kargo</h3>
                                <p>99₺ Üzerindeki Tüm Siparişler İçin</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <i class="ti-wallet"></i>
                            <div class="justify-content-center">
                                <h3>Güvenli Ödeme</h3>
                                <p>100% güvenli Ödeme</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <i class="ti-headphone-alt"></i>
                            <div class="justify-content-center">
                                <h3>7/24 Destek</h3>
                                <p>Çevrimiçi Destek</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--/feat-->

    </main>

@endsection
@section('js')
    <script src="{{ asset('customer/js/sticky_sidebar.js') }}"></script>
    <script>
        // Sticky sidebar
        $('#sidebar_fixed').theiaStickySidebar({
            minWidth: 991,
            updateSidebarHeight: false,
            additionalMarginTop: 90
        });
    </script>
    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        function showHide() {
            var x = document.getElementById("list");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </SCRIPT>
@endsection
