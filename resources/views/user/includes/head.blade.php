<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Card</title>
@if(App::getLocale() == 'ar')

	<link rel="stylesheet" type="text/css" href="{{asset('user/ar/css/bootstrap.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('user/ar/css/bootstrap-rtl.css')}}" media="all" />
    <link rel="stylesheet" href="{{asset('user/ar/css/fontawsome/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/ar/css/style_site.css')}}" media="all" />
    <link rel="stylesheet" href="{{asset('user/ar/css/jquery-ui.css')}}">
    <link href="{{asset('user/ar/css/animate.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('user/ar/css/responsive.css')}}">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{asset('user/ar/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/ar/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-rtl.css" media="all" />
    <link rel="stylesheet" href="css/fontawsome/all.css">
    <link rel="stylesheet" type="text/css" href="css/style_site.css" media="all" />
@else

	<link rel="stylesheet" type="text/css" href="{{asset('user/en/css/bootstrap.css')}}" media="all" />
	<link rel="stylesheet" href="{{asset('user/en/css/fontawsome/all.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('user/en/css/style_site.css')}}" media="all" />
	<link rel="stylesheet" href="{{asset('user/en/css/jquery-ui.css')}}">
	<link href="{{asset('user/en/css/animate.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{{asset('user/en/css/responsive.css')}}">

	<!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{asset('user/en/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/en/css/owl.theme.default.min.css')}}">
@endif

@yield('style')
