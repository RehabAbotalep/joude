<!DOCTYPE html>
<html>
	<head>
		<title></title>
		@include('admin.includes.head')
		@yield('style')
	</head>
	<body>
		<div class="website_containner">
			@include('admin.includes.header')
			
			@include('admin.includes.sidebar')
			@section('main-content')
			@show
			@include('admin.includes.footer')
		</div>
		<!--website_containner--> 
		@yield('script')
	</body>
</html>