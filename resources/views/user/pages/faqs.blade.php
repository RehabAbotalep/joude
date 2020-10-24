@extends('user.app')
@section('style')
@endsection
@section('main-content')
	<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{ trans('messages.faq') }}</h2>
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
    <section class="blocks_sections shared_block faqs_page">
        <div class="container">

            <div class="row ">
                <div class="col-lg-12">

                    <div class="title_style2 title_style2_black text-center">
                        <h2>{{ trans('messages.faq') }}</h2>
                        <div class="intitle_style">
                            <div class="decor_dashle"><span></span></div>
                            <p>{{ trans('messages.faq.interesting') }}</p>
                            <div class="decor_dashri"><span></span></div>
                        </div>
                        <!--intitle_style-->
                    </div>
                    <!--title_style2-->


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
                            <div id="collapse_acc{{ $faq->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_acc{{ $faq->id }}">
                                <div class="panel-body">
                                    <div class="faqs_block">
                                        <p>
                                            {{ $faq->answer }}.
                                        </p>
                                    </div>
                                    <!--faqs_block-->
                                </div>
                                <!--panel-body-->
                            </div>
                            <!-- panel-collapse -->
                        </div>
                        <!--panel panel-default-->
						@endforeach
                        
                        <!--panel panel-default-->

                    </div>
                    <!--accordion-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->

        </div>
        <!--container-->
    </section>
    <!--start_blockhome-->
@endsection