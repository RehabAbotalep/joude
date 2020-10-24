<section class="clients_block">
        <div class="container">


            <div class="row">
                <div class="col-lg-12">
                    <div class="title_style2 title_style2_black text-center">
                        <h2>{{ trans('messages.our.customer') }}</h2>
                        <div class="intitle_style">
                            <div class="decor_dashle"><span></span></div>
                            <p></p>
                            <div class="decor_dashri"><span></span></div>
                        </div>
                        <!--intitle_style-->
                        <div class="title_style2_par">
                            <p></p>
                        </div>
                        <!--title_style2_par-->
                    </div>
                    <!--title_style2-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
            <div class="clearfix"></div>
            <!--clearfix-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-clients owl-theme">
                        <?php $stores = App\Store::where('is_favourite',1)->get();?>
                        @foreach($stores as $store)
                           <!--item-->
                        <div class="item">
                            <div class="clients_blog">
                                <a href="javascript:void(0)">
                                    <img src="{{ $store->image }}">
                                </a>
                            </div>
                        </div> 
                        @endforeach
                        

                    </div>
                    <!--carousel3-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="readmore-button readmore-button2">
                        <a href="{{ route('outlets.index') }}">{{ trans('messages.customer.more') }}</a>
                    </div>
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->

        </div>
        <!--container-->
</section>
    <!--clients_block-->


<!--Start footer area-->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-5 col-sm-12">
                <div class="single-footer-widget marbtm50">
                    <div class="title">
                        <h3>{{trans('messages.about.company')}}</h3>
                        <div class="decor"><span></span></div>
                    </div>
                    <div class="footer-company-info-text">
                        <?php
                        $about = App\MobilePage::where('slug','about_us')->first();
                        $language = app()->getLocale();
                        ?>
                        <p>
                            @if($language == 'ar')
                            {!!($about->content_ar)!!}
                            @else
                            {!!($about->content_en)!!}
                            @endif
                        </p>
                        <a href="{{ route('about.us') }}">{{ trans('messages.more.about') }} <span class="fas fa-arrow-right"></span></a>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->
            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-7 col-sm-12">
                <div class="single-footer-widget useful-links-box marbtm50">
                    <div class="title">
                        <h3>{{trans('messages.useful.links')}}</h3>
                        <div class="decor"><span></span></div>
                    </div>
                    <div class="usefull-links">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <ul>
                                    <li><a href="{{ route('about.us') }}">{{trans('messages.about.us')}}</a></li>
                                    <li><a href="#">{{trans('messages.how.it.works')}}</a></li>
                                    <li><a href="#">{{trans('messages.stores')}}</a></li>
                                    <li><a href="#">{{trans('messages.vouchers')}}</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <ul>
                                    <li><a href="#">{{trans('messages.users')}}</a></li>
                                    <li><a href="{{ route('faqs.index') }}">{{trans('messages.faq')}}</a></li>
                                    <li><a href="{{ route('terms.condition') }}">{{trans('messages.terms')}}</a></li>
                                    @if(App::getLocale() == 'en')
                                    <li><a href="{{ url('locale/ar') }}">{{trans('messages.ar')}}</a></li>
                                    @else
                                    <li><a href="{{ url('locale/en') }}">{{trans('messages.en')}}</a></li>
                                    @endif
                                    <li><a href="{{ route('contact.get') }}">{{trans('messages.contact.us')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->
            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-6 col-sm-12 clearres">
                <div class="single-footer-widget pdbtm50">
                    <div class="title">
                        <h3>News & Updates</h3>
                        <div class="decor"><span></span></div>
                    </div>
                    <ul class="recent-news">
                        <li>
                            <div class="img-holder">
                                <img src="{{asset('user/ar/img/recent-news-1.jpg')}}" alt="Awesome Image">
                                <div class="overlay-style-one bg1">
                                    <div class="box">
                                        <div class="content">
                                            <a href="#"><span class="fas fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-holder">
                                <p>March 10, 2019</p>
                                <h5><a href="#">Lorem Ipsum is simply dummy <br> text of the printing...</a></h5>
                            </div>
                        </li>
                        <li>
                            <div class="img-holder">
                                <img src="{{asset('user/ar/img/recent-news-2.jpg')}}" alt="Awesome Image">
                                <div class="overlay-style-one bg1">
                                    <div class="box">
                                        <div class="content">
                                            <a href="#"><span class="fas fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-holder">
                                <p>March 02, 2019</p>
                                <h5><a href="#">Lorem Ipsum is simply dummy <br> text of the printing...</a></h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--End single footer widget-->
            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="single-footer-widget">
                    <div class="title">
                        <h3>Newsletter</h3>
                        <div class="decor"><span></span></div>
                    </div>
                    <div class="subscribe-box">
                        <div class="text">
                            <p><span>*</span>Subscribe us & get latest updates.</p>
                        </div>
                        <form class="subscribe-form" action="#">
                            <input type="email" name="email" placeholder="Your Email">
                            <button type="submit">Subscribe<span class="flaticon-next"></span></button>
                        </form>
                        <div class="footer-social-links">
                            <ul class="social-links-style1">
                                <?php
                                $setting = App\Setting::first();
                                ?>
                                <li>
                                    <a class="envelop" href="{{$setting->email}}"><i class="fas fa-envelope"
                                    aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a class="fb" target="_blank" href="{{$setting->facebook_url}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a class="tw" target="_blank" href="{{$setting->twitter_url}}"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li><a class="fb" target="_blank" href="{{$setting->instgrame_url}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->
        </div>
    </div>
</footer>
<!--End footer area-->
<!--Start footer bottom area-->
<section class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="footer-bottom-content text-center">
                    <div class="copyright-text">
                        <p>© {{ trans('messages.rights') }} <a href="#">Joude Card</a> 2020 </p>
                        <p>{{ trans('messages.design.by') }}<span><a target="_blank" href="http://tremno.com/">Tremno</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End footer bottom area-->
<!--__________pop_up___________-->
<div class="pops_detail pops_detail1">
    <div class="mcontent">
        <div class="close_pop">
            <i class="fas fa-times"></i>
        </div>
        <div class="head_pops">
            <h3>{{ trans('messages.sure.logout') }}</h3>
        </div>
        <div class="details_popup">
            <div class="formpopup2">
                <form>
                    <div class="submit_button">
                        <button class="btn btn-success" type="submit" formaction="{{ route('user.logout') }}">{{ trans('messages.yes') }}</button>
                        <button class="btn btn-danger">{{ trans('messages.no') }}</button>
                    </div>
                    <!--submit_button-->
                </form>
            </div>
            <!--formpopup-->
        </div>
        <!--details_popup-->
    </div>
    <!--mcontent-->
</div>
<!--pops_detail-->
<div class="md-overlay"></div>

    <!--mixitup-->
    <script src="js/script.js"></script>

<!--__________pop_up___________-->
@if(App::getLocale() == 'ar')
    <script src="{{asset('user/ar/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('user/ar/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('user/ar/js/jquery-ui.js')}}"></script>
    <script>
    $(function() {
    $(".datepicker").datepicker({
    changeMonth: true,
    changeYear: true
    });
    });
    </script>

    <!--______calender_______-->
    <script src="{{asset('user/ar/js/bootstrap.min.js')}}"></script>
    <script src='{{asset('user/ar/js/script_wow.js')}}'></script>
    <script src="{{asset('user/ar/js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('user/ar/js/index.js')}}"></script>
@else
    <script src="{{asset('user/en/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('user/en/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('user/en/js/jquery-ui.js')}}"></script>
    <script>
    $(function() {
    $(".datepicker").datepicker({
    changeMonth: true,
    changeYear: true
    });
    });
    </script>
    <!--______calender_______-->
    <script src="{{asset('user/en/js/bootstrap.min.js')}}"></script>
    <script src='{{asset('user/en/js/script_wow.js')}}'></script>
    <script src="{{asset('user/en/js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('user/en/js/index.js')}}"></script>
@endif
@yield('script')