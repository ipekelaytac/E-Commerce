<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_1">Menü</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="{{route('customer.index')}}">Anasayfa</a></li>
                        <li><a href="{{route('customer.contact')}}">İletişim</a></li>
                        <li><a href="{{route('customer.about_us')}}">Hakkımızda</a></li>
                        <li><a href="{{route('customer.user.information')}}">Hesabım</a></li>
                        <li><a href="#">S.S.S</a></li>
                        <li><a href="#">Yardım</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_2">Kategoriler</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('customer.categories', $category->slug) }}">{{ $category->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_3">İletişim</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i>Avrupa<br>İstanbul - TR</li>
                        <li><i class="ti-headphone-alt"></i>+90 535-607-18-20</li>
                        <li><i class="ti-email"></i><a href="#0">info@aytacipekel.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_4">Abone Ol</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <form class="form-inline" method="post" action="{{route('customer.subscriber')}}">
                                {{csrf_field()}}
                            <input type="email" id="email_newsletter" class="form-control" name="email" placeholder="Email Giriniz">
                            <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                            </form>

                        </div>
                    </div>
                    <div class="follow_us">
                        <h5>Takip Et</h5>
                        <ul>
                            <li><a href="https://aytacipekel.com/" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="customer/img/twitter_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="https://aytacipekel.com/" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="customer/img/facebook_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="https://instagram.com/aytacipekel" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="customer/img/instagram_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="https://aytacipekel.com/" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="customer/img/youtube_icon.svg" alt="" class="lazy"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix">
{{--                    <li>--}}
{{--                        <div class="styled-select lang-selector">--}}
{{--                            <select>--}}
{{--                                <option value="English" selected>English</option>--}}
{{--                                <option value="French">French</option>--}}
{{--                                <option value="Spanish">Spanish</option>--}}
{{--                                <option value="Russian">Russian</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="styled-select currency-selector">--}}
{{--                            <select>--}}
{{--                                <option value="US Dollars" selected>US Dollars</option>--}}
{{--                                <option value="Euro">Euro</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                    <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="customer/img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <li><a href="#0">Şartlar ve Koşullar</a></li>
                    <li><a href="#0">Gizlilik</a></li>
                    <li><span>© 2023 <a href="https://aytacipekel.com" target="_blank">Aytacipekel</a></span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
