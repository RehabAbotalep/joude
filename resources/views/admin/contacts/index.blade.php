@extends('admin.app')
@section('style')
<!--dataTables-->
@if(App::getLocale() == 'ar')
<link rel="stylesheet" type="text/css" href="{{asset('admin/ar/css/dataTables.bootstrap.min.css')}}" media="all" />
<!--<link rel="stylesheet" type="text/css" href="css/rowReorder.dataTables.min.css">-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/ar/css/responsive.dataTables.min.css')}}">
@else
<link rel="stylesheet" type="text/css" href="{{asset('admin/en/css/dataTables.bootstrap.min.css')}}" media="all" />
<!--<link rel="stylesheet" type="text/css" href="css/rowReorder.dataTables.min.css">-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/en/css/responsive.dataTables.min.css')}}">
@endif
@endsection
@section('main-content')
<div class="wrapper_cols">
    <div class="col_page_content">
        <div class="row">
            
            <div class="col-md-12">
                <div class="blog_tablesearch">
                    <div class="table-responsive">
                        <table id="example" class="table table_check table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{trans('messages.number')}}</th>
                                    <th>{{trans('messages.message')}}</th>
                                    <th>{{trans('messages.by')}}</th>
                                    <th>{{trans('messages.send.at')}}</th>
                                    <th>{{trans('messages.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$contact->message}}</td>
                                    @if($contact->user)
                                        <td>{{$contact->user->email}}</td>
                                    @else
                                        <td>{{$contact->email}}</td>
                                    @endif
                                    
                                    <td>{{$contact->created_at->toDateString()}}</td>
                                    <td>
                                        <form id="delete-form-{{$contact->id}}" action="{{route('contact.destroy',$contact->id)}}" style="display: none;" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a  class="btn btn-danger" href="#" onclick="if(confirm('Are You Sure, Delete This')){
                                            event.preventDefault;
                                            document.getElementById('delete-form-{{$contact->id}}').submit();
                                            }else{
                                            event.preventDefault;
                                            }
                                        ">{{trans('messages.delete')}}</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                            <tfoot>
                            <tr>
                                <th>{{trans('messages.number')}}</th>
                                <th>{{trans('messages.message')}}</th>
                                <th>{{trans('messages.by')}}</th>
                                <th>{{trans('messages.send.at')}}</th>
                                <th>{{trans('messages.action')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!--table-responsive-->
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
<script src="{{asset('admin/ar/js/jquery-1.12.1.js')}}"></script>
<!--dataTables-->
<script src="{{asset('admin/ar/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/ar/js/dataTables.bootstrap.min.js')}}"></script>
<!--<script type="text/javascript" language="javascript" src="js/dataTables.rowReorder.min.js"></script>-->
<script type="text/javascript" language="javascript" src="{{asset('admin/ar/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" class="init">
$(document).ready(function() {
var table = $('#example').DataTable( {
paging: false,
searching: false
responsive: true
} );
} );
</script>
<!--dataTables-->
<script>
function filterColumn ( i ) {
$('#example').DataTable().column( i ).search(
$('#col'+i+'_filter').val()
).draw();
}
$(document).ready(function() {
$('#example').DataTable();
$('input.column_filter').on( 'keyup click', function () {
filterColumn( $(this).parents('div').attr('data-column') );
})
$('select.column_filter').on('change', function () {
filterColumn( $(this).parents('div').attr('data-column') );
});
;});
</script>
@endsection