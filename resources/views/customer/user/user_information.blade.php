@extends('customer.layouts.master')
@section('title', 'Kullanıcı Bilgileri')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Kullanıcı Bilgileri</h2>
            @include('customer.layouts.partials.alert')
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><span
                                class="text-black-50">{{ $user->email }}</span>
                            <span>Üyelik Tarihi: {{ $user->created_at }} </span>
                        </div>
                    </div>
                    <form action="{{ route('customer.user.information_update') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-5 border-right">
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Ad Soyad</label>
                                    <input type="text" class="form-control" placeholder="Ad soyad giriniz."
                                           name="name_surname" value="{{ $user->name_surname }}"></div>
                                <div class="col-md-12"><label class="labels">PhoneNumber</label>
                                    <input type="text" class="form-control" placeholder="Telefon numaranızı giriniz."
                                           name="mobile_phone" value="{{ $user->detail->mobile_phone }}"></div>
                                <div class="col-md-12"><label class="labels">Numara</label>
                                    <input type="text" class="form-control" placeholder="Numaranızı giriniz."
                                           name="phone" value="{{ $user->detail->phone }}"></div>
                                <div class="col-md-12"><label class="labels">Address</label>
                                    <input type="text" class="form-control" placeholder="Adresinizi giriniz."
                                           name="address" value="{{ $user->detail->address }}"></div>
                            </div>
                            <div class="mt-5 text-center">
                                <input class="btn btn-primary profile-button" type="submit" value="Profili Kaydet">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('footer')

@endsection
