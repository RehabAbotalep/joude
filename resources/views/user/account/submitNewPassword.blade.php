@extends('user.app')
@section('style') 
@endsection

@section('main-content')

	<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{ trans('messages.password.recovery') }}</h2>
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
                        <div class="title">{{ trans('messages.change.pass') }} .</div>
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
                        <form method="POST" action="{{ route('pass.new') }}">
                            {{ csrf_field() }}
                            <div class="ininput_newblog">
                                <div class="input_job {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" name="password" placeholder="{{trans('messages.password')}}">
                                    @if ($errors->has('password'))
                                        <label class="control-label" for="password"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                                <!--in_form_blog_inner-->
                            </div>
                            <!--in_form_blog-->
                        
                            <input type="hidden" name="mobile" value="{{ session()->get( 'mobile' ) }}">
                            <div class="ininput_newblog">
                                <div class="input_job {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                    <input type="password" name="confirm_password" placeholder="{{trans('messages.password.confirmation')}}" >
                                    @if ($errors->has('confirm_password'))
                                        <label class="control-label" for="confirm_password"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('confirm_password') }}</label>
                                    @endif
                                </div>
                                <!--in_form_blog_inner-->
                            </div>
                            <!--in_form_blog-->
                            <div class="readmore-button readmore-button2">
                                <button type="submit">{{ trans('messages.change.pass') }}</button>
                            </div>
                            <!--in_form_blog_mail-->
                        </form>
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