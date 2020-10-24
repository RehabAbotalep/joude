@extends('user.app')
@section('style') 
@endsection

@section('main-content')

	 <section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{trans('messages.my.account')}} </h2>
                        <div class="decor"><span></span></div>
                    </div>
                    <!--titlepages-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--slider_block-->
    <section class="blocks_sections shared_block accountpage">
        <div class="appointment-faq-bg wow zoomInLeft" data-wow-delay="0.5s"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_style">
                        <div class="title">{{ trans('messages.account.page') }}.</div>
                        <div class="decor"><span></span></div>
                    </div>
                    <!--title_style-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
            <div class="row">
                <div class="col-lg-12">
                    @if ($sucess = Session::get('status'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $sucess }}</strong>
                        </div>
                    @endif
                    <div class="account_blog login_blog">

                        <div class="account_blogrows media">
                            <div class="details_account media-body">
                                <ul>
                                    <li>
                                        <i class="fas fa-user-circle"></i>
                                        <label>{{ trans('messages.name') }} :</label> {{ $user->name }}
                                    </li>
                                    <li>
                                        <i class="fas fa-mobile-alt"></i>
                                        <label>{{ trans('messages.mobile') }} :</label> {{ $user->mobile }}
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <label>{{ trans('messages.email') }} :</label> {{ $user->email }}
                                    </li>
                                    <li>
                                        <i class="fas fa-lock"></i>
                                        <label>{{ trans('messages.password') }} :</label> 
                                    </li>
                                </ul>
                                <div class="readmore-button readmore-button2">

                                    <a href="{{ route('update.get') }}">{{ trans('messages.edit.data') }}</a>
                                </div>
                                <!--details_account -->
                            </div>
                            <!-- details_account -->
                        </div>
                        <!--account_blogrows-->
                    </div>
                    <!--login_blog-->

                </div>
                <!--col-md-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--start_blockhome-->
@endsection