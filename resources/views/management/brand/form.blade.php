@extends('management.layouts.master')
@section('title', 'Marka Yönetimi')
@section('header')
    <link type="text/css" rel="stylesheet" href="/management/plugins/summernote/summernote-bs4.css"/>
    <link type="text/css" rel="stylesheet" href="/management/plugins/bootstrap-select/css/bootstrap-select.min.css"/>
    <link type="text/css" rel="stylesheet" href="/management/plugins/dropzone/dropzone.css"/>
@endsection
@section('content')

    <div class="pageheader">
        <div class="row pd-t-5 pd-b-25 justify-content-between pd-x-20">
            <div class="pull-left">
                <h1 class="pd-0 mg-0 tx-20 text-overflow">
                    Marka Yönetimi
                </h1>
                <h6>Marka {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}</h6>
            </div>
        </div>
    </div>
    @include('layouts.partials.errors')
    @include('layouts.partials.alert')
    <form role="form" action="{{ route('management.brand.save', $entry->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="pageheader">
            <div class="row pd-t-5 pd-b-25 justify-content-between pd-x-20">
                <div class="pull-left">
                    <h1 class="pd-0 mg-0 tx-20 text-overflow">
                        Marka {{ $entry->id > 0 ? "Güncelle" : "Ekle" }}
                    </h1>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">
                        {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
                    </button>
                </div>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-10">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Genel Özellikler
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row mg-t-10">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Marka Adı</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control form-control-sm" id="brand_name"
                                       name="brand_name" placeholder="Marka Adı"
                                       value="{{ old('brand_name', $entry->brand_name) }}"/>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card mg-b-20">
                        <div class="card-header">
                            <h4 class="card-header-title">
                                resimler
                            </h4>
                            @if ($entry->brand_image!=null)
                                <img src="/uploads/brands/{{ $entry->brand_image }}"
                                     style="height: 100px; margin-right: 20px;" class="thumbnail pull-left">
                            @endif
                        </div>
                        <div class="card-body collapse show">
                            <label for="brand_image">Marka Resmi</label>
                            <input type="file" id="brand_image" name="brand_image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('footer')
    <script src="/management/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="/management/plugins/bootstrap-select/js/i18n/defaults-tr_TR.min.js"></script>
    <script src="/management/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="/management/plugins/dropzone/dropzone.js"></script>
@endsection
