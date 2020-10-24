@extends('admin.app')
@section('style')
@endsection
@section('main-content')
	<div class="wrapper_cols">
    	<div class="col_page_content">
			
            <div class="row">
            	<div class="col-md-3">
                	<div class="box_sales colorblue">
                    	<a href="#">
                            <h3>{{trans('messages.users')}}</h3>	
                            <p>{{$users}}</p>
                        </a>
                    </div><!--box_sales-->
                </div><!--col-md-3-->
            	<div class="col-md-3">
                	<div class="box_sales colorred">
                    	<a href="#">
                            <h3>{{trans('messages.cards')}}</h3>	
                            <p>{{$cards}}</p>
                        </a>
                    </div><!--box_sales-->
                </div><!--col-md-3-->
            	<div class="col-md-3">
                	<div class="box_sales coloryellow">
                    	<a href="#">
                            <h3>{{trans('messages.stores')}}</h3>	
                            <p>{{$stores}}</p>
                        </a>
                    </div><!--box_sales-->
                </div><!--col-md-3-->
            	<div class="col-md-3">
                	<div class="box_sales colortrequaz">
                    	<a href="#">
                            <h3>{{trans('messages.categories')}}</h3>	
                            <p>{{$categories}}</p>
                        </a>
                    </div><!--box_sales-->
                </div><!--col-md-3-->
            </div><!--row-->

        </div><!--col_page_content-->
    </div><!--wrapper_cols-->
@endsection