@extends('management.layouts.master')
@section('title', 'Ürün Ekle')
@section('header')
    <link type="text/css" rel="stylesheet" href="/management/plugins/summernote/summernote-bs4.css"/>
    <link type="text/css" rel="stylesheet" href="/management/plugins/bootstrap-select/css/bootstrap-select.min.css"/>
    <link type="text/css" rel="stylesheet" href="/management/plugins/dropzone/dropzone.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')

    @include('layouts.partials.errors')
    @include('layouts.partials.alert')
    <form action="{{ route('management.product.save', $entry->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="pageheader">
            <div class="row pd-t-5 pd-b-25 justify-content-between pd-x-20">
                <div class="pull-left">
                    <h1 class="pd-0 mg-0 tx-20 text-overflow">
                        Ürün {{ $entry->id > 0 ? "Güncelle" : "Ekle" }}
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
                    <div class="card-body collapse show">
                        <div class="row">
                            <div class="col-xl-12 mg-t-10 mg-xl-t-0">
                                <div class="row">
                                    <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Kategori</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <select class="form-control form-control-sm" id="categories" name="categories[]"
                                                 multiple>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{ $category->id }}"{{ collect(old('categories', $product_category))->contains($category->id) ? 'selected': '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Ürün
                                        ismi</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control form-control-sm" name="product_name"
                                               value="{{ old('product_name', $entry->product_name) }}"/>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Satış
                                        Fiyatı</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control form-control-sm" name="price"
                                               value="{{ old('price', $entry->price) }}" required/>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Öne
                                        Çıkar</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="show_slider" value="0">
                                            <input type="checkbox" name="show_slider"
                                                   value="1" {{ old('show_slider', $entry->detail->show_slider) ? 'checked' : '' }}>
                                            Slider'da Göster
                                        </label>
                                        <label>
                                            <input type="hidden" name="show_opportunity_of_the_day" value="0">
                                            <input type="checkbox" name="show_opportunity_of_the_day"
                                                   value="1" {{ old('show_opportunity_of_the_day', $entry->detail->show_opportunity_of_the_day) ? 'checked' : '' }}>
                                            Günün Fırsatında Göster
                                        </label>
                                        <label>
                                            <input type="hidden" name="show_featured" value="0">
                                            <input type="checkbox" name="show_featured"
                                                   value="1" {{ old('show_featured', $entry->detail->show_featured) ? 'checked' : '' }}>
                                            Öne Çıkan Alanında Göster
                                        </label>
                                        <label>
                                            <input type="hidden" name="show_lots_selling" value="0">
                                            <input type="checkbox" name="show_lots_selling"
                                                   value="1" {{ old('show_lots_selling', $entry->detail->show_lots_selling) ? 'checked' : '' }}>
                                            Çok Satan Ürünlerde Göster
                                        </label>
                                        <label>
                                            <input type="hidden" name="show_discount" value="0">
                                            <input type="checkbox" name="show_discount"
                                                   value="1" {{ old('show_discount', $entry->detail->show_discount) ? 'checked' : '' }}>
                                            İndirimli Ürünlerde Göster
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Metin Ayarları
                        </h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="row">
                            <div class="col-xl-12 mg-t-10 mg-xl-t-0">
                                <div class="row mg-t-10">
                                    <label class="col-sm-12 col-xl-2 form-control-label">
                                        <span class="tx-danger w-100">*</span>Açıklaması
                                        <p>
                                            <small>Ürünle ilgili açıklama giriniz</small>
                                        </p>
                                    </label>
                                    <div class="col-sm-12 col-xl-10 mg-t-10 mg-sm-t-0">
                                        <textarea class="summernote" placeholder=""
                                                  name="comment"
                                                  >{{ old('comment', $entry->comment) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    @if ($entry->detail->product_image!=null)
                        <img src="/uploads/products/{{ $entry->detail->product_image }}"
                             style="height: 100px; margin-right: 20px;" class="thumbnail pull-left">
                    @endif
                </div>
                <div class="card-body collapse show">
                <label for="product_image">Ürün Resmi</label>
                    <input type="file" id="product_image" name="product_image">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        //Multiple Summernote Editor
        $(document).ready(function () {
            $(".summernote").summernote({
                height: 150,
            });
        });
        $(function () {
            $('#categories').select2({
                placeholder: 'Lütfen kategori seçiniz'
            });
        });
    </script>
@endsection

