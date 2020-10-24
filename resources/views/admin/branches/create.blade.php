@extends('admin.app')
@section('style')
@endsection
@section('main-content')
<div class="wrapper_cols">
  <div class="col_page_content">
    <div class="row">
      <div class="col-md-12" >
        <div class="blog_tablesearch">
          <h5>{{trans('messages.branches')}}</h5><br><br>
          @include('admin.includes.error')
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif
          <form action="{{route('branch.add')}}" method="Post">
            @csrf
            <div class="row insearch_blogs">
              <div class="col-md-6">
                <label>{{trans('messages.address.ar')}} <span class="requiredStar"> * </span></label>
                <input type="text" class="form-control" name="address_ar" value="{{old('address_ar')}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.address.en')}}   <span class="requiredStar"> * </span></label>
                <input type="text" class="form-control" name="address_en" value="{{old('address_en')}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.phone')}}   <span class="requiredStar"> * </span></label>
                <input type="number" class="form-control" name="phone" value="{{old('phone')}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.email')}}   <span class="requiredStar"> * </span></label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}">
              </div>
              <div class="form-group col-md-6">
                <label>{{ trans('messages.stores') }}</label>
                <select class="form-control"  name="store_id" id="store">
                  <option value="0">---</option>
                  @foreach($stores as $store)
                  <option value="{{ $store->id }}">{{ $store->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
                <label>{{ trans('messages.cities') }}</label>
                <select class="form-control"  name="city_id" id="city">
                  <option></option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>{{ trans('messages.regions') }}</label>
                <select name="region_id" id="region" class="form-control">
                  <option></option>
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
@section('script')

<script type="text/javascript">
$("#store").change(function(){
$.ajax({
url: "{{ route('loadCities') }}?store_id=" + $(this).val(),
method: 'GET',
success: function(data) {
console.log(data.input);
$('#city').html(data.input);
}
});
});
</script>

<script type="text/javascript">
$("#city").change(function(){
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