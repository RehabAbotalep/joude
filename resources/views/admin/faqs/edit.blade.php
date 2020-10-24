@extends('admin.app')
@section('main-content')
<div class="wrapper_cols">
    <div class="col_page_content">
        <div class="row">
            <div class="col-md-12" >
                <div class="blog_tablesearch">
                    @include('admin.includes.error')
                    <form action="{{ route('faq.update',$faq->id)  }}" method="Post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row insearch_blogs">
                            <div class="col-md-6">
                                <label>{{trans('messages.question.ar')}}</label>
                                <textarea class="form-control" name="question_ar">{{$faq->question_ar}}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.question.en')}}</label>
                                <textarea class="form-control" name="question_en">{{$faq->question_en}}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.answer.ar')}}</label>
                                <textarea class="form-control" name="answer_ar">{{$faq->answer_ar}}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label>{{trans('messages.answer.en')}}</label>
                                <textarea class="form-control" name="answer_en">{{$faq->answer_en}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="edit_block"><button type="submit" class="btn btn-primary">{{trans('messages.update')}}</button></div>
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
    
</div>
<!--row-->
</div>
<!--col_page_content-->
</div>
<!--wrapper_cols-->
@endsection
@section('script')
<script src="{{asset('admin/ar/js/bootstrap.min.js')}}"></script>
<script>
$(document).ready(function() {
$('#summernote').summernote({
height: 300,                 // set editor height
minHeight: null,             // set minimum height of editor
maxHeight: null,             // set maximum height of editor
focus: true                  // set focus to editable area after initializing summernote
});
});
</script>
<script type="text/javascript" src="{{asset('admin/arjs/index.js')}}"></script>
@endsection