<!DOCTYPE html>
<html>
<head>
	  <title>@yield('title')</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="{{ asset('public/js/custom.js') }}"></script>
</head>
<body>
	@if(Auth::check())
	<a href="{{ url('logout') }}" target="_blank">@lang('msg.logout')</a>
	@endif
	@include('master.header')
    @yield('content')
           
    @include('master.footer')
</body>
</html>