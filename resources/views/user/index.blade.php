@extends('user.app')
@section('style')
@endsection
@section('main-content')
<section class="slider_block">
	<div class="owl-carousel carousel_slider owl-theme">
		<div class="item">
			<div class="slider_blog">
				<img src="{{asset('admin/img/b1.jpg')}}">
				<div class="intro_detail">
					<i>{{ trans('messages.welcome') }}</i>
					<h2>{{ trans('messages.who.we.are') }}</h2>
					<p>
						{{$about->content}}
					</p>
					<div class="readmore-button">
						<a href="{{ route('about.us') }}">{{ trans('messages.read.more') }}</a>
					</div>
				</div>
				<!--intro_detail-->
			</div>
			<!--slider_blog-->
		</div>
		<!--item-->
		<div class="item">
			<div class="slider_blog">
				<img src="{{asset('admin/img/b2.jpg')}}">
				<div class="intro_detail">
					<i>{{ trans('messages.welcome') }}</i>
					<h2>{{ trans('messages.who.we.are') }}</h2>
					<p>
						{{$about->content}}
					</p>
					<div class="readmore-button">
						<a href="{{ route('about.us') }}">{{ trans('messages.read.more') }}</a>
					</div>
				</div>
				<!--intro_detail-->
			</div>
			<!--slider_blog-->
		</div>
		<!--item-->
		<div class="item">
			<div class="slider_blog">
				<img src="{{asset('admin/img/b3.jpg')}}">
				<div class="intro_detail">
					<i>{{ trans('messages.welcome') }}</i>
					<h2>{{ trans('messages.who.we.are') }} </h2>
					<p>
						{{$about->content}}
					</p>
					<div class="readmore-button">
						<a href="{{ route('about.us') }}">{{ trans('messages.read.more') }}</a>
					</div>
				</div>
				<!--intro_detail-->
			</div>
			<!--slider_blog-->
		</div>
		<!--item-->
	</div>
	<!--carousel-->
</section>
<!--services-->
<section class="blocks_sections start_blockhome">
	<div class="container">
		<div class="row">
			@foreach($categories as $category)
			
			<div class="col-md-4 col-sm-6 nopaddrig">

                    <!--Start Single Working Box-->
                    <div class="single_blogs text-center">
                        <div class="img_single_blogs">
                            <img src="{{ $category->image }}" alt="">
                        </div>
                        <div class="content_blogs">
                            <div class="inner_content">
                                <div class="inner_cont_box">
                                    <div class="text_holder">
                                        <h3>{{ $category->name }}</h3>
                                        <p>{{ $about->content }}
                                        </p>
                                    </div>
                                    <div class="readmore">
                                        <a href="{{ route('about.us') }}"><span class="flaticon-add"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overlay-content">
                            <div class="inner_content">
                                <div class="inner_cont_box">
                                    <div class="text_holder">
                                        <h3>{{ $category->name }}</h3>
                                        <p>{{ $about->content }}
                                        </p>
                                    </div>
                                    <div class="readmore-button">
                                        <a href="{{ route('about.us') }}">{{ trans('messages.read.more') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Working Box-->
                </div>
			@endforeach
			
		</div>
		<!--row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="make-appointment-content">
					<div class="blogdets">
						<div class="icon">
							<span class="flaticon-shop"></span>
						</div>
						<div class="title">
							<h3>{{ trans('messages.outlets.get') }}</h3>
							<span>{{ trans('messages.good.things') }}</span>
						</div>
					</div>
					<div class="blogdets2">
						<div class="button">
							<a href="{{ route('outlets.index') }}">{{ trans('messages.outlets.more') }}</a>
						</div>
					</div>
				</div>
			</div>
			<!--col-md-->
		</div>
		<!--row-->
	</div>
	<!--container-->
</section>
<!--start_blockhome-->
<!--Start about-->
<section class="about_block">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="about_content">
					<div class="title_style">
						<div class="title">{{ trans('messages.who.we.are') }} </div>
						<div class="decor"><span></span></div>
					</div>
					<div class="inner_aboutcontent">
						<div class="text">
							<p>
								{{ $about->content }}
							</p>
						</div>
						<div class="know-more-box">
							<div class="button">
								<a href="{{ route('about.us') }}">{{ trans('messages.more.about') }}</a>
							</div>
							<!--button-->
							<div class="title">
								<span>{{ trans('messages.emergency') }}</span>
								<?php
                        			$phone = App\Setting::value('phone');
                        		?>
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
			<!--col-md-6 col-lg-6-->
			<div class="col-md-5">
				<div class="row">
					<div class="col-lg-12">
						<div class="title_style">
							<div class="title">{{ trans('messages.how.it.works') }}</div>
							<div class="decor"><span></span></div>
						</div>
						<!--title_style-->
					</div>
				</div>
				<!-- col-lg-12 -->
				<div class="row">
					<div class="col-md-12 col-sm-6">
						<div class="videos_blogs">
							<iframe src="https://www.youtube.com/embed/5WkRfm112No" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						<!--videos_blogs-->
					</div>
					<!-- col-md-12 -->
					<div class="col-md-12 col-sm-6">
						<div class="videos_blogs">
							<iframe src="https://www.youtube.com/embed/5WkRfm112No" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						<!--videos_blogs-->
					</div>
					<!-- col-md-12 -->
				</div>
				<!-- row -->
			</div>
			<!--col-md-6 col-lg-6-->
		</div>
		<!--row-->
	</div>
	<!--containner_content-->
</section>
<!--End about-->
<!--e7saia_counter-->
<section class="e7saia_counter">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_style2 text-center">
					<h2>Achivements In number</h2>
					<div class="intitle_style">
						<div class="decor_dashle"><span></span></div>
						<p>Interesting Facts</p>
						<div class="decor_dashri"><span></span></div>
					</div>
					<!--intitle_style-->
					<div class="title_style2_par">
						<p>Present your card when ordering the bill or while paying in-store .</p>
					</div>
					<!--title_style2_par-->
				</div>
				<!--title_style2-->
			</div>
			<!--col-lg-12-->
		</div>
		<!--row-->
		<div class="row">
			<!--Start-->
			<div class="col-md-3 col-sm-6">
				<div class="single-fact-counter">
					<div class="icon">
						<span class="flaticon-shop"></span>
					</div>
					<!--icon-->
					<div class="count-box">
						<h1>
						<span class="counter add" data-count="840">0</span>
						</h1>
					</div>
					<!--count-box-->
					<div class="border-box">
						<div class="left-border"><span></span></div>
						<div class="right-border"><span></span></div>
					</div>
					<!--border-box-->
					<div class="title">
						<h3>Happy Customers</h3>
					</div>
					<!--title-->
				</div>
				<!--single-fact-counter-->
			</div>
			<!--col-md-3 col-sm-6-->
			<!--Start-->
			<div class="col-md-3 col-sm-6">
				<div class="single-fact-counter">
					<div class="icon">
						<span class="flaticon-store"></span>
					</div>
					<!--icon-->
					<div class="count-box">
						<h1>
						<span class="counter add" data-count="840">0</span>
						</h1>
					</div>
					<!--count-box-->
					<div class="border-box">
						<div class="left-border"><span></span></div>
						<div class="right-border"><span></span></div>
					</div>
					<!--border-box-->
					<div class="title">
						<h3>Stores</h3>
					</div>
					<!--title-->
				</div>
				<!--single-fact-counter-->
			</div>
			<!--col-md-3 col-sm-6-->
			<!--Start-->
			<div class="col-md-3 col-sm-6">
				<div class="single-fact-counter">
					<div class="icon">
						<span class="flaticon-money-bag"></span>
					</div>
					<!--icon-->
					<div class="count-box">
						<h1>
						<span class="counter add" data-count="840">0</span>
						</h1>
					</div>
					<!--count-box-->
					<div class="border-box">
						<div class="left-border"><span></span></div>
						<div class="right-border"><span></span></div>
					</div>
					<!--border-box-->
					<div class="title">
						<h3>Value Worth of Vouchers</h3>
					</div>
					<!--title-->
				</div>
				<!--single-fact-counter-->
			</div>
			<!--col-md-3 col-sm-6-->
			<!--Start-->
			<div class="col-md-3 col-sm-6">
				<div class="single-fact-counter">
					<div class="icon">
						<span class="flaticon-credit-card"></span>
					</div>
					<!--icon-->
					<div class="count-box">
						<h1>
						<span class="counter add" data-count="840">0</span>
						</h1>
					</div>
					<!--count-box-->
					<div class="border-box">
						<div class="left-border"><span></span></div>
						<div class="right-border"><span></span></div>
					</div>
					<!--border-box-->
					<div class="title">
						<h3>Projects Completed</h3>
					</div>
					<!--title-->
				</div>
				<!--single-fact-counter-->
			</div>
			<!--col-md-3 col-sm-6-->
		</div>
		<!--row-->
	</div>
	<!--containner_content-->
</section>
<!--End e7saia_counter-->

<!--Start Pricing Plan Area-->
<section class="pricing-plan-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_style2 title_style2_black text-center">
					<h2>{{ trans('messages.coupon') }}</h2>
					<div class="intitle_style">
						<div class="decor_dashle"><span></span></div>
						<p></p>
						<div class="decor_dashri"><span></span></div>
					</div>
					<!--intitle_style-->
					<div class="title_style2_par">
						<p> </p>
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
				<div class="owl-carousel pricing-carousel owl-theme">
					@foreach($stores as $store)
						<!--Start Single pricing Box-->
					<div class="single-pricing-box text-center">
						<div class="inner_content">
							<div class="coponimg">
								<a href="#"><img src="{{ $store->image }}"></a>
							</div>
							<h3>{{ $store->category->name }}</h3>
							<h1>{{ trans('messages.discount') }} <span>{{ $store->discount }}%</span></h1>
							<p>{{ $store->description }}.</p>
							<div class="linkmore">
								<a href="{{ route('store.details',$store->id) }}">{{ trans('messages.click') }}</a>
							</div>
						</div>
					</div>
					<!--End Single pricing Box-->
					@endforeach
				</div>
				<!--pricing-carousel-->
			</div>
			<!--col-lg-12-->
		</div>
		<!--row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="readmore-button readmore-button2">
					<a href="{{ route('outlets.index') }}">{{ trans('messages.outlets.more') }}</a>
				</div>
			</div>
			<!--col-lg-12-->
		</div>
		<!--row-->
	</div>
</section>
<!--End Pricing Plan Area-->
<section class="contactmess">
	<div class="appointment-faq-bg wow zoomInLeft" data-wow-duration="2000ms"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
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
			<div class="col-md-6">
				<div class="panel-group accordion_champions" id="accordion" role="tablist" aria-multiselectable="true">
					@foreach($faqs as $faq)
						<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading_acc{{ $faq->id }}">
							<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse_acc{{ $faq->id }}" aria-expanded="true" aria-controls="collapse_acc{{ $faq->id }}">
								{{ $faq->question }}
							</a>
							</h4>
						</div>
						<!--panel-heading-->
						<div id="collapse_acc{{ $faq->id }}" class="panel-collapse collapse in" role="tabpane{{ $faq->id }}" aria-labelledby="heading_acc{{ $faq->id }}">
							<div class="panel-body">
								<div class="inaccrodion_blog">
									<p>
										{{ $faq->answer }}
									</p>
								</div>
								<!--inaccrodion_blog-->
							</div>
							<!--panel-body-->
						</div>
						<!--panel-collapse-->
					</div>
					<!--panel panel-default-->
					@endforeach
					
				</div>
				<!--accordion-->
			</div>
			<!--col-md-6-->
		</div>
		<!--row-->
	</div>
	<!--container-->
</section>
<!--contact-->

@endsection