@extends('management.layouts.master')
@section('title', 'Kategori Yönetimi')
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
                    Kategori Yönetimi
                </h1>
                <h6>Kategori {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}</h6>
            </div>
        </div>
    </div>
    <form role="form" action="{{ route('management.category.save', $entry->id) }}" method="POST">
        {{ csrf_field() }}
        @include('layouts.partials.errors')
        @include('layouts.partials.alert')
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
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Üst Kategori</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select name="top_id" id="top_id" class="form-control">
                                    <option value="">Ana Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('top_id', $entry->top_id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Kategori Adı</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control form-control-sm" id="category_name"
                                       name="category_name" placeholder="Kategori Adı"
                                       value="{{ old('category_name', $entry->category_name) }}"/>
                            </div>
                        </div>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">
                                {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
                            </button>
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
    <script>
        //Multiple Summernote Editor
        $(document).ready(function () {
            $(".summernote").summernote({
                height: 150,
            });
        });
    </script>
@endsection
