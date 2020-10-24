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
            <div class="col-md-12" >
                <div class="blog_tablesearch">
                    <h5>{{trans('messages.user.add')}}</h5><br><br>
                    @include('admin.includes.error')
                    <form action="{{ route('user.store') }}" method="Post">
                        @csrf
                        <div class="row insearch_blogs">
                            <div class="col-md-6">
                                <label>{{trans('messages.name')}} <span class="requiredStar"> * </span></label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.email')}}   <span class="requiredStar"> * </span></label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.mobile')}}   <span class="requiredStar"> * </span></label>
                                <input type="number" class="form-control" name="mobile" value="{{old('mobile')}}">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.password')}}   <span class="requiredStar"> * </span></label>
                                <input type="password" class="form-control" name="password" value="{{old('password')}}">
                            </div>
                            <div class="col-md-6">
                                
                                <label>{{trans('messages.active')}}</label>
                                <input type="checkbox" name="is_active" value="1">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.admin')}}</label>
                                <input type="checkbox" name="is_admin" value="1">
                            </div>
                            
                            <div class="col-md-12">
                                <div class="edit_block"><button type="submit" class="btn btn-primary">{{trans('messages.add')}}</button></div>
                                <!--edit_block-->
                            </div>
                        </div>
                        <!--row-->
                    </form>
                </div>
            </div>
            <!--row-->
        </div>
        <!--blog_tablesearch-->
    </div>
    <!--col-md-12-->
    
    <div class="col-md-12">
        <div class="blog_tablesearch">
            <div class="table-responsive">
                <table id="example" class="table table_check table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>{{trans('messages.number')}}</th>
                            <th>{{trans('messages.name')}}</th>
                            <th>{{trans('messages.email')}}</th>
                            <th>{{trans('messages.mobile')}}</th>
                            <th>{{trans('messages.status')}}</th>
                            <th>{{trans('messages.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>
                                @if( $user->is_active == 1)
                                {{trans('messages.active')}}
                                @else
                                {{trans('messages.notActive')}}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{route('user.edit',$user->id)}}">{{trans('messages.update')}}</a>
                                <form id="delete-form-{{$user->id}}" action="{{route('user.destroy',$user->id)}}" style="display: none;" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>
                                @if($user->is_admin == 0)
                                    <a  class="btn btn-danger" href="#" onclick="if(confirm('Are You Sure, Delete This')){
                                    event.preventDefault;
                                    document.getElementById('delete-form-{{$user->id}}').submit();
                                    }else{
                                    event.preventDefault;
                                    }
                                ">{{trans('messages.delete')}}</a>
                                @if( $user->is_active == 1)
                                <a class="btn btn-primary" href="{{route('user.deactive',$user->id)}}">{{trans('messages.cancelActive')}}</a>
                                @else
                                <a class="btn btn-primary" href="{{route('user.active',$user->id)}}">{{trans('messages.submitActive')}}</a>
                                @endif
                                @endif
                                
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    
                    <tfoot>
                    <tr>
                        <th>{{trans('messages.number')}}</th>
                        <th>{{trans('messages.name')}}</th>
                        <th>{{trans('messages.email')}}</th>
                        <th>{{trans('messages.mobile')}}</th>
                        <th>{{trans('messages.status')}}</th>
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