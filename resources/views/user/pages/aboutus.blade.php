@extends('user.app')
@section('style')
@endsection
@section('main-content')
	<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{ trans('messages.about.us') }}</h2>
                        <div class="decor"><span></span></div>
                        <p>{{ trans('messages.know.better') }}</p>
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
     <section class="blocks_sections shared_block about_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_style">
                        <div class="title">{{ trans('messages.about.us') }} </div>
                        <div class="decor"><span></span></div>
                    </div>
                    <!--title_style-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
            <div class="row">
                <div class="col-md-7">
                    <div class="about_content">
                        <div class="inner_aboutcontent">
                            <div class="text">
                                <p>
                                    {{ $about->content }}.
                                </p>
                            </div>
                            <!--text-->
                            <div class="know-more-box">
                                <div class="title">
                                    <span>{{ trans('messages.emergency') }}</span>
                                    <h3>{{ $phone }}</h3>
                                </div>
                                <!--title-->
                            </div>
                            <!--know-more-box-->
                        </div>
                        <!--inner_aboutcontent-->
                    </div>
                    <!--about_content-->
                </div>

            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--start_blockhome-->
@endsection