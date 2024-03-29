@extends('management.layouts.master')
@section('title', 'Siparişler')
@section('header')
    <link type="text/css" rel="stylesheet" href="/management/plugins/datatables/jquery.dataTables.min.css"/>
    <link type="text/css" rel="stylesheet" href="/management/plugins/datatables/extensions/dataTables.jqueryui.min.css"/>
@endsection
@section('content')
    @include('management.layouts.partials.alert')

    <div class="row row-xs">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Sipariş Listesi
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
                                <th>Sipariş Kodu</th>
                                <th>Müşteri</th>
                                <th>Tutar</th>
                                <th>Durum</th>
                                <th>Sipariş Tarihi</th>
                                <th class="tx-center">Eylemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($list) == 0)
                                <tr><td colspan="7" class="text-center">Kayıt bulunamadı!</td></tr>
                            @endif
                            @foreach ($list as $entry)
                                <tr>
                                    <td class="align-middle">SP-{{ $entry->id }}</td>
                                    <td class="align-middle">{{ $entry->name_surname }}</td>
                                    <td class="align-middle">{{ $entry->order_price * ((100 + config('cart.tax'))/100) }} ₺</td>
                                    <td class="align-middle">{{ $entry->situation }}</td>
                                    <td class="align-middle">{{ $entry->created_at }}</td>
                                    <td class="tx-center">
                                        <div class="dropdown">
                                            <a href="" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false"><i class="icon-options"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-item"><a class="dropdown-link tx-13 tx-gray-500" href="{{ route('management.order.delete', $entry->id) }}"><i class="icon-close mr-2"></i>Sil</a></li>
                                                <li class="dropdown-item"><a class="dropdown-link tx-13 tx-gray-500" href="{{ route('management.order.update', $entry->id) }}"><i class="icon-note mr-2"></i>Düzenle</a></li>
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
