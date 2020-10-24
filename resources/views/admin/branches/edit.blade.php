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
          <form action="{{ route('branch.update',$branch->id) }}" method="Post">
            @csrf
            {{method_field('PUT')}}
            <div class="row insearch_blogs">
              <div class="col-md-6">
                <label>{{trans('messages.address.ar')}}</label>
                <input type="text" class="form-control" name="address_ar" value="{{$branch->address_ar}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.address.en')}}</label>
                <input type="text" class="form-control" name="address_en" value="{{$branch->address_en}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.phone')}}</label>
                <input type="number" class="form-control" name="phone" value="{{$branch->phone}}">
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.email')}}</label>
                <input type="email" class="form-control" name="email" value="{{$branch->email}}">
              </div>
              <div class="form-group col-md-6">
                <label>{{ trans('messages.cities') }}</label>
                <select class="form-control"  name="city_id" id="city">
                  <option value="0">---</option>
                  @foreach($cities as $city)
                  <option value="{{ $city->id }}">{{ $city->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>{{ trans('messages.regions') }}</label>
                <select name="region_id" id="region" class="form-control">
                  <option></option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>{{ trans('messages.stores') }}</label>
                <select class="form-control"  name="store_id">
                  <option value="0">---</option>
                  @foreach($stores as $store)
                  <option value="{{ $store->id }}"
                     @if( $branch->store_id == $store->id )
                      selected
                    @endif
                    >{{ $store->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-12">
                <div class="edit_block"><button type="submit" class="btn btn-primary">{{trans('messages.update')}}</button></div>
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