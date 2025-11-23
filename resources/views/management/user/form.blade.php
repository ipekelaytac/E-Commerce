@extends('management.layouts.master')
@section('title', 'Kullanıcı Yönetimi')
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
                    Kullanıcı Yönetimi
                </h1>
                <h6>Kullanıcı {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}</h6>
            </div>
        </div>
    </div>
    <form role="form" action="{{ route('management.user.save', $entry->id) }}" method="POST">
        {{ csrf_field() }}
        @include('management.layouts.partials.errors')
@include('management.layouts.partials.alert')
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
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Ad
                                Soyad</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control form-control-sm" id="name_surname"
                                       name="name_surname" placeholder="Ad Soyad"
                                       value="{{ old('name_surname', $entry->name_surname) }}"/>
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>email</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="email" class="form-control form-control-sm" id="email" name="email"
                                       placeholder="Email"
                                       value="{{ old('email', $entry->email) }}">
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>sifre</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" class="form-control form-control-sm" id="password"
                                       name="password" placeholder="Şifre">
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>adres</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control form-control-sm" id="address" name="address"
                                       placeholder="Adres"
                                       value="{{ old('address', $entry->detail->address) }}">
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <label class="col-sm-4 form-control-label"><span
                                    class="tx-danger">*</span>telefon</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control form-control-sm" id="phone" name="phone"
                                       placeholder="Telefon"
                                       value="{{ old('phone', $entry->detail->phone) }}">
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>cep
                                telefonu</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control form-control-sm" id="mobile_phone"
                                       name="mobile_phone" placeholder="Cep Telefonu"
                                       value="{{ old('mobile_phone', $entry->detail->mobile_phone) }}">
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <label class="col-sm-4 form-control-label">Kullanıcı:</label>
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="isit_active" value="0">
                                    <input type="checkbox" name="isit_active"
                                           value="1" {{ old('isit_active', $entry->isit_active) ? 'checked' : '' }}>
                                    Aktif Mi
                                </label>
                            </div>

                        </div>
                        <div class="row mg-t-10">
                            <label class="col-sm-4 form-control-label">Kullanıcı:</label>
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="isit_executive" value="0">
                                    <input type="checkbox" name="isit_executive"
                                           value="1" {{ old('isit_executive', $entry->isit_executive) ? 'checked' : '' }}>
                                    Yönetici Mi
                                </label>
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
