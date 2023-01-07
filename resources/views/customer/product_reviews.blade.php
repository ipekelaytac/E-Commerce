@extends('customer.layouts.master')
@section('title', 'Değerlendir')
@section('head')
    <link href="{{ asset('customer/css/leave_review.css') }}" rel="stylesheet">

@endsection
@section('content')

    <main>


        <div class="container margin_60_35">

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="write_review">
                        <h1>Write a review for Armor Air X Fear</h1>
                        <div class="rating_submit">
                            <div class="form-group">
                                <label class="d-block">Puan Ver</label>
                                <span class="rating mb-0">
								<input type="radio" class="rating-input" id="5_star" name="rating-input"
                                       value="5 Stars"><label for="5_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="4_star" name="rating-input"
                                       value="4 Stars"><label for="4_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="3_star" name="rating-input"
                                       value="3 Stars"><label for="3_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="2_star" name="rating-input"
                                       value="2 Stars"><label for="2_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="1_star" name="rating-input" value="1 Star"><label
                                        for="1_star" class="rating-star"></label>
							</span>
                            </div>
                        </div>
                        {{--                        <!-- /rating_submit -->--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Yorum </label>--}}
                        {{--                            <input class="form-control" type="text" placeholder="If you could say it in one sentence, what would you say?">--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <label>Yorum yap</label>
                            <textarea class="form-control" style="height: 180px;"
                                      placeholder="Ürün ile ilgili görüşlerini paylaş."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Fotoğraf Ekle (isteğe bağlı)</label>
                            <div class="fileupload"><input type="file" name="fileupload" accept="image/*"></div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <div class="checkboxes float-left add_bottom_15 add_top_15">--}}
                        {{--                                <label class="container_check">Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.--}}
                        {{--                                    <input type="checkbox">--}}
                        {{--                                    <span class="checkmark"></span>--}}
                        {{--                                </label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <a href="confirm.html" class="btn_1">Paylaş</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>

@endsection
@section('js')
@endsection
