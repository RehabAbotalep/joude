@extends('user.app')
@section('style') 
@endsection

@section('main-content')

	 <section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{trans('messages.login')}} </h2>
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
                        <div class="title">{{trans('messages.login.page')}}  .</div>
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
                        @if ($message = Session::get('status'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <form method="POST">
                            {{ csrf_field() }}
                            <div class="ininput_newblog ininput_newblog_double">
                                <div class="input_job {{ $errors->has('phoneNumber') ? ' has-error' : '' }}">
                                    <input type="number" name="phoneNumber" placeholder="{{ trans('messages.mobile') }}" value="{{ old('phoneNumber') }}">
                                    @if ($errors->has('phoneNumber'))
                                        <label class="control-label" for="name"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('phoneNumber') }}</label>
                                    @endif
                                </div>
                                <!--in_form_blog_inner-->
                                <div class="input_job {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" name="password" placeholder="{{ trans('messages.password') }}">
                                    @if ($errors->has('password'))
                                        <label class="control-label" for="mobile"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                                <!--in_form_blog_inner-->
                            </div>
                            <!--in_form_blog-->
                            <div class="readmore-button readmore-button2">
                                <button type="submit" formaction={{route('login.post')}}>{{ trans('messages.login') }}</button>
                            
                                <a href="{{ route('user.register') }}">{{ trans('messages.sign.up') }}</a>
                                <a href="{{ route('home') }}">{{ trans('messages.visitor.register') }}</a>
                            </div>
                            <div class="ininput_newblog">
                                <div class="input_job">
                                    <a class="remember" href=""> {{ trans('messages.forget.pass') }}</a>
                                </div>
                                <!--in_form_blog_inner-->
                            </div>
                            <!--in_form_blog-->
                            <div class="in_form_blog_mail ininput_newblog">
                                <div class="input_job {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <input type="number" name="mobile" placeholder="{{ trans('messages.mobile') }}" value="{{ old('mobile') }}">
                                    @if ($errors->has('mobile'))
                                        <label class="control-label" for="mobile"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('mobile') }}</label>
                                    @endif
                                </div>
                                <!--input_job-->
                                <div class="readmore-button readmore-button2">
                                    <button formaction="{{ route('forget.pass') }}">{{ trans('messages.reset.pass') }}</button>
                                </div>
                            </div>
                        </form>
                            <!--in_form_blog_mail-->
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