<div class="page-container">
    <div class="page-sidebar">
        <div class="logo">
            <a class="logo-img" href="{{route('management.index')}}">
                <img class="desktop-logo" src="/management/images/logo.png" alt="">
                <img class="small-logo" src="/management/images/small-logo.png" alt="">
            </a>
            <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
        </div>
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="page-sidebar-inner" style="overflow: hidden; width: auto; height: 100%;">
                <div class="page-sidebar-menu">
                    <ul class="accordion-menu">
                        <li class="mg-20-force menu-extras">Menü</li>
                        <li class="active">
                            <a href="{{route('management.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Anasayfa</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                                <span>Site Yönetimi</span>
                                <i class="accordion-icon fa fa-angle-left"></i>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class=""><a href="https://localhost/admin/genelayar">Genel Ayarlar</a></li>
                                <li class=""><a href="https://localhost/admin/bakimmodu">Bakım Modu</a></li>
                                <li class=""><a href="https://localhost/admin/mailayar">Mail Ayarları</a></li>
                                <li class=""><a href="https://localhost/admin/yoneticiayar">Yönetici Ayarları</a></li>
                                <li class=""><a href="https://localhost/admin/urunyonetim">Ürün Yönetimi</a></li>
                                <li class=""><a href="https://localhost/admin/popupayar">Açılış Pop-up</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Modül Yönetimi</span>
                                <i class="accordion-icon fa fa-angle-left"></i>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class=""><a href="https://localhost/admin/api">Api Ayarları</a></li>
                                <li class=""><a href="https://localhost/admin/slider">Slider Ayarları</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                <span>Seo Yönetimi</span>
                                <i class="accordion-icon fa fa-angle-left"></i>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class=""><a href="https://localhost/admin/sayfaseo">Sayfa Seo Yönetimi</a></li>
                                <li class=""><a href="https://localhost/admin/urunseo">Ürün Seo Yönetimi</a></li>
                                <li class=""><a href="https://localhost/admin/kategoriseo">Kategori Seo Yönetimi</a></li>
                                <li class=""><a href="https://localhost/admin/markaseo">Marka Seo Yönetimi</a></li>
                            </ul>
                        </li>
                        <li class="mg-20-force menu-extras">E-Ticaret</li>
                        <li class="">
                            <a href="{{route('management.product')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                <span>Ürün Yönetimi</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('management.category')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                <span>Kategori Yönetimi</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('management.order')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                <span>Sipariş Yönetimi</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('management.user')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span>Üye Yönetimi</span>
                            </a>
                        </li>
                        <li class="mg-20-force menu-extras">Site Yönetimi</li>
                        <li class="">
                            <a href="https://localhost/admin/sayfa">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                <span>Sayfa Yönetimi</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/banner">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                <span>Banner Yönetimi</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/blog">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>Blog Yönetimi</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/sosyalmedya">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                <span>Sosyal Medya</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/bankahesap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                <span>Banka Hesapları</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/sss">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
                                <span>Sık Sorulan Sorular</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/sozlesmeler">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                <span>Sözleşmeler</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/duyurular">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                <span>Duyurular</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://localhost/admin/referans">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-merge"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M6 21V9a9 9 0 0 0 9 9"></path></svg>
                                <span>Referans</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><div class="slimScrollBar" style="background: rgb(255, 255, 255); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 50px; z-index: 99; right: 1px; height: 658.235px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 50px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
        <!--================================-->
        <!-- Sidebar Menu Start -->
        <!--================================-->
        <div class="page-sidebar-inner">
            <div class="page-sidebar-menu">
                <ul class="accordion-menu">

                    <li class="mg-20-force menu-extras"></li>
                    <li class="">
                        <a href="">
                            <i data-feather=">"></i>
                            <span><</span>
                            <i class="accordion-icon fa fa-angle-left"></i>
                        </a>
                        <ul class="sub-menu" style="">
                            <li class=""><a href=""></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="page-content">
        <div class="page-header">
            <nav class="navbar navbar-expand-lg">
                <ul class="list-inline list-unstyled mg-r-20 w-100 mb-0">
                    <li class="list-inline-item">
                        <a class="hidden-md hidden-lg ml-3 btn" href="#" id="sidebar-toggle-button"><i
                                class="ion-navicon tx-20"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn hidden hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i
                                class="ion-navicon tx-20"></i></a>
                    </li>
                    <li class="pull-right">
                        <a class="btn btn-success btn-md mt-1 hidden-xs" href="{{route('index')}}"><i
                                class="fa fa-eye tx-bold"></i><b class="mg-l-10 hidden-xs">Siteye Git</b></a>
                        <a class="btn btn-success btn-md mt-1 hidden-sm hidden-md hidden-lg" href=""
                           data-toggle="tooltip" data-trigger="hover" data-placement="right" title=""
                           data-original-title="Siteye Git"><i class="fa fa-eye tx-bold"></i></a>
                    </li>
                    <li class="pull-right">
                        <a class="btn btn-success btn-md mt-1 hidden-xs" href="{{route('management.logout')}}"><i
                                class="fa fa-eye tx-bold"></i><b class="mg-l-10 hidden-xs">Çıkış yap</b></a>
                    </li>
                </ul>
            </nav>
            <div class="page-inner">
                <!-- Main Wrapper -->
                <div id="main-wrapper" class="pd-y-30">


