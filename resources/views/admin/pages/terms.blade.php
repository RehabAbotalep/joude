@extends('admin.app')
@section('style')
@endsection
@section('main-content')
<div class="wrapper_cols">
  <div class="col_page_content">
    <div class="row">
      <div class="col-md-12">
        <h5>{{trans('messages.terms')}}</h5>
      </div>
      <!--row-->
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="blog_tablesearch">
          <div class="row">
            
            
            <form action="{{route('terms.update')}}" method="post">
              @csrf
              <input type="hidden" name="terms_id" value="{{$terms->id}}">
              
              <div class="form-group col-md-12">
                <textarea id="summernote1" name="content_ar" required>{{$terms->content_ar}}</textarea>
              </div>

              <div class="form-group col-md-12">
                <textarea id="summernote2" name="content_en" required>{{$terms->content_en}}</textarea>
              </div>
              
              <div class="form-group col-md-12 ">
                <button class="btn btn-success pull-right">{{trans('messages.edit.save')}}</button>
              </div>
            </form>
            
            </div><!--row-->
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
  
  <!--website_containner-->
 
