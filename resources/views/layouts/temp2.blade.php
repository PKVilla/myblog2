<!DOCTYPE html>
<html>
<head>
		<title>@yield('title')</title>
		@include('layouts.landingheader')
</head>
</html>
<body>
	@yield('content')
	<script src="/{{'js/owl.carousel.min.js'}}"></script>
	<script src="/{{'js/swiper.min.js'}}"></script>
	<script src="/{{'js/script.js'}}"></script>
</body>