@extends('customer.layouts.master')
@section('title', 'İletişim')
@section('head')
    <link href="{{ asset('customer/css/contact.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('customer.layouts.partials.alert')

    <main class="bg_gray">

        <div class="container margin_60">
            <div class="main_title">
                <h2>İletişim Aytaç ipekel</h2>
                <p>Bizimle iletişime geçip isteklerinizi, şikayetlerinizi ve sorularınızı iletebilirsiniz. </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="ti-support"></i>
                        <h2>Aytaç ipekel Yardım Merkezi</h2>
                        <a href="#0">+90 535-607-18-20</a> - <a href="#0">info@aytacipekel.com</a>
                        <small>Paz dan Cuma 09:00-17:00 </small>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="ti-map-alt"></i>
                        <h2>Aytaç ipekel Ofis</h2>
                        <div>Avrupa, İstanbul</div>
                        <small>Paz / Cuma 09:00-17:00 </small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="ti-package"></i>
                        <h2>Aytaç ipekel Depo</h2>
                        <a href="#0">+90 535-607-18-20</a> - <a href="#0">info@aytacipekel.com</a>
                        <small>Paz / Cuma 09:00-17:00 </small>

                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        <div class="bg_white">
            <div class="container margin_60_35">
                <h4 class="pb-3">Bizel Ulaşın</h4>
                <div class="row">
                    <div class="col-lg-4 col-md-6 add_bottom_25">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Ad Soyad *">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email *">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" style="height: 150px;" placeholder="Mesaj *"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="btn_1 full-width" type="submit" value="Gönder">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 add_bottom_25">
                        <iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d288.0658365251548!2d28.881693775577958!3d41.03862915252431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1str!2str!4v1676831228640!5m2!1str!2str"
                                style="border: 0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_white -->
    </main>

@endsection
@section('js')
@endsection
