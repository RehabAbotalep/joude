@extends('user.app')
@section('style') 
@endsection

@section('main-content')

	<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{ trans('messages.update') }} {{ trans('messages.mobile') }}</h2>
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
    <section class="blocks_sections shared_block login_page">
        <div class="appointment-faq-bg wow zoomInLeft" data-wow-delay="0.5s"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_style">
                        <div class="title">{{ trans('messages.code.enter') }}</div>
                        <div class="decor"><span></span></div>
                    </div>
                    <!--title_style-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="login_blog">
                        <div class="code_page">
                            <div class="form_code">
                                <div class="messageverification">
                                    <p>
                                        {{ trans('messages.verification.send') }} .
                                    </p>
                                </div>
                                @if ($sucess = Session::get('status'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{ $sucess }}</strong>
                                    </div>
                                @endif
                                @if ($error = Session::get('errors'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{ $error }}</strong>
                                    </div>
                                @endif

                                <!-- messageverification -->
                                <form method="POST" action="{{ route('mobile.update') }}">
                                    {{ csrf_field() }}
                                    <div class="in_code_form">
                                        <input type="number" name="one" maxlength="1" value="" size="1" required="required">
                                        <input type="number" name="two" maxlength="1" value="" size="1" required="required">
                                        <input type="number" name="three" maxlength="1" value="" size="1" required="required">
                                        <input type="number" name="four" maxlength="1" value="" size="1" required="required">
                                        <input type="number" name="five" maxlength="1" value="" size="1" required="required">
                                        <input type="number" name="six" maxlength="1" value="" size="1" required="required">
                                    </div>
                                    <div class="readmore-button readmore-button2">
                                        <button type="submit">{{ trans('messages.submit')}} </button>
                                    </div>
                                </form>
                                <!--submit_button-->
                            </div>
                            <!--form_code-->
                        </div>
                        <!--code_page-->
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