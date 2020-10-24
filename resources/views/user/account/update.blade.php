@extends('user.app')
@section('style') 
@endsection

@section('main-content')

	 <section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{ trans('messages.edit.account.page') }}  </h2>
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
    <section class="blocks_sections shared_block login_page">
        <div class="appointment-faq-bg wow zoomInLeft" data-wow-delay="0.5s"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_style">
                        <div class="title">{{ trans('messages.edit.account.page') }} .</div>
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
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('update.post') }}">
                            {{ csrf_field() }}
                            <div class="account_blogrows media">
                                <div class=" media-body">
                                    <div class="ininput_newblog">
                                        <div class="input_job {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <input type="text" name="name" placeholder="{{trans('messages.name')}}" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <label class="control-label" for="name"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('name') }}</label>
                                            @endif
                                        </div>
                                        <!--in_form_blog_inner-->
                                    </div>
                                    <!--in_form_blog-->
                                    <div class="ininput_newblog">
                                        <div class="input_job {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <input type="number" name="mobile" placeholder="{{trans('messages.mobile')}}" value="{{ old('mobile') }}">
                                            @if ($errors->has('mobile'))
                                                <label class="control-label" for="mobile"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('mobile') }}</label>
                                            @endif
                                        </div>
                                        <!--in_form_blog_inner-->
                                    </div>
                                    <!--in_form_blog-->
                                    <div class="ininput_newblog">
                                        <div class="input_job {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input type="email" name="email" placeholder="{{trans('messages.email')}}" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <label class="control-label" for="email"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('email') }}</label>
                                            @endif
                                        </div>
                                        <!--in_form_blog_inner-->
                                    </div>
                                    <!--in_form_blog-->
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

                                    <div class="readmore-button readmore-button2">
                                        <button>{{ trans('messages.edit') }}</button>
                                    </div>
                                    <!--details_account -->
                                </div>
                                <!-- details_account -->
                            </div>
                            <!--account_blogrows-->


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