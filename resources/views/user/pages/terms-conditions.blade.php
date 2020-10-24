@extends('user.app')
@section('style')
@endsection
@section('main-content')
	<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="index.html"><i class="fa fa-home"></i> / </a> {{ trans('messages.terms') }} </h2>
                        <div class="decor"><span></span></div>
                    </div>
                    <!--titlepages-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--slider_block-->
    <section class="blocks_sections shared_block conditions_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_style">
                        <div class="title"> {{ $terms->name }} </div>
                        <div class="decor"><span></span></div>
                    </div>
                    <!--title_style-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="conditions_content">
                        <p>
                            {!!$terms->content !!}
                        </p>
                        <form>
                            <div class="ininput_newblog">
                                <div class="input_job">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="f-option" name="selector">
                                            <label for="f-option"><span class="flaticon-travel"></span> accepted terms &
                                            Conditions . </label>
                                            <div class="check"></div>
                                        </li>
                                    </ul>
                                </div>
                                <!--in_form_blog_inner-->
                            </div>
                            <!--in_form_blog_inner-->

                            <div class="readmore-button readmore-button2">
                                <button>Accepted</button>
                            </div>
                        </form>

                    </div>
                    <!--text-->
                </div>
                <!--col-md-6 col-lg-6-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--start_blockhome-->
@endsection