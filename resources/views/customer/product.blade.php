@extends('customer.layouts.master')
@section('title', '$product->product_name')
@section('head')
    <link href="{{ asset('customer/css/product_page.css') }}" rel="stylesheet">

@endsection
@section('content')

    <main>
        <div class="container margin_30">
            <div class="countdown_inner">-20% This offer ends in
                <div data-countdown="2020/05/15" class="countdown"></div>
            </div>
            <div class="row">
                <div class="col-lg-6 magnific-gallery">
                    <p>
                        <a href="img/products/shoes/large/1.jpg" title="Photo title" data-effect="mfp-zoom-in"><img
                                    src="img/products/shoes/large/1.jpg" alt="" class="img-fluid"></a>
                    </p>
                    <p>
                        <a href="img/products/shoes/large/2.jpg" title="Photo title" data-effect="mfp-zoom-in"><img
                                    src="img/products/product_placeholder_square_medium.jpg"
                                    data-src="img/products/shoes/large/2.jpg" alt="" class="img-fluid lazy"></a>
                    </p>
                    <p>
                        <a href="img/products/shoes/large/3.jpg" title="Photo title" data-effect="mfp-zoom-in"><img
                                    src="img/products/product_placeholder_square_medium.jpg"
                                    data-src="img/products/shoes/large/3.jpg" alt="" class="img-fluid lazy"></a>
                    </p>
                    <p>
                        <a href="img/products/shoes/large/4.jpg" title="Photo title" data-effect="mfp-zoom-in"><img
                                    src="img/products/product_placeholder_square_medium.jpg"
                                    data-src="img/products/shoes/large/4.jpg" alt="" class="img-fluid lazy"></a>
                    </p>
                </div>
                <div class="col-lg-6" id="sidebar_fixed">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Anasayfa</a></li>
                            <li><a href="#">Category</a></li>
                            <li>Page active</li>
                        </ul>
                    </div>
                    <!-- /page_header -->
                    <div class="prod_info">
                        <h1>Armor Air X Fear</h1>
                        <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
                        <p><small>SKU: MTKRY-001</small><br>Sed ex labitur adolescens scriptorem. Te saepe verear
                            tibique sed. Et wisi ridens vix, lorem iudico blandit mel cu. Ex vel sint zril oportere,
                            amet wisi aperiri te cum.</p>
                        <p>Vix patrioque cotidieque ad, iusto probatus volutpat id pri. Amet dicam omnesque at est,
                            voluptua assueverit ut has, modo hinc nec ea. Quas nulla labore est ne, est in quod solet
                            labitur, sit ne probo mandamus.</p>
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
                                <div class="price_main"><span class="new_price">$148.00</span><span class="percentage">-20%</span>
                                    <span class="old_price">$160.00</span></div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="btn_add_to_cart"><a href="#0" class="btn_1">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- /prod_info -->
                    <div class="product_actions">
                        <ul>
                            <li>
                                <a href="#"><i class="ti-heart"></i><span>Favorilere Ekle</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="ti-bookmark"></i><span>Koleksiyona Ekle</span></a>
                            </li>
                        </ul>
                    </div>
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
                           role="tab">Description</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
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
                                    Description
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Detay</h3>
                                        <p>Lorem ipsum dolor sit amet, in eleifend <strong>inimicus elaboraret</strong>
                                            his, harum efficiendi mel ne. Sale percipit vituperata ex mel, sea ne essent
                                            aeterno sanctus, nam ea laoreet civibus electram. Ea vis eius explicari.
                                            Quot iuvaret ad has.</p>
                                        <p>Vis ei ipsum conclusionemque. Te enim suscipit recusabo mea, ne vis mazim
                                            aliquando, everti insolens at sit. Cu vel modo unum quaestio, in vide dicta
                                            has. Ut his laudem explicari adversarium, nisl <strong>laboramus
                                                hendrerit</strong> te his, alia lobortis vis ea.</p>
                                        <p>Perfecto eleifend sea no, cu audire voluptatibus eam. An alii praesent sit,
                                            nobis numquam principes ea eos, cu autem constituto suscipiantur eam. Ex
                                            graeci elaboraret pro. Mei te omnis tantas, nobis viderer vivendo ex
                                            has.</p>
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
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating"><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i
                                                            class="icon-star"></i><em>5.0/5.0</em></span>
                                                <em>Published 54 minutes ago</em>
                                            </div>
                                            <h4>"Commpletely satisfied"</h4>
                                            <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola
                                                sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat
                                                legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut.
                                                Viderer petentium cu his.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating"><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star empty"></i><i
                                                            class="icon-star empty"></i><em>4.0/5.0</em></span>
                                                <em>Published 1 day ago</em>
                                            </div>
                                            <h4>"Always the best"</h4>
                                            <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere
                                                fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer
                                                petentium cu his.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row justify-content-between">
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating"><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
                                                <em>Published 3 days ago</em>
                                            </div>
                                            <h4>"Outstanding"</h4>
                                            <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola
                                                sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat
                                                legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut.
                                                Viderer petentium cu his.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating"><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i
                                                            class="icon-star"></i><em>5.0/5.0</em></span>
                                                <em>Published 4 days ago</em>
                                            </div>
                                            <h4>"Excellent"</h4>
                                            <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea,
                                                ius essent fuisset ut. Viderer petentium cu his.</p>
                                        </div>
                                    </div>
                                </div>
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
                                <h3>24/7 Destek</h3>
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
@endsection
