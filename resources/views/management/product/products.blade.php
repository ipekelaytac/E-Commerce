@extends('management.layouts.master')
@section('title', 'Ürünler')
@section('header')
    <link type="text/css" rel="stylesheet" href="/management/plugins/datatables/jquery.dataTables.min.css"/>
    <link type="text/css" rel="stylesheet" href="/management/plugins/datatables/extensions/dataTables.jqueryui.min.css"/>
@endsection
@section('content')

    <div class="pageheader">
        <div class="row pd-t-5 pd-b-25 justify-content-between pd-x-20">
            <div class="pull-left"><h1 class="pd-0 mg-0 tx-20 text-overflow">Ürünler</h1></div>
            <div class="pull-right">
                <a href="{{route('management.product.add')}}" class="btn btn-success">Yeni Ekle</a>
            </div>
        </div>
    </div>
    @include('management.layouts.partials.alert')

    <div class="row row-xs">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Ürün Listesi
                    </h4>
                    <div class="card-header-btn">
                        <a href="#" data-toggle="collapse" class="btn card-collapse"
                           data-target="#productSalesDetails" aria-expanded="true"><i
                                class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i
                                class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i
                                class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i
                                class="ion-ios-trash-outline"></i></a>
                    </div>
                </div>
                <div class="card-body pd-0 collapse show" id="productSalesDetails">
                    <div class="table-responsive">
                        <table id="basicDataTable" class="table card-table tx-center">
                            <thead class="tx-10 tx-uppercase">
                            <tr>
                                <th class="wd-1">Resim</th>
                                <th class="wd-1">ID</th>
                                <th>Ürün Adı</th>
                                <th>Satış Fiyatı</th>
                                <th>Kayıt Tarihi</th>
                                <th class="tx-center">Eylemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($list) == 0)
                                <tr><td colspan="7" class="align-middle">Kayıt bulunamadı!</td></tr>
                            @endif
                            @foreach($list as $entry)
                            <tr>
                                <td class="align-middle" style="width: 75px">
                                    <img class="wd-50" class="img-responsive"  src="{{ $entry->detail->product_image!=null ? asset('uploads/products/' . $entry->detail->product_image) : 'https://via.placeholder.com/200?text=UrunResmi' }}" alt="">
                                </td>
                                <td class="align-middle">{{ $entry->id }}</td>
                                <td class="align-middle">{{ $entry->product_name }}</td>
                                <td class="align-middle">{{ round($entry->price, 2) }}</td>
                                <td class="align-middle">{{ $entry->created_at }}</td>
                                <td class="tx-center">
                                    <div class="dropdown">
                                        <a href="" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false"><i class="icon-options"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-item"><a class="dropdown-link tx-13 tx-gray-500" href="{{ route('management.product.delete' , $entry->id) }}"><i class="icon-close mr-2"></i>Sil</a></li>
                                            <li class="dropdown-item"><a class="dropdown-link tx-13 tx-gray-500" href="{{ route('management.product.update' , $entry->id) }}"><i class="icon-note mr-2"></i>Düzenle</a></li>
                                            </li>
                                        </ul>
                                    </div>
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
@endsection
@section('footer')
    <script src="/management/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/management/plugins/datatables/responsive/dataTables.responsive.js"></script>
    <script src="/management/plugins/datatables/extensions/dataTables.jqueryui.min.js"></script>
    <script>
        // Basic DataTable
        $('#basicDataTable').DataTable({
        });
    </script>
@endsection
