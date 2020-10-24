@extends('admin.app')
@section('style')
@endsection
@section('main-content')
   <div class="wrapper_cols">
    <div class="col_page_content">
      <div class="row">
        <div class="col-md-12" >
          <div class="blog_tablesearch">
            <h5>{{trans('messages.category.update')}}</h5><br><br>
            @include('admin.includes.error')
            <form action="{{ route('category.update',$category->id) }}" method="Post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="row insearch_blogs">
              <div class="col-md-6">
                <label>{{trans('messages.name.ar')}}</label>
                <input type="text" class="form-control" name="name_ar" value="{{$category->name_ar}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.name.en')}}</label>
                <input type="text" class="form-control" name="name_en" value="{{$category->name_en}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.image')}}</label>
                <input type="file" class="form-control" name="image">
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