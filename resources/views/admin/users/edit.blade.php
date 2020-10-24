@extends('admin.app')
@section('style')
@endsection
@section('main-content')
<div class="wrapper_cols">
  <div class="col_page_content">
    <div class="row">
      <div class="col-md-12" >
        <div class="blog_tablesearch">
          <h5>{{trans('messages.user.update')}}</h5><br><br>
          @include('admin.includes.error')
          <form action="{{ route('user.update',$user->id) }}" method="Post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="row insearch_blogs">
                            <div class="col-md-6">
                                <label>{{trans('messages.name')}}</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.email')}}</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.mobile')}}</label>
                                <input type="number" class="form-control" name="mobile" value="{{$user->mobile}}">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.password')}}</label>
                                <input type="password" class="form-control" name="password" value="{{old('password')}}">
                            </div>
                            <div class="col-md-6">
                                
                                <label>{{trans('messages.active')}}</label>
                                <input type="checkbox" name="is_active" value="1" @if($user->is_active == 1) checked
                                @endif>
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.admin')}}</label>
                                <input type="checkbox" name="is_admin" value="1" @if($user->is_admin == 1) checked
                                @endif>
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