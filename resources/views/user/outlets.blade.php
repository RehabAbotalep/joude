@extends('user.app')
@section('style')
@endsection
@section('main-content')
	 <section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="index.html"><i class="fa fa-home"></i> / </a> {{ trans('messages.stores') }} </h2>
                        <div class="decor"><span></span></div>
                        <p>{{ trans('messages.stores.participating') }}</p>
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
                                <button class="filter active show-all" data-filter="">
                            		<i>{{ trans('messages.all.stores') }}</i>
                            	</button>
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
                            <button id="Reset">{{trans('messages.filter.clear')  }}</button>
                        </div>
                        <!--filterselect-->
                    </form>

                    <div id="portfoliolist" class="row">
						@foreach($stores as $store)
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" id="category">
                            <!--Start Single pricing Box-->
	                            <div class="single-pricing-box text-center">
	                                <div class="inner_content">
	                                    <div class="coponimg">
	                                        <a href="#"><img src="{{ $store->image }}"></a>
	                                    </div>
	                                    <h3>{{ $store->category->name }}</h3>
	                                    <h1>Discount <span>{{ $store->discount }}</span></h1>
	                                    <p>{{ $store->name }}</p>
	                                    <div class="linkmore">
	                                        <a href="{{ route('store.details',$store->id) }}">{{ trans('messages.click') }}</a>
	                                    </div>
	                                </div>
	                            </div>
                            <!--End Single pricing Box-->
                        	</div>
                        <!-- portfolio -->
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