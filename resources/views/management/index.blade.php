@extends('management.layouts.master')
@section('title', 'Anasayfa')
@section('header')
    <link type="text/css" rel="stylesheet" href="/management/plugins/apex-chart/apexcharts.css"/>
@endsection
@section('content')
    <div class="row row-xs">
        <div class="col-sm-12 col-md-4 col-xl-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right">
                                <i class="tx-30 tx-primary icon-handbag"></i>
                            </div>
                            <h3 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark">
                                <span
                                    class="counter">{{ $pending_order }}</span></h3>
                            <p class="tx-uppercase tx-10 mg-b-10">Bekleyen Sipariş</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-xl-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right">
                                <i class="tx-30 tx-success icon-basket-loaded"></i>
                            </div>
                            <h3 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark">
                            <span
                                class="counter">{{$total_product}}</span></h3>
                            <p class="tx-uppercase tx-10 mg-b-10">Ürün Adet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-xl-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right">
                                <i class="tx-30 tx-success icon-basket-loaded"></i>
                            </div>
                            <h3 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span
                                    class="counter">{{$day_sales_product}}</span></h3>
                            <p class="tx-uppercase tx-10 mg-b-10">BUGÜN SATILAN ÜRÜN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row row-xs">
        <div class="col-sm-12 col-md-4 col-xl-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right">
                                <i class="tx-30 tx-primary icon-handbag"></i>
                            </div>
                            <h3 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark">
                                <span
                                    class="counter">{{ $completed_order }}</span></h3>
                            <p class="tx-uppercase tx-10 mg-b-10">Tamamlanan Sipariş</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-xl-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right">
                                <i class="tx-30 tx-primary icon-handbag"></i>
                            </div>
                            <h3 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark">
                            <span
                                class="counter">{{$total_category}}</span></h3>
                            <p class="tx-uppercase tx-10 mg-b-10">Kategori</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-xl-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right">
                                <i class="tx-30 tx-warning icon-briefcase"></i>
                            </div>
                            <h3 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span
                                    class="counter">{{$day_sales}}</span>₺</h3>
                            <p class="tx-uppercase tx-10 mg-b-10">BUGÜN TOPLAM KAZANÇ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row row-xs clearfix">
        <!--================================-->
        <!--  Monthly Report Start-->
        <!--================================-->
        <div class="col-12 col-lg-4">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        İstatistikler
                    </h4>
                    <div class="card-header-btn">
                        <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#monthlyReports"
                           aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i
                                class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i
                                class="ion-ios-trash-outline"></i></a>
                    </div>
                </div>



                <div class="collapse show" id="monthlyReports">
                    <div class="card-body pd-t-0 pd-b-20">
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="d-flex pd-y-35">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="tx-uppercase tx-10 mg-b-10 tx-gray-500">Toplam Kazanç</h3>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="tx-20 tx-dark tx-rubik tx-normal">₺<span
                                                    class="counter">{{$all_sales}}</span></div>
                                        </div>
                                        <div class="progress ht-3 mg-b-0 op-5">
                                            <div class="progress-bar bg-primary wd-70p" role="progressbar"
                                                 aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex pd-y-20">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="tx-uppercase tx-10 mg-b-10 tx-gray-500">Toplam Sipariş</h3>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="tx-20 tx-dark tx-rubik tx-normal"><span
                                                    class="counter">{{$total_order}}</span><small></small></div>
                                        </div>
                                        <div class="progress ht-3 mg-b-0 op-5">
                                            <div class="progress-bar bg-success wd-85p" role="progressbar"
                                                 aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex pd-y-20">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="tx-uppercase tx-10 mg-b-10 tx-gray-500">Toplam Üye</h3>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="tx-20 tx-dark tx-rubik tx-normal"><span
                                                    class="counter">{{$total_user}}</span><small></small></div>
                                        </div>
                                        <div class="progress ht-3 mg-b-0 op-5">
                                            <div class="progress-bar bg-danger wd-75p" role="progressbar"
                                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Monthly Report End -->
        <div class="col-12 col-lg-4">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Kategoriye Göre Satışlar
                    </h4>
                    <div class="card-header-btn">
                        <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse9"
                           aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i
                                class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                    </div>
                </div>
                <div class="card-body collapse show" id="collapse9">
                    <div class="clearfix">
                        <div id="flotPie1" class="ht-200 my-4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Aylık Kazanç
                    </h4>
                    <div class="card-header-btn">
                        <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse1"
                           aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i
                                class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                    </div>
                </div>
                <div class="card-body collapse show" id="collapse1">
                    <div class="clearfix">
                        <div id="flotBar1" class="ht-200 ht-sm-300"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row row-xs clearfix">
        <div class="col-xl-4">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        En Yüksek Siparişler
                    </h4>
                    <div class="card-header-btn">
                        <a href="" data-toggle="collapse" class="btn card-collapse" data-target="#featuresProduct"
                           aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="" data-toggle="refresh" class="btn card-refresh"><i
                                class="ion-android-refresh"></i></a>
                        <a href="" data-toggle="expand" class="btn card-expand" data-original-title="" title=""
                           data-init="true"><i class="ion-android-expand"></i></a>
                        <a href="" data-toggle="remove" class="btn card-remove" data-original-title="" title=""
                           data-init="true"><i class="ion-android-close"></i></a>
                    </div>
                </div>
                <div class="card-body pd-0 collapse show" id="featuresProduct">
                    <div class="table-responsive">
                        <table class="table table-vertical-middle mb-0">
                            <thead class="tx-10 tx-uppercase">
                            <tr>
                                <th class="border-0">Sipariş ID</th>
                                <th class="border-0">Müşteri</th>
                                <th class="border-0">Sipariş Tutarı</th>
                                <th class="border-0 wd-20 text-center">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($highest_orders as $highest_order)
                            <tr>
                                <td><a href="">#{{$highest_order->id}}</a></td>
                                <td><a href="">{{$highest_order->name_surname}}</a></td>
                                <td><h4 class="tx-13 tx-dark">{{$highest_order->order_price}}</h4></td>
                                <td>
                                    <a href="{{ route('management.order.update', $highest_order->id) }}" class="btn btn-sm btn-label-primary"><i class="ion-android-cart"></i>
                                        Detay</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4 order-md-1 order-xl-0">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        En Çok Satan Ürünler
                    </h4>
                    <div class="card-header-btn">
                        <a href="" data-toggle="collapse" class="btn card-collapse" data-target="#popularProduct"
                           aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="" data-toggle="refresh" class="btn card-refresh"><i
                                class="ion-android-refresh"></i></a>
                        <a href="" data-toggle="expand" class="btn card-expand" data-original-title="" title=""
                           data-init="true"><i class="ion-android-expand"></i></a>
                        <a href="" data-toggle="remove" class="btn card-remove" data-original-title="" title=""
                           data-init="true"><i class="ion-android-close"></i></a>
                    </div>
                </div>
                <div class="card-body pd-0 collapse show" id="popularProduct">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                        @foreach($best_selling_products as $report)
                                            <tr class="d-flex justify-content-between">
                                                <td> <a href="{{ route('management.product.update' , $report->prod_id) }}"><img src="{{ $report->product_image!=null ? asset('uploads/products/' . $report->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}" alt="" class="wd-50"></a>
                                                </td>
                                                <td class="wd-100p"><a href="{{ route('management.product.update' , $report->prod_id) }}">{{ $report->product_name }}</a><br>
                                                    <span class="tx-10 tx-gray-500 wa">Kategori:
                                                       @foreach($best_selling_products_category as $category)
                                                            @if($report->prod_id == $category->prod_id)
                                                            <a href="" class="bold">{{ $category->category_name }}</a>
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </td>
                                                <td class="tx-rubik">{{ $report->price }} ₺<br>
                                                    <span class="tx-10 tx-gray-500"><i class="ion-android-arrow-up mr-1 tx-success"></i>{{ $report->number  }} Sipariş</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Sipariş Geçmişi
                    </h4>
                    <div class="card-header-btn">
                        <a href="" data-toggle="collapse" class="btn card-collapse" data-target="#transactionHistory"
                           aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="" data-toggle="refresh" class="btn card-refresh"><i
                                class="ion-android-refresh"></i></a>
                        <a href="" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="transactionHistory">
                    <ul class="list-group list-group-flush tx-13 pd-y-10">
                        @foreach($orders as $order)
                            <a href="{{ route('management.order.update', $order->id) }}">
                            <li class="list-group-item d-flex pd-sm-x-20">
                                <div class="d-none d-sm-block">
                                <span
                                    class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center
                                    rounded card-icon-{{ $order->situation === "Siparişiniz alındı" ? "danger" : ( $order->situation === "Sipariş tamamlandı" ? "success" : ( $order->situation === "Ödeme onaylandı" ? "warning" :( $order->situation === 'Kargoya verildi' ? "warning": "warning" ) )) }}"><i
                                        class="icon ion-{{ $order->situation === "Siparişiniz alındı" ? "checkmark" : ( $order->situation === "Sipariş tamamlandı" ? "checkmark" : ( $order->situation === "Ödeme onaylandı" ? "shuffle" :( $order->situation === 'Kargoya verildi' ? "shuffle": "shuffle" ) )) }}"></i></span>
                                </div>
                                <div class="pd-sm-l-10">
                                    <p class="tx-dark mg-b-0"><a href=""
                                                                 class="tx-dark mg-b-0 tx-semibold">{{$order->name_surname}}</a>
                                    </p>
                                    <span class="tx-12 mg-b-0 tx-gray-500">Sipariş ID: {{ $order->id }}</span>
                                </div>
                                <div class="mg-l-auto text-right">
                                    <p class="mg-b-0 tx-rubik tx-dark">
                                        Tutar {{$order->order_price * ((100 + config('cart.tax'))/100)}} ₺</p>
                                    <span class="tx-12 tx-{{ $order->situation === "Siparişiniz alındı" ? "danger" : ( $order->situation === "Sipariş tamamlandı" ? "success" : ( $order->situation === "Ödeme onaylandı" ? "warning" : ( $order->situation === 'Ödeme onaylandı' ? "warning": "warning" ) )) }} mg-b-0">{{$order->situation}}</span>
                                </div>
                            </li>
                            </a>
                        @endforeach
{{--                        <li class="list-group-item d-flex pd-sm-x-20">--}}
{{--                            <div class="d-none d-sm-block">--}}
{{--                                <span--}}
{{--                                    class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-success"><i--}}
{{--                                        class="icon ion-checkmark"></i></span>--}}
{{--                            </div>--}}
{{--                            <div class="pd-sm-l-10">--}}
{{--                                <p class="tx-dark mg-b-0"><a href="" class="tx-dark mg-b-0 tx-semibold">Müşteri Adı</a>--}}
{{--                                </p>--}}
{{--                                <span class="tx-12 mg-b-0 tx-gray-500">Sipariş ID: #857423</span>--}}
{{--                            </div>--}}
{{--                            <div class="mg-l-auto text-right">--}}
{{--                                <p class="mg-b-0 tx-rubik tx-dark">Tutar ₺</p>--}}
{{--                                <span class="tx-12 tx-success mg-b-0">Tamamlandı</span>--}}
{{--                            </div>--}}
{{--                        </li>--}}

{{--                        <li class="list-group-item d-flex pd-sm-x-20">--}}
{{--                            <div class="d-none d-sm-block">--}}
{{--                                <span--}}
{{--                                    class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-warning"><i--}}
{{--                                        class="icon ion-shuffle"></i></span>--}}
{{--                            </div>--}}
{{--                            <div class="pd-sm-l-10">--}}
{{--                                <p class="tx-dark mg-b-0"><a href="" class="tx-dark mg-b-0 tx-semibold">Müşteri Adı</a>--}}
{{--                                </p>--}}
{{--                                <span class="tx-12 mg-b-0 tx-gray-500">Sipariş ID: #452356</span>--}}
{{--                            </div>--}}
{{--                            <div class="mg-l-auto text-right">--}}
{{--                                <p class="mg-b-0 tx-rubik tx-dark">Tutar ₺</p>--}}
{{--                                <span class="tx-12 tx-warning mg-b-0">Beklemede</span>--}}
{{--                            </div>--}}
{{--                        </li>--}}

{{--                        <li class="list-group-item d-flex pd-sm-x-20">--}}
{{--                            <div class="d-none d-sm-block">--}}
{{--                                <span--}}
{{--                                    class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-danger"><i--}}
{{--                                        class="icon ion-close"></i></span>--}}
{{--                            </div>--}}
{{--                            <div class="pd-sm-l-10">--}}
{{--                                <p class="tx-dark mg-b-0"><a href="" class="tx-dark mg-b-0 tx-semibold">Müşteri Adı</a>--}}
{{--                                </p>--}}
{{--                                <span class="tx-12 mg-b-0 tx-gray-500">Sipariş ID: #457771</span>--}}
{{--                            </div>--}}
{{--                            <div class="mg-l-auto text-right">--}}
{{--                                <p class="mg-b-0 tx-rubik tx-dark">Tutar ₺</p>--}}
{{--                                <span class="tx-12 tx-danger mg-b-0">İptal</span>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
@section('footer')
    <script src="/management/plugins/popper/popper.js"></script>
    <script src="/management/plugins/toastr/toastr.min.js"></script>
    <script src="/management/plugins/countup/counterup.min.js"></script>
    <script src="/management/plugins/waypoints/waypoints.min.js"></script>
    <script src="/management/plugins/flot/jquery.flot.js"></script>
    <script src="/management/plugins/flot/jquery.flot.pie.js"></script>
    <script src="/management/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/management/plugins/apex-chart/irregular-data-series.js"></script>
    <script src="/management/plugins/simpler-sidebar/jquery.simpler-sidebar.min.js"></script>
    <script src="/management/js/dashboard/ecommerce-dashboard-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

    <script>
        $(function () {
            // $(document).ready(function () {
            //     setTimeout(function () {
            //         toastr.options = {
            //             positionClass: "toast-top-right",
            //             closeButton: true,
            //             progressBar: true,
            //             showMethod: "slideDown",
            //             timeOut: 5000
            //         };
            //         toastr.info("Multipurpose Admin Template", "Hi, welcome to Metrical")
            //     }, 300)
            // });
            var d = {
                chart: {
                    type: "bar",
                    height: 50,
                    fontFamily: "IBM Plex Sans, sans-serif",
                    foreColor: "#6780B1",
                    sparkline: {enabled: true}
                },
                plotOptions: {bar: {columnWidth: "25%"}},
                series: [{data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]}],
                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
                xaxis: {crosshairs: {width: 1},},
                colors: ["#F73126"],
                tooltip: {
                    fixed: {enabled: false}, x: {show: false}, y: {
                        title: {
                            formatter: function (f) {
                                return ""
                            }
                        }
                    }, marker: {show: false}
                }
            };
            new ApexCharts(document.querySelector("#countChart1"), d).render();
            var b = {
                chart: {
                    type: "bar",
                    height: 50,
                    fontFamily: "IBM Plex Sans, sans-serif",
                    foreColor: "#6780B1",
                    sparkline: {enabled: true}
                },
                plotOptions: {bar: {columnWidth: "25%"}},
                series: [{data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]}],
                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
                xaxis: {crosshairs: {width: 1},},
                colors: ["#63CF72"],
                tooltip: {
                    fixed: {enabled: false}, x: {show: false}, y: {
                        title: {
                            formatter: function (f) {
                                return ""
                            }
                        }
                    }, marker: {show: false}
                }
            };
            new ApexCharts(document.querySelector("#countChart2"), b).render();
            var a = {
                chart: {
                    type: "bar",
                    height: 50,
                    fontFamily: "IBM Plex Sans, sans-serif",
                    foreColor: "#6780B1",
                    sparkline: {enabled: true}
                },
                plotOptions: {bar: {columnWidth: "25%"}},
                series: [{data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]}],
                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
                xaxis: {crosshairs: {width: 1},},
                colors: ["#5D78FF"],
                tooltip: {
                    fixed: {enabled: false}, x: {show: false}, y: {
                        title: {
                            formatter: function (f) {
                                return ""
                            }
                        }
                    }, marker: {show: false}
                }
            };
            new ApexCharts(document.querySelector("#countChart3"), a).render();
            e.render()
        });
        $(function () {
            'use strict';
            /////////////////////////////////////////////
            // Bar Chart
            /////////////////////////////////////////////

            // Bar Chart 1
            $.plot("#flotBar1", [{
                data: [
                    @foreach($year_sales as $interval=>$sales)

                    //  sağ kazanç sol blok aralığı
                    [{{$interval}}, {{$sales}}],
                    // [2, 8],
                    // [4, 5],
                    // [6, 13],
                    // [8, 5],
                    // [10, 7],
                    // [12, 4],
                    // [14, 6],
                    // [16, 7],
                    // [18, 10]
                    @endforeach

                ]
            }], {
                series: {
                    bars: {
                        show: true,
                        lineWidth: 0,
                        fillColor: '#5D78FF'
                    }

                },
                grid: {
                    borderWidth: 1,
                    borderColor: '#D9D9D9'
                },
                yaxis: {
                    tickColor: '#d9d9d9',
                    font: {
                        color: '#666',
                        size: 10
                    }
                },
                xaxis: {
                    tickColor: '#d9d9d9',
                    font: {
                        color: '#666',
                        size: 10
                    }
                }
            });

            /////////////////////////////////////////////
            // Pie Chart
            /////////////////////////////////////////////

            var piedata = [
            @foreach($best_selling_categories as $category=>$number)
                {
                    label: '{{ $category }}',
                    data: [
                        [1, {{ $number }}]
                    ],
                    color: '{{ $color[$color_int++] }}'
                },
            @endforeach

            ];

            // Pie Chart 1
            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 2 / 3,
                            formatter: labelFormatter,
                            threshold: 0.1
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });

            function labelFormatter(label, series) {
                return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
            }

        });

    </script>
@endsection
