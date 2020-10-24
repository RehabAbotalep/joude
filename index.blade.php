@extends('layouts.teacher')

@section('css')
<link href="{{asset('front/css/ask-question.css')}}" rel="stylesheet">
<link href="{{asset('front/css/lity.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    @include('front.questions.search')
    <!--start how-to-reserve-->
    <section class="how-to-reserve clearfix">
        <div class="container">
            <h2>
                @lang('all.how_to_have_answer')   
            </h2>
            <div class="row">
                <!--start step-->
                <div class="col-md-3 col-sm-6">
                    <span class="steps-no">
            1
            </span>
                    <img src="{{asset('front/images/question/thinking.png')}}" class="img-responsive">
                    <p>
                        @lang('all.ask_your_q')   
                    </p>
                </div>
                <!--end step-->

                <!--start step-->
                <div class="col-md-3 col-sm-6">
                    <span class="steps-no">
            2
            </span>
                    <img src="{{asset('front/images/question/info.png')}}" class="img-responsive">
                    <p>
                        @lang('all.recieve_answer')   
                    </p>
                </div>
                <!--end step-->

                <!--start step-->
                <div class="col-md-3 col-sm-6">
                    <span class="steps-no">
            3
            </span>
                    <img src="{{asset('front/images/question/like.png')}}" class="img-responsive">
                    <p>
                        @lang('all.accept_answer')   
                         </p>
                </div>
                <!--end step-->
                <!--start step-->
                <div class="col-md-3 col-sm-6">
                    <span class="steps-no">
            4
            </span>
                    <img src="{{asset('front/images/question/rate.png')}}" class="img-responsive">
                    <p>
                        @lang('all.rate')
                        
                    </p>
                </div>
                <!--end step-->
            </div>
            <div class="row steps-btns">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-warning btn-block" onclick="window.location.href='{{url('/ask-expert')}}'">
               @lang('all.have_q_ask_new_q')   
                    </button>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-trans btn-block" onclick="window.location.href='{{url('/help')}}'">
                @lang('all.want_instant_help_and_answer')   
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!--end how-to reserve-->
     <!--start interactive-room-->
    <section class="clearfix interactive-room">
        <div class="container">
            <img src="{{asset('front/images/study/play.png')}}" class="img-responsive">
            <p>
            <a href="{{$video->video}}" data-lity>
                @lang('all.see_illustrative_video')   
            </a>
            </p>
        </div>
    </section>
    <!--end interactive-room-->
   
@if( isset($questions) && $questions->count() > 0)
    <!--start recent-q-->
    <section class="recent-q clearfix">
        <div class="container">
            <h2>
                @lang('all.questions') 
                @lang('all.been_answered_recently')   
            </h2>
            <p class="recent-a">
                <a href="{{url()->current()}}?type=all">
        @lang('all.watch_all_qs')   
        </a> |
                <a href="{{url()->current()}}?type=views">
            @lang('all.most_viewed')   
            </a>
            </p>
            <div class="row">
            @if(request('type') == 'book')
                @foreach($questions as $book)
                    @if($book->book->status == 1)
                        <!--start one-rescent-question-->
                        <div class="one-recent-question col-md-3">
                            <div class="viewQuestion">
                                <p class="one-recent-q">
                                        <span>
                                        @lang('all.the_question'):
                                        </span> {{substr($book->question, 0, 60) . '...'}}
                                    </p>
                                    <button class="btn btn-danger" onclick="window.location.href='{{url("/book-solution-result/$book->id")}}'">
                                @lang('all.view_answer')   
                                </button>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i> {{$book->share}}
                                    </div>
                                    
                                    <div class="col-xs-6">
                                        <i class="fa fa-eye" aria-hidden="true"></i> {{$book->views}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end one-recent-question-->
                    @endif
                @endforeach
            @elseif(request('type') == 'questions')
                @foreach($questions as $book)
                        <!--start one-rescent-question-->
                        <div class="one-recent-question col-md-3">
                            <div class="viewQuestion">
                                <p class="one-recent-q">
                                        <span>
                                        @lang('all.the_question'):
                                        </span> {{substr($book->question, 0, 60) . '...'}}
                                    </p>
                                    <button class="btn btn-danger" onclick="window.location.href='{{url("/question-result/$book->id")}}'">
                                @lang('all.view_answer')   
                                </button>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i> {{$book->share}}
                                    </div>
                                    
                                    <div class="col-xs-6">
                                        <i class="fa fa-eye" aria-hidden="true"></i> {{$book->views}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end one-recent-question-->

                @endforeach
            @else
                @foreach($questions as $group)
                    @foreach($group->askQuestions as $question)
                        <!--start one-rescent-question-->
                        <div class="one-recent-question col-md-3">
                        <div class="viewQuestion">
                            <p class="one-recent-q">
                                <span>
                                @lang('all.the_question'):
                                </span> {{substr($question->question, 0, 60) . '...'}}
                            </p>
                            <p class="one-recent-answer">
                                <span>
                            الإجابة بواسطة : 
                            </span> د.{{$group->teacher->name}}
                            </p>
                            <button class="btn btn-danger" onclick="window.location.href='{{url("/question-result/$question->id")}}'">
                        @lang('all.view_answer')   
                        </button>
                        </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>{{$question->share}}
                                    </div>
                                    <div class="col-xs-4">
                                        <i class="fa fa-star-o" aria-hidden="true"></i> {{$question->rates}}
                                    </div>
                                    <div class="col-xs-4">
                                        <i class="fa fa-eye" aria-hidden="true"></i> {{$question->views}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end one-recent-question-->
                    @endforeach
                @endforeach
            @endif
            
            </div>
        </div>
    </section>
    <!--end recent-q-->

    @else
     <!--start recent-q-->
     <section class="recent-q clearfix">
        <div class="container">
            <h2>
                @lang('all.no_results')
            </h2>
        </div>
    </section>
@endif
    <!--start wahah-ask-q-->
    <section class="wahah-ask-q clearfix">
        <div class="container">
       <h2>
       @lang('all.wahah_ask_q') 
       </h2>
       <p class="subTitle">
       @lang('all.wahah_ask_q_space') 
       </p>
        <div class="row w-ask">
            <div class="col-md-4">
                <img class="img-responsive" src="{{asset('front/images/question/money.png')}}">
                <h4>
                    @lang('all.subscribe_with_less_money')   
                </h4>
                <p>
                    @lang('all.suitable_prices_students')   
                </p>
            </div>

            <div class="col-md-4">
                <img class="img-responsive" src="{{asset('front/images/question/books.png')}}">
                <h4>
                    @lang('all.answers_syllabus')   
                </h4>
                <p>
                    @lang('all.dummy_text')   
                    </p>
            </div>
            
            <div class="col-md-4">
                <img class="img-responsive" src="{{asset('front/images/question/progress.png')}}">
                <h4>
                    @lang('all.improve_progress')   
                </h4>
                <p>
                    @lang('all.suitable_envirnoment')   
                @lang('all.academic_focus')   
                    .
                </p>
            </div>


        </div>
        </div>
    </section>
    <!--end wahah-ask-q-->
    <!--start have-qs-->
    <section class="have-qs clearfix">
        <div class="container">
        <p>
        
            @lang('all.have_q_in_syllabus')   
        ؟
            </p>
            <p>
            @lang('all.wahah_experts_have_answers')   
            </p>
            
        </div>
    </section>
    <!--end have-qs-->
@endsection


@section('js')
    <script src="{{asset('front/js/ask-question.js')}}"></script>
    <script src="{{asset('front/js/lity.min.js')}}"></script>
    @if ( !empty(request('questions')) || !empty(request('book')))
	<script type="text/javascript">
		$([document.documentElement, document.body]).animate({
        scrollTop: $(".interactive-room").offset().top
    }, 2000);
	</script>
@endif
@endsection


