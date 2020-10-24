@extends('user.app')
@section('style')	
@endsection

@section('main-content')
	<section class="slider_block slider_block_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlepages title_style">
                        <h2><a href="{{ route('home') }}"><i class="fa fa-home"></i> / </a> {{ trans('messages.my.cards') }}</h2>
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
    <section class="blocks_sections shared_block accountpage">
        <div class="appointment-faq-bg wow zoomInLeft" data-wow-delay="0.5s"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_style">
                        <div class="title">{{ trans('messages.my.cards') }}.</div>
                        <div class="decor"><span></span></div>
                    </div>
                    <!--title_style-->
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="account_blog login_blog">

                        <div class="account_blogrows media">
                            
                                <div class="details_account media-body">
                                @foreach($cards as $card)
                                <ul>
                                    <li>
                                        <i class="fas fa-credit-card"></i>
                                        <label>{{ trans('messages.card.number') }} :</label>{{ $card->card_number }} 
                                    </li>
                                    <li>
                                        <i class="fas fa-mobile-alt"></i>
                                        <label>{{ trans('messages.subscription.date') }} :</label> {{ $card->created_at->toDateString() }}
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <label>{{ trans('messages.subscription.expire') }} :</label> {{ $card->expire_date }}
                                    </li>
                                    <li>
                                        <i class="fas fa-lock"></i>
                                        <label>{{ trans('messages.payment.method') }} :</label>{{ $card->payment_method }} 
                                    </li>
                                    <li>
                                        <i class="fas fa-lock"></i>
                                        <label>{{ trans('messages.status') }} :</label> 
                                        @if($card->status == 1)
                                            <span class="label label-success statusbadge">Active</span>
                                        @else
                                        <span class="label label-danger statusbadge">Deactive</span>
                                        @endif
                                        
                                    </li>
                                </ul>
                                <!--details_account -->
                           
                            @endforeach
                             </div>

                        </div>
                        <!--account_blogrows-->
                    </div>
                    <!--login_blog-->

                </div>
                <!--col-md-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    
    </section>
@endsection