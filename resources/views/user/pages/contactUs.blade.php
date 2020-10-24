@extends('user.app')
@section('style')
@endsection
@section('main-content')
		<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{ trans('messages.contact.us') }}</h2>
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
    <section class="blocks_sections shared_block contact_page">
        <div class="appointment-faq-bg wow zoomInLeft" data-wow-delay="0.5s"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--title_style-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
            <div class="row">
                <div class="col-md-7">
                    <div class="colcontact2">
                        <div class="inner_contentcolcontact2 inner_contentcolcontact_request">
						<div class="title_style">
							<div class="title"> {{ trans('messages.contact.us') }} .</div>
							<div class="decor"><span></span></div>
						</div>
						<form method="POST" action="{{ route('contact.post') }}">
							@if ($message = Session::get('status'))
	    						<div class="alert alert-success alert-block">
	        						<button type="button" class="close" data-dismiss="alert">×</button> 
	       						<strong>{{ $message }}</strong>
	    						</div>
							@endif
							@csrf
							@guest
								<div class="ininput_newblog ininput_newblog_double">
									<div class="input_job">
										<input type="text" name="name" placeholder="{{ trans('messages.name') }}">
									</div>
									<!--input_job-->
									<div class="input_job">
										<input type="text" name="Email" placeholder="{{ trans('messages.email') }}">
									</div>
									<!--input_job-->
								</div>
								<!--ininput_newblog-->
								<div class="ininput_newblog ininput_newblog_double">
									<div class="input_job">
										<input type="text" name="mobile" placeholder="{{ trans('messages.mobile') }}">
									</div>
									<!--input_job-->
								</div>
								<!--ininput_newblog-->
							@endguest
							<div class="ininput_newblog ininput_newblog_submiit">
								<div class="input_job {{ $errors->has('message') ? ' has-error' : '' }}">
									<textarea placeholder="{{ trans('messages.service') }}" name="message"></textarea>
									@if ($errors->has('message'))
                                        <label class="control-label" for="message"><i class="fa fa-times-circle-o">&nbsp;</i>{{ $errors->first('message') }}</label>
                                    @endif
								</div>
								<!--input_job-->
								<div class="more_link">
									<button><i class="fas fa-paper-plane"></i></button>
								</div>
								<!--more_link-->
							</div>
							<!--ininput_newblog-->
						</form>
					</div>
                    </div>
                    <!--colcontact2-->
                </div>
                <!--col-md-6-->



                <div class="col-md-5">
                    <div class="contactnum">
                        <ul class="list_contacts">
                            <li>
                                <div class="icon_contact">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="dets_contact">
                                    <h4 class="mail">{{ trans('messages.address') }} :</h4>
                                    <span>  {{ trans('messages.company.address') }} </span>
                                </div>
                            </li>
                            <li>
                                <div class="icon_contact">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="dets_contact">
                                    <h4 class="mail">{{ trans('messages.mail.us') }} :</h4>
                                    <span><a href="mailto:info@Tremno.com">info@Tremno.com</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="icon_contact">
                                    <i class="fa fa-mobile-alt"></i>
                                </div>
                                <div class="dets_contact">
                                    <h4 class="whats">{{ trans('messages.phone') }}:</h4>
                                    <?php $phone = App\Setting::value('phone');?>
                                    <span> {{ $phone }} </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--contactnum-->
                </div>
                <!--col-md-6 col-lg-6-->

            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--start_blockhome-->
@endsection