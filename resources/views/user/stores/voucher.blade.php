@extends('user.app')
@section('style')
@endsection
@section('main-content')
	<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{ trans('messages.vouchers') }} </h2>
                        <div class="decor"><span></span></div>
                        <p>{{ trans('messages.vouchers') }}</p>
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
    <section class="blocks_sections shared_block outlets_page">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <form class="controls" id="filters">
                        <div class="filterlist">
                            <fieldset>
                            	<button class="filter active show-all" data-filter=""><i>{{ trans('messages.all.stores') }} </i></button>
                            	@foreach($categories as $category)
                            		<button class="filter" data-filter="" name="category_id" value="{{ $category->id }}">
                                        <i>{{ $category->name }}</i>
                                    </button>
                            	@endforeach
                               
                            </fieldset>
                        </div>
                        <!--filterlist-->
                        <div class="filterselect">
                            <fieldset>
                                <select class="soflow-color" name="city_id" id="city_id">
                                    <option value="0">{{ trans('messages.city') }}</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset>
                                <select class="soflow-color" name="region_id" id="region">
                                    <option value="0">{{ trans('messages.region') }}</option>
                                    <option value=""></option> 
                                </select>
                            </fieldset>
                            <button id="Reset">{{trans('messages.filter.clear')}}</button>
                        </div>
                        <!--filterselect-->
                    </form>

                    <div id="portfoliolist" class="row">
                    	@foreach($stores as $store)
							
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <!--Start voucher_blog-->
                            <div class="voucher_blog">
                                <div class="thumb_voucherimg">
                                    <a href="outletdetail.html">
                                        <img src="{{ $store->image }}">
                                    </a>
                                </div>
                                <!--thumb_voucherimg-->
                                <div class="voucher_details">
                                    <div class="voucher_details_in">
                                        <h3><a href="outletdetail.html">{{ $store->category->name }}</a></h3>
                                       
                                        @foreach($store->vouchers as $voucher)
                                            <p>{{ $voucher->name }}</p>
                                        @endforeach
                                        
                                    </div>
                                    <!--voucher_details_in-->
                                </div>
                                <!--voucher_details-->
                                <div class="readmore">
                                    <a href="{{ route('store.details',$store->id) }}"><span class="flaticon-next"></span></a>
                                </div>
                                <!--readmore-->
                            </div>
                            <!--voucher_blog-->
                            <!--End voucher_blog-->
                        </div>
						@endforeach


                    </div>
                    <!--portfoliolist row-->


                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->

        </div>
        <!--container-->
    </section>
    <!--start_blockhome-->
@endsection
@section('script')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#city_id").change(function(){
        $.ajax({
        url: "{{ route('loadRegions') }}?city_id=" + $(this).val(),
        method: 'GET',
        success: function(data) {
        console.log(data.html);
        $('#region').html(data.html);
        }
        });
        });
    </script> 
@endsection