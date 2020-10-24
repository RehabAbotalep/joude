@extends('user.app')
@section('style')
	@if(App::getLocale() == 'ar')
		<!--____tabs_____-->
	    <link rel="stylesheet" href="{{ asset('user/ar/css/sky-tabs.css') }}">
	    <!--____tabs_____--> 
	@else
		<!--____tabs_____-->
	    <link rel="stylesheet" href="{{ asset('user/en/css/sky-tabs.css') }}">
	    <!--____tabs_____--> 
	@endif
	
@endsection

@section('main-content')
	<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="index.html"><i class="fa fa-home"></i> / </a> {{ trans('messages.my.account') }}</h2>
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
                        <div class="title">{{ trans('messages.my.account') }} .</div>
                        <div class="decor"><span></span></div>
                    </div>
                    <!--title_style-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
            <div class="row">
                <div class="col-lg-12">

                    <div class="tabs_page">
                        <!-- tabs -->

                        <div class="sky-tabs sky-tabs-pos-top-left sky-tabs-anim-rotate">
                            <input type="radio" name="sky-tabs" checked id="sky-tab1" class="sky-tab-content-1">
                            <label for="sky-tab1"><span><span><i class="fas fa-address-card"></i>{{ trans('messages.card.order') }}
                                    </span></span></label>
							@auth
					            <input type="radio" name="sky-tabs" id="sky-tab2" class="sky-tab-content-2">
                            	<label class="lab2" for="sky-tab2"><span><span><i class="fas fa-edit"></i>{{ trans('messages.card.activate') }}</span></span></label>

                            	<input type="radio" name="sky-tabs" id="sky-tab3" class="sky-tab-content-3">
                            	<label for="sky-tab3"><span><span><i class="fas fa-unlock"></i> {{ trans('messages.card.turnoff') }}</span></span></label>       
					        @endauth
                            
                            <ul>
                                <li class="sky-tab-content-1">
                                    <div class="typography">
                                        <div class="cardform">
                                        	@if ($message = Session::get('status'))
                            					<div class="alert alert-success alert-block">
                                					<button type="button" class="close" data-dismiss="alert">×</button> 
                                    				<strong>{{ $message }}</strong>
                            					</div>
                        					@endif
                                            <form method="POST" enctype="multipart/form-data">
                                            	@csrf
                                            	@guest
                                                <div class="ininput_newblog ininput_newblog_double">
                                                    <div class="input_job {{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <input type="text" name="name" placeholder="{{ trans('messages.name') }}" value="{{ old('name') }}">
                                                        @if ($errors->has('name'))
                                        					<label class="control-label" for="name"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('name') }}</label>
                                    					@endif
                                                    </div>
                                                    <!--input_job-->
                                                    <div class="input_job {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                                        <input type="number" name="mobile" placeholder="{{ trans('messages.mobile') }}" value="{{ old('mobile') }}">
                                                        @if ($errors->has('mobile'))
                                        					<label class="control-label" for="mobile"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('mobile') }}</label>
                                    					@endif
                                                    </div>
                                                    <!--input_job-->
                                                </div>
                                                <!--ininput_newblog-->
                                                <div class="ininput_newblog ininput_newblog_double">
                                                    <div class="input_job {{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <input type="email" name="email" placeholder="{{ trans('messages.email') }}" value="{{ old('email') }}">
                                                        @if ($errors->has('email'))
                                        					<label class="control-label" for="email"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('email') }}</label>
                                    					@endif
                                                    </div>
                                                    <div class="input_job {{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <input type="password" name="password" placeholder="{{ trans('messages.password') }}">
                                                        @if ($errors->has('password'))
                                        					<label class="control-label" for="password"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('password') }}</label>
                                    					@endif
                                                    </div>
                                                </div>
                                                @endguest
                                                    <!--input_job-->
                                                <div class="ininput_newblog ininput_newblog_double">
                                                	@guest
                                                	<div class="input_job {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                                        <input type="password" name="confirm_password" placeholder="{{trans('messages.password.confirmation')}}">
                                                        @if ($errors->has('confirm_password'))
                                        					<label class="control-label" for="confirm_password"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('confirm_password') }}</label>
                                    					@endif
                                                    </div>
                                                    @endguest
                                                    <div class="input_job {{ $errors->has('payment_method') ? ' has-error' : '' }}">
                                                        <select class="soflow-color" id="paymentMethod" name="payment_method">
                                                            <option value="Bank transfer">{{ trans('messages.Bank Transfer') }}</option>
                                                            <option value="Cash" selected="selected">{{ trans('messages.cash') }}</option>
                                                            @if ($errors->has('payment_method'))
                                        						<label class="control-label" for="payment_method"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('payment_method') }}</label>
                                    						@endif
                                                        </select>
                                                    </div>
                                                    <!--input_job-->
                                                </div>

                                                <div class="ininput_newblog ininput_newblog_double">	
                                                    @foreach($types as $type)
                                                    	<div class="input_job {{ $errors->has('type_id') ? ' has-error' : '' }}">
                                                    		<input type="checkbox" name="type_id" value="{{$type->id}}" style="width: 15px;height: 15px;" checked="checked"> 
	  														<label>
	    														{{ $type->month_number }} {{ trans('messages.mon') }} &nbsp;&nbsp;{{ $type->price }} {{ trans('messages.sr') }}
	  														</label><br>
	  														@if ($errors->has('type_id'))
                                        						<label class="control-label" for="type_id"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('type_id') }}</label>
                                    						@endif
  														</div>
  														<input type="hidden" name="amount" value="{{ $type->price }}">

                                                    @endforeach
                                                    <div class="input_job {{ $errors->has('receive_the_card_type') ? ' has-error' : '' }}">
                                                    		<label>
                                                    			{{ trans('messages.card.recieve.method') }}
                                                    		</label>
                                                    		<input type="checkbox" name="receive_the_card_type" value="from_branch" style="width: 15px;height: 15px;">
                                                    		@if ($errors->has('receive_the_card_type'))
                                        						<label class="control-label" for="receive_the_card_type"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('receive_the_card_type') }}</label>
                                    						@endif
  													</div>
                                                </div>
                                                <!--ininput_newblog-->

                                                <div class="readmore-button readmore-button2">
                                                    <button formaction="{{ route('orderCard.post') }}">
                                                        {{ trans('messages.request') }}
                                                    </button>
                                                </div>
                                                <!-- readmore-button -->
                                                <div class="ininput_newblog">
                                                    <div class="input_job">
                                                        <input class="bankimg" type="file" data-value="" value="bankimg"  id="bank_transfer_image" name="image"/>
                                                    </div>
                                                </div>
                                                <!--ininput_newblog-->

                                            </form>
                                        </div>
                                        <!-- cardform -->
                                    </div>
                                    <!--typography-->
                                </li>
                                <!--sky-tab-content-1-->

                                <li class="sky-tab-content-2">
                                    <div class="typography">
                                        <div class="cardform">
                                        	@if ($error = Session::get('error'))
                            					<div class="alert alert-danger alert-block">
                                					<button type="button" class="close" data-dismiss="alert">×</button> 
                                    				<strong>{{ $error }}</strong>
                            					</div>
                        					@endif
                                            <form method="POST">
                                            	@csrf
                                                <div class="ininput_newblog ininput_newblog_double">
                                                    <div class="input_job {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                        <input type="number" name="card_number" placeholder="{{ trans('messages.card.number') }}" value="{{ old('card_number') }}">
                                                        @if ($errors->has('card_number'))
                                        					<label class="control-label" for="card_number"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('card_number') }}</label>
                                    					@endif
                                                    </div>
                                                    <!--input_job-->
                                                    <div class="input_job {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                        <input type="number" name="phone" placeholder="{{ trans('messages.mobile') }}" value="{{ old('phone') }}">
                                                        @if ($errors->has('phone'))
                                        					<label class="control-label" for="phone"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('phone') }}</label>
                                    					@endif
                                                    </div>
                                                    <!--input_job-->
                                                </div>
                                                <!--ininput_newblog-->
                                                <div class="readmore-button readmore-button2">
                                                    <button formaction="{{route('card.activate')}}">
                                                        {{ trans('messages.submit') }}
                                                    </button>
                                                </div>
                                                <!-- readmore-button -->

                                            </form>
                                        </div>
                                        <!-- cardform -->
                                    </div>
                                    <!--typography-->
                                </li>
                                <!--sky-tab-content-2-->

                                <li class="sky-tab-content-3">
                                    <div class="typography">
                                        <div class="cardform">
                                        	@if ($error = Session::get('error'))
                                    			<div class="alert alert-danger alert-block">
                                        			<button type="button" class="close" data-dismiss="alert">×</button> 
                                        			<strong>{{ $error }}</strong>
                                    			</div>
                               				@endif
                                            <form method="POST">
                                            	@csrf
                                                <div class="ininput_newblog">
                                                    <div class="input_job {{ $errors->has('mob') ? ' has-error' : '' }}">
                                                        <input type="number" name="mob" placeholder="{{ trans('messages.mobile') }}" value="{{ old('mob') }}">
                                                        @if ($errors->has('mob'))
                                        					<label class="control-label" for="mob"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('mob') }}</label>
                                    					@endif
                                                    </div>
                                                    <!--input_job-->
                                                </div>
                                                <div class="ininput_newblog">
                                                    <div class="input_job {{ $errors->has('card') ? ' has-error' : '' }}">
                                                        <input type="number" name="card" placeholder="{{ trans('messages.card.number') }}" value="{{ old('card') }}">
                                                        @if ($errors->has('card'))
                                        					<label class="control-label" for="card"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('card') }}</label>
                                    					@endif
                                                    </div>
                                                    <!--input_job-->
                                                </div>
                                                <!--ininput_newblog-->
                                                <div class="ininput_newblog">
                                                    <div class="input_job">
                                                        <textarea placeholder="{{ trans('messages.stop.reason') }}" name="reason">{{ old('reason') }}</textarea>
                                                    </div>
                                                    <!--input_job-->
                                                </div>
                                                <!--ininput_newblog-->
                                                <div class="readmore-button readmore-button2">
                                                    <button formaction="{{ route('card.deactivate') }}">
                                                        {{ trans('messages.submit') }}
                                                    </button>
                                                </div>
                                                <!-- readmore-button -->

                                            </form>
                                        </div>
                                        <!-- cardform -->
                                    </div>
                                    <!--typography-->
                                </li>
                                <!--sky-tab-content-3-->
                            </ul>
                        </div>
                        <!--sky-tabs-->

                    </div>
                    <!--tab_page-->

                </div>
                <!--col-md-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--start_blockhome-->

@endsection
@section('script')
	@if(App::getLocale() == 'ar')
		<script src="{{ asset('user/ar/js/jquery-1.12.4.min.js')}}"></script>
	    <script src="{{ asset('user/ar/js/jquery-migrate-1.2.1.min.js')}}"></script>
	    <!--________input_type_file___________-->
	    <script type="text/javascript" src="{{ asset('user/ar/js/jquery.slides.min.js') }}"></script>
	    <script type="text/javascript" src="{{ asset('user/ar/js/script_upload.js') }}"></script>
	    <!--________input_type_file___________-->
	    <script type="text/javascript" src="{{ asset('user/ar/js/index.js') }}"></script>
	@else
		<script src="{{ asset('user/en/js/jquery-1.12.4.min.js')}}"></script>
	    <script src="{{ asset('user/en/js/jquery-migrate-1.2.1.min.js')}}"></script>
	    <!--________input_type_file___________-->
	    <script type="text/javascript" src="{{ asset('user/en/js/jquery.slides.min.js') }}"></script>
	    <script type="text/javascript" src="{{ asset('user/en/js/script_upload.js') }}"></script>
	    <!--________input_type_file___________-->
	    <script type="text/javascript" src="{{ asset('user/en/js/index.js') }}"></script>
	@endif
@endsection
