<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
 @if(App::getLocale() == 'ar')
 	<link rel="stylesheet" type="text/css" href="{{asset('admin/ar/css/bootstrap.css')}}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/ar/css/bootstrap-rtl.css')}}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/ar/css/style.css')}}" media="all" />

	<link rel="stylesheet" type="text/css" href="{{asset('admin/ar/css/font-awesome1.css')}}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/ar/css/font-awesome.css')}}" media="all" />
	<script src="{{asset('admin/ar/js/jquery-1.12.1.js')}}"></script>
	<script src="{{asset('admin/ar/js/jquery-migrate-1.2.1.min.js')}}"></script>

	<link href="{{asset('admin/ar/css/summernote.css')}}" rel="stylesheet">
	<script src="{{asset('admin/ar/js/summernote.js')}}"></script>

	<link rel="stylesheet" href="{{asset('admin/ar/css/responsive.css')}}">
 	
 @else
 	<link rel="stylesheet" type="text/css" href="{{ asset('admin/en/css/bootstrap.css') }}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/en/css/style.css') }}" media="all" />


	<link rel="stylesheet" type="text/css" href="{{ asset('admin/en/css/font-awesome1.css')}}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{asset( 'admin/en/css/font-awesome.css' )}}" media="all" />
	<script src="{{ asset('admin/en/js/jquery-1.12.1.js') }}"></script>
	<script src="{{ asset('admin/en/js/jquery-migrate-1.2.1.min.js') }}"></script>

	<link href="{{ asset('admin/en/css/summernote.css')}}" rel="stylesheet">
	<script src="{{ asset('admin/en/js/summernote.js')}}"></script>

	<link rel="stylesheet" href="{{ asset('admin/en/css/responsive.css')}}">
 @endif


<!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->

@section('style')
@show