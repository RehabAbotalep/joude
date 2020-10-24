@extends('admin.app')
@section('style')
@endsection
@section('main-content')
   <div class="wrapper_cols">
    <div class="col_page_content">
      <div class="row">
        <div class="col-md-12" >
          <div class="blog_tablesearch">
            @include('admin.includes.error')
            <form action="{{route('setting.update')}}" method="Post">
            @csrf
            
            <div class="row insearch_blogs">
              <div class="col-md-6">
                <label>{{trans('messages.phone')}}</label>
                <input type="text" class="form-control" name="phone" value="{{$setting->phone}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.email')}}</label>
                <input type="email" class="form-control" name="email" value="{{$setting->email}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.facebook')}}</label>
                <input type="text" class="form-control" name="facebook_url" value="{{$setting->facebook_url}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.twitter')}}</label>
                <input type="text" class="form-control" name="twitter_url" value="{{$setting->twitter_url}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.instgram')}}</label>
                <input type="text" class="form-control" name="instgrame_url" value="{{$setting->instgrame_url}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.working.hours')}}</label>
                <input type="text" class="form-control" name="working_hours" value="{{$setting->working_hours}}">
              </div>
              <div class="col-md-12">
                <div class="edit_block"><button type="submit" class="btn btn-primary">{{trans('messages.update')}}</button></div>
                <!--edit_block--> 
              </div>
            </div>
            <!--row--> 
            </form>
            
          </div>
          <!--blog_tablesearch--> 
        </div>
        <!--col-md-12--> 
      </div>
      <!--row--> 
    </div>
    <!--col_page_content--> 
  </div>
  <!--wrapper_cols-->
@endsection