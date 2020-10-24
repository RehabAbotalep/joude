<div class="footer">{{trans('messages.footer')}}</div><!--copy_site-->
<script>
$(document).ready(function() {
  $('#summernote1').summernote({
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
  });
});
</script>
<script>
$(document).ready(function() {
  $('#summernote2').summernote({
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
  });
});
</script>
@if(App::getLocale() == 'ar')
	<script src="{{asset('admin/ar/js/bootstrap.min.js')}}"></script> 
	<script type="text/javascript" src="{{asset('admin/ar/js/index.js')}}"></script>
@else
	<script src="{{asset('admin/en/js/bootstrap.min.js')}}"></script> 

	<script type="text/javascript" src="{{asset('admin/en/js/index.js')}}"></script>
@endif
@section('script')
@show