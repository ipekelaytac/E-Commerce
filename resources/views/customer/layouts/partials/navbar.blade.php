<header class="version_2">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="{{route('customer.index')}}"><img src="customer/img/logo_black.svg" alt="" width="100"
                                                                   height="35"></a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="{{route('customer.index')}}"><img src="customer/img/logo_black.svg" alt=""
                                                                       width="100" height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a href="{{route('customer.index')}}">Anasayfa</a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Kategoriler</a>
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('customer.categories', $category->slug) }}">{{ $category->category_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('customer.contact')}}">İletişim</a>
                            </li>
                            <li>
                                <a href="{{route('customer.about_us')}}">Hakkımızda</a>
                            </li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="{{route('customer.cart')}}" class="cart_bt"><strong>{{ count(Cart::content()) }}</strong></a>
                                <div class="dropdown-menu">
                                    @if( count(Cart::content()) > 0)
                                    <ul>
                                        @foreach(Cart::content() as $productCartItem)
                                            <li>
                                                <a href="{{ route('customer.products',Str::slug($productCartItem->name)) }}">
                                                    <figure><img
                                                            src="{{ $productCartItem->options->product_image!=null ? asset('uploads/products/' . $productCartItem->options->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}"
                                                            data-src="{{ $productCartItem->options->product_image!=null ? asset('uploads/products/' . $productCartItem->options->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}" alt=""
                                                            width="50" height="50" class="lazy"></figure>
                                                    <strong><span>{{ $productCartItem->name }}</span>{{$productCartItem->price}} ₺</strong>
                                                </a>
                                                <form id="del" action="{{ route('customer.cart.delete',$productCartItem->rowId) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a class="action"onclick="document.getElementById('del').submit();"><i class="ti-trash"></i></a>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="total_drop">
                                        <div class="clearfix"><strong>Toplam Fiyat</strong><span>{{Cart::subtotal()}} ₺</span></div>
                                        <a href="{{route('customer.cart')}}" class="btn_1 outline">Sepete Git</a><a
                                            href="{{route('customer.payment')}}" class="btn_1">Ödemeye Geç</a>
                                    </div>
                                </div>
                                @else
                                    <span>Sepette Ürün Yok.</span>
                                @endif
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                        @auth()
                        <li>
                            <a href="{{ route('customer.favorite_products') }}" class="wishlist"><span>Favoriler</span></a>
                        </li>
                        @endauth

                        <li>
                            <div class="dropdown dropdown-access">
                                <a href="#" class="access_link"><span>Hesabım</span></a>
                                <div class="dropdown-menu">
                                    @guest()
                                        <a href="{{route('customer.user.operations')}}" class="btn_1">Giriş yap veya
                                            Kayıt ol</a>
                                    @endguest
                                        @auth()
                                    <ul>
                                        {{--                                        <li>--}}
                                        {{--                                            <a href="#"><i class="ti-truck"></i>Track your Order</a>--}}
                                        {{--                                        </li>--}}

                                        <li>
                                            <a href="{{route('customer.orders')}}"><i class="ti-package"></i>Siparişlerim</a>
                                        </li>
                                        <li>
                                            <a href="{{route('customer.user.information')}}"><i class="ti-user"></i>Hesabım</a>
                                        </li>
                                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="ti-shift-right"></i>Çıkış</a>
                                            <form id="logout-form" action="{{ route('customer.user.logout') }}" method="post"  style="display: none;" >
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                        {{--                                        <li>--}}
                                        {{--                                            <a href="#"><i class="ti-help-alt"></i>Help and Faq</a>--}}
                                        {{--                                        </li>--}}
                                    </ul>
                                        @endauth

                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="search_panel"><span>Search</span></a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->
</header>
