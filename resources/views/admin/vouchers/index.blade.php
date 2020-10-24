@extends('admin.app')
@section('style')
@endsection
@section('main-content')
<div class="wrapper_cols">
    <div class="col_page_content">
        
        <div class="row">
            <div class="col-md-12">
                <div class="blog_tablesearch">
                    <div class="container_table">
                        <table id="table" class="table table_check table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{trans('messages.number')}}</th>
                                    <th>{{trans('messages.name')}}</th>
                                    <th>{{trans('messages.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vouchers as $voucher)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$voucher->name}}</td>
                                    <td>
                                        <form id="delete-form-{{$voucher->id}}" action="{{route('voucher.destroy',$voucher->id)}}" style="display: none;" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a  class="btn btn-danger" href="#" onclick="if(confirm('Are You Sure, Delete This')){
                                            event.preventDefault;
                                            document.getElementById('delete-form-{{$voucher->id}}').submit();
                                            }else{
                                            event.preventDefault;
                                            }
                                            ">{{trans('messages.delete')}}</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        </div><!--container_table-->
                        </div><!--blog_tablesearch-->
                        </div><!--col-md-3-->
                        </div><!--row-->
                        </div><!--col_page_content-->
                        </div><!--wrapper_cols-->
                        @endsection