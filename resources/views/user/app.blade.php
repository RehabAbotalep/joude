<!DOCTYPE html>
<html>
	<head>
		<title></title>
		@include('user.includes.head')
		@section('style')
	</head>
	<body>
		
		@include('user.includes.header')
			
		@yield('main-content')

		@include('user.includes.footer')
		
		<!--website_containner--> 
		@section('script')
	</body>
</html>