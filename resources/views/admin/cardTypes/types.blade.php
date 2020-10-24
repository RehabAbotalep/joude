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
                    <h5>{{trans('messages.cards.type')}}</h5><br><br>
                    @include('admin.includes.error')
                    <form action="{{ route('type.store') }}" method="Post">
                        @csrf
                        <div class="row insearch_blogs">
                            <div class="col-md-6">
                                <label>{{trans('messages.name.ar')}}</label>
                                <input type="text" class="form-control" name="name_ar" value="{{old('name_ar')}}">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.name.en')}}</label>
                                <input type="text" class="form-control" name="name_en" value="{{old('name_en')}}">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.price')}}</label>
                                <input type="number" class="form-control" name="price" value="{{old('price')}}">
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.month')}}</label>
                                <input type="number" class="form-control" name="month_number" value="{{old('month_number')}}">
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
                            <th>{{trans('messages.price')}}</th>
                            <th>{{trans('messages.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cardTypes as $type)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$type->name}}</td>
                            <td>{{$type->price}} {{trans('messages.sr')}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('type.edit',$type->id)}}">{{trans('messages.update')}}</a>
                                <form id="delete-form-{{$type->id}}" action="{{route('type.destroy',$type->id)}}" style="display: none;" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>
                                <a  class="btn btn-danger" href="#" onclick="if(confirm('Are You Sure, Delete This')){
                                    event.preventDefault;
                                    document.getElementById('delete-form-{{$type->id}}').submit();
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
                        <th>{{trans('messages.name')}}</th>
                        <th>{{trans('messages.price')}}</th>
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