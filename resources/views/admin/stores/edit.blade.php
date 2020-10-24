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
            <form action="{{ route('store.update',$store->id) }}" method="Post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="row insearch_blogs">
              <div class="col-md-6">
                <label>{{trans('messages.name.ar')}}</label>
                <input type="text" class="form-control" name="name_ar" value="{{$store->name_ar}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.name.en')}}</label>
                <input type="text" class="form-control" name="name_en" value="{{$store->name_en}}">
              </div>
              <div class="col-md-12">
                <label>{{trans('messages.description.ar')}}</label>
                <textarea class="form-control" name="description_ar">{{$store->description_ar}}</textarea>
              </div>
              <div class="col-md-12">
                <label>{{trans('messages.description.en')}}</label>
                <textarea class="form-control" name="description_en">{{$store->description_en}}</textarea>
              </div>

              <div class="col-md-6">
                  <label>{{trans('messages.cities')}}</label>
                  <select class="form-control select2" multiple="multiple"
                    style="width: 100%;" name="cities[]">
                    @foreach($cities as $city)
                    <option value="{{$city->id}}"
                      @foreach($store->cities as $storeCity)
                        @if($storeCity->id == $city->id)
                          selected
                        @endif
                      @endforeach 
                      >{{$city->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                <label>{{ trans('messages.categories') }}</label>
                <select class="form-control"  name="category_id">
                  <option value="0">---</option>
                  @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                      
                      @if($store->category->id == $category->id)
                          selected
                      @endif 
                      >{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.discount')}}</label>
                <input type="number" class="form-control" name="discount" value="{{$store->discount}}">
              </div>
              
              <div class="col-md-6">
                <label>{{trans('messages.image')}}</label>
                <input type="file" class="form-control" name="image">
              </div>

              <div class="col-md-6">
                <label>{{trans('messages.favourite')}}</label>
                <input type="checkbox" name="is_favourite" value="1" 
                @if($store->is_favourite == 1) checked @endif>
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