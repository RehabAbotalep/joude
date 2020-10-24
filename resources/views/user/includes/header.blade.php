<!--Preloader start here-->
<div class="preloader">
    <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
    </div>
</div>
<!--Preloader area end here-->
<a class="top" title="top" href="#"><span>Top</span></a>
<header class="header_top">
    <div class="top_block">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-9 col-xs-12">
                    <div class="account">
                        <ul class="list_acountdrop list_acountdrop_hsap">
                            <li class="dropup">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    @if (auth()->user())

                                        {{auth()->user()->name}}
                                    @endif
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu_hsap show_drop">
                                    @if (auth()->user())
                                        <li><a href="{{ route('user.account') }}">{{ trans('messages.my.account') }}</a></li>
                                    @else
                                        <li><a href="{{ route('user.register') }}">{{ trans('messages.sign.up') }}</a></li>
                                    @endif
                                    <li><a href="{{ route('orderCard.view') }}">{{ trans('messages.card.order') }}</a></li>
                                    <li><a href="{{ route('about.us') }}">{{ trans('messages.about.us') }}</a></li>
                                    
                                    <li><a href="{{ route('faqs.index') }}">{{ trans('messages.faq') }}</a></li>
                                    <li><a href="{{ route('terms.condition') }}">{{ trans('messages.terms') }}</a></li>
                                    <li><a href="{{ route('contact.get') }}">{{ trans('messages.contact.us') }}</a></li>
                                    @if(App::getLocale() == 'en')
                                    <li><a href="{{ url('locale/ar') }}">{{trans('messages.ar')}}</a></li>
                                    @else
                                    <li><a href="{{ url('locale/en') }}">{{trans('messages.en')}}</a></li>
                                    @endif
                                    @if (auth()->user())
                                    <li><a href="{{ route('my.cards') }}">{{ trans('messages.my.cards') }}</a></li>
                                    <li><a class="logout" href="">{{ trans('messages.logout') }}</a></li>
                                    @else
                                        <li><a href="{{ route('user.login') }}">{{ trans('messages.login') }}</a></li>
                                    @endif
                                </ul>
                                <!--dropdown-menu-->
                            </li>
                        </ul>
                        <!--list_acountdrop-->
                    </div>
                    <!--account-->
                    <!--list_mails-->
                    <ul class="list_mails">
                        <?php $setting = App\Setting::first();?>
                        <li><i class="fas fa-mobile-alt"></i><span> {{trans('messages.mobile')}} :</span> {{$setting->phone}} </li>
                        <li><i class="fas fa-clock"></i><span>{{trans('messages.today')}} :</span> {{$setting->working_hours}} </li>
                        <!-- <li><i class="fas fa-envelope"></i><span> Email :</span> Card@gmail.com </li> -->
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 col-xs-12">
                    <ul class="nav nav-pills list_social align_center">
                        <li><a target="_blank" href="{{$setting->twitter_url}}"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="{{$setting->facebook_url}}"><i class="fab fa-facebook"></i></a></li>
                        <li><a target="_blank" href="{{$setting->instgrame_url}}"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>
    <!--top_block-->
    <div class="headed_logo_block">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="header_calls">
                        <div class="icon_text clearfix media">
                            <div class="media-left icon_"><span class="flaticon-email"></span></div>
                            <div class="text">
                                <h5 class="this-subtitle">{{trans('messages.email')}}</h5>
                                <h5 class="this-title"><a href="{{$setting->email}}">info@appjoud.com</a></h5>
                            </div>
                        </div>
                    </div>
                    <!--col-md-4-->
                </div>
                <!--col-md-4-->
                <div class="col-md-4">
                    <div class="logo">
                        <a href="#"><img src="{{asset('user/ar/img/logo1.png')}}"></a>
                    </div>
                </div>
                <!--col-md-4-->
                <div class="col-md-4">
                    <div class="header_calls header_calls2">
                        <div class="icon_text clearfix media">
                            <div class="text">
                                <h5 class="this-subtitle">Egypt , Cairo</h5>
                                <h3 class="this-title">{{ trans('messages.company.address') }} </h3>
                            </div>
                            <div class="media-right icon_"><span class="flaticon-international-delivery"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!--col-md-4-->
        </div>
        <!--row-->
    </div>
    <!--container-->
</div>
<!--headed_logo_block-->
<div class="head-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="nav_menu">
                    <nav>
                        <a href="#"><i class="fa fa-bars fa-2x"></i></a>
                        <ul class="list_nav">
                            <li class="current">
                                <div>
                                    <a href="{{ route('home') }}" data-hover="{{trans('messages.home')}}">{{trans('messages.home')}}</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="{{ route('about.us') }}" data-hover="{{trans('messages.about.us')}}">{{trans('messages.about.us')}}</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="" data-hover="{{trans('messages.how.it.works')}}">{{trans('messages.how.it.works')}}</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="{{ route('outlets.index') }}" data-hover="{{trans('messages.stores')}}">{{trans('messages.stores')}}</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="{{ route('vouchers') }}" data-hover="{{trans('messages.vouchers')}}">{{trans('messages.vouchers')}}</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="{{ route('contact.get') }}" data-hover="{{trans('messages.contact.us')}}">{{trans('messages.contact.us')}}</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--nav_menu-->
            </div>
            <!--col-sm-9 col-xs-6-->
        </div>
        <!--row-->
    </div>
    <!--header_nav-->
</div>
<!--head-bar-->
</header>
<!--header_top-->


