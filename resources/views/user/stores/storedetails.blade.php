@extends('user.app')
@section('style')
@endsection
@section('main-content')
	<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="index.html"><i class="fa fa-home"></i> / </a> {{ trans('messages.stores') }}</h2>
                        <div class="decor"><span></span></div>
                        <p>{{ trans('messages.outlet.know') }}</p>
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
    <section class="blocks_sections shared_block outletdetail_page">
        <div class="container">

            <div class="row">
                <div class="col-md-5">
                    <div class="imagebrand">
                        <img class="img-responsive" src="{{ $store->image }}">
                    </div>
                    <!--imagebrand-->
                </div>
                <!--col-md-6 col-lg-6-->
                <div class="col-md-7">
                    <div class="outletdetsblock">
                        <div class="offeroutlet">
                            <h3>{{ $store->name}} <span><i>{{ $store->discount}}%</i> OFF</span></h3>
                        </div>
                        <!--offeroutlet -->
                        <div class="offeroutletdets">
                            <h3><i class="fas fa-mobile-alt"></i> {{ $phone }}</h3>
                            <p>	{{ $store->description}}
                            </p>
                            <h4>
                            	@if(app()->getLocale() == 'ar')
                                    احصل على {{ $store->discount}}% خصم فوري عند استخدامك جود كارد
                                @else
                                   	Enjoy {{ $store->discount}}% Instant Discount with your Joude Card
                                @endif
                            	
                            </h4>
                        </div>
                        <!-- offeroutletdets -->
                    </div>
                    <!-- outletdetsblock -->
                </div>
                <!--col-md-6 col-lg-6-->
            </div>
            <!--row-->

            <div class="row ">
                <div class="col-lg-12">

                    <div class="title_style2 title_style2_black text-center">
                        <h2>{{ trans('messages.branches') }}</h2>
                        <div class="intitle_style">
                            <div class="decor_dashle"><span></span></div>
                            <p>{{ trans('messages.branch.details') }}</p>
                            <div class="decor_dashri"><span></span></div>
                        </div>
                        <!--intitle_style-->
                    </div>
                    <!--title_style2-->


                    <div class="panel-group accordion_champions" id="accordion" role="tablist" aria-multiselectable="true">
						@foreach($cities as $city)
							<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading_acc{{ $city->id }}">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_acc{{ $city->id }}" aria-expanded="true" aria-controls="collapse_acc{{ $city->id }}">
                                    @if(app()->getLocale() == 'ar')
                                    	{{ trans('messages.branch') }} {{ $city->name }} :
                                    @else
                                    	{{ $city->name }} {{ trans('messages.branch') }}:
                                    @endif 
                                       
                                    </a>
                                </h4>
                            </div>
                            <!--panel-heading-->
                            <div id="collapse_acc{{ $city->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_acc{{ $city->id }}">
                                <div class="panel-body">
                                    <div class="branch_block">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                  
                                                    <!--iframe_block-->
                                                </div>
                                                <!--col-lg-12-->
                                            </div>
                                            <!--row-->
                                            <div class="row">
                                            	@foreach($city->branches as $branch)
                                            		<div class="col-md-6">
                                                    <div class="addressblog">
                                                        <ul>
                                                            <li>
                                                                <div class="titleaddress">{{ trans('messages.address') }}</div>
                                                                <div class="detsaddress">
                                                                    {{ $branch->address }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="titleaddress">{{ trans('messages.city') }}</div>
                                                                <div class="detsaddress">
                                                                    {{ $city->name }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="titleaddress">{{ trans('messages.region') }}: </div>
                                                                <div class="detsaddress">
                                                                    {{ $branch->region->name }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="titleaddress">{{ trans('messages.phone') }}</div>
                                                                <div class="detsaddress">
                                                                    {{ $branch->phone }}
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!--addressblog -->
                                                </div>
                                            	@endforeach
                                            </div>
                                            <!--row-->
                                        </div>
                                        <!--col-lg-12-->
                                    </div>
                                    <!--branch_block-->
                                </div>
                                <!--panel-body-->
                            </div>
                            <!--panel-collapse-->
                        </div>
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