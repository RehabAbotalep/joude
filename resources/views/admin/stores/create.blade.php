@extends('admin.app')
@section('style')
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('main-content')
   <div class="wrapper_cols">
    <div class="col_page_content">
      <div class="row">
        <div class="col-md-12" >
          <div class="blog_tablesearch">
            <h5>{{trans('messages.store.add')}}</h5><br><br>
            @include('admin.includes.error')
            <form action="{{ route('store.store') }}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="row insearch_blogs">
              <div class="col-md-6">
                <label>{{trans('messages.name.ar')}} <span class="requiredStar"> * </span></label>
                <input type="text" class="form-control" name="name_ar" value="{{old('name_ar')}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.name.en')}}   <span class="requiredStar"> * </span></label>
                <input type="text" class="form-control" name="name_en" value="{{old('name_en')}}">
              </div>
              <div class="col-md-12">
                <label>{{trans('messages.description.ar')}}</label>
                <textarea class="form-control" name="description_ar">{{old('description_ar')}}</textarea>
              </div>
              <div class="col-md-12">
                <label>{{trans('messages.description.en')}}</label>
                <textarea class="form-control" name="description_en">{{old('description_en')}}</textarea>
              </div>
              <div class="col-md-6">
                  <label>{{trans('messages.cities')}}<span class="requiredStar"> * </span></label>
                  <select class="form-control select2" multiple="multiple"
                    style="width: 100%;" name="cities[]">
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                  </select>
                </div>

              <div class="form-group col-md-6">
                <label>{{ trans('messages.categories') }}<span class="requiredStar"> * </span></label>
                <select class="form-control"  name="category_id">
                  <option value="0">---</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.discount')}}</label>
                <input type="number" class="form-control" name="discount" value="{{old('discount')}}">
              </div>
              
              <div class="col-md-6">
                <label>{{trans('messages.image')}}<span class="requiredStar"> * </span></label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.favourite')}}</label>
                <input type="checkbox" name="is_favourite" value="1">
              </div>

              <div class="col-md-12">
                <div class="edit_block"><button type="submit" class="btn btn-primary">{{trans('messages.add')}}</button></div>
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
@section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
  <script>
  $('document').ready(function(){
  //Initialize Select2 Elements
  $('.select2').select2(); 
  });
</script>
@endsection