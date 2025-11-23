@extends('management.layouts.master')
@section('title', 'Siparişler')
@section('header')

@endsection
@section('content')
    <h1 class="page-header">Sipariş Yönetimi</h1>

    <form method="post" action="{{ route('management.order.save', $entry->id) }}">
        {{ csrf_field() }}
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
            </button>
        </div>
        <h3 class="sub-header">
            Sipariş {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
        </h3>

        @include('management.layouts.partials.errors')
@include('management.layouts.partials.alert')

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="adsoyad">Ad Soyad</label>
                    <p>{{ $entry->name_surname}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="telefon">Telefon</label>
                    <p>{{ $entry->phone }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ceptelefonu">Cep Telefonu</label>
                    <p>{{ $entry->mobile_phone}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="adres">Adres</label>
                    <p>{{$entry->address }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="situation">Durum</label>
                    <select name="situation" class="form-control" id="situation">
                        <option {{ old('situation', $entry->situation) == 'Siparişiniz alındı' ? 'selected' : '' }}>Siparişiniz alındı</option>
                        <option {{ old('situation', $entry->situation) == 'Ödeme onaylandı' ? 'selected' : '' }}>Ödeme onaylandı</option>
                        <option {{ old('situation', $entry->situation) == 'Kargoya verildi' ? 'selected' : '' }}>Kargoya verildi</option>
                        <option {{ old('situation', $entry->situation) == 'Sipariş tamamlandı' ? 'selected' : '' }}>Sipariş tamamlandı</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <h3>Sipariş (SP-{{ $entry->id }})</h3>
    <table class="table table-bordererd table-hover">
        <tr>
            <th colspan="2">Ürün</th>
            <th>Tutar</th>
            <th>Adet</th>
            <th>Ara Toplam</th>
            <th>Durum</th>
        </tr>
        @foreach($entry->MainCart->cartproducts as $cart_product)
            <tr>
                <td style="width:120px">
                    <a href="{{ route('management.product', $cart_product->slug) }}">
                        <img src="{{ $cart_product->product->detail->product_image!=null ? asset('uploads/products/' . $cart_product->product->detail->product_image) : 'http://via.placeholder.com/120x100?text=UrunResmi' }}" style="height: 120px;">
                    </a>
                </td>
                <td>
                    <a href="{{ route('management.product', $cart_product->slug) }}">
                        {{ $cart_product->product_name }}
                    </a>
                </td>
                <td>{{ $cart_product->price }} ₺</td>
                <td>{{ $cart_product->number }}</td>
                <td>{{ $cart_product->price * $cart_product->number }} ₺</td>
                <td>{{ $cart_product->situation }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="4" class="text-right">Toplam Tutar</th>
            <td colspan="2">{{ $entry->order_price,2 }} ₺</td>
        </tr>
        <tr>
            <th colspan="4" class="text-right">Toplam Tutar (KDV'li)</th>
            <td colspan="2">{{ $entry->order_price* ((100+config('cart.tax'))/100) }} ₺</td>
        </tr>
        <tr>
            <th colspan="4" class="text-right">Sipariş Durumu</th>
            <td colspan="2">{{ $entry->situation }}</td>
        </tr>
    </table>
@endsection
@section('footer')

@endsection
