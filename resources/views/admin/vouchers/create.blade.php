@extends('admin.app')
@section('style')
@endsection
@section('main-content')
   <div class="wrapper_cols">
    <div class="col_page_content">
      <div class="row">
        <div class="col-md-12" >
          <div class="blog_tablesearch">
            <h5>{{trans('messages.voucher.add')}}</h5><br><br>
            @include('admin.includes.error')
            <form action="{{route('voucher.add')}}" method="Post">
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
              <div class="form-group col-md-4">
                <label>{{ trans('messages.stores') }}</label>
                <select class="form-control"  name="store_id">
                  <option value="0">---</option>
                  @foreach($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-12">
                <div class="edit_block"><button type="submit" class="btn btn-primary">{{trans('messages.add')}}</button></div>
                <!--edit_block--> 
              </div>
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