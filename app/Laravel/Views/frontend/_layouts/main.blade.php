
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link href="/frontend/images/favicon.png?v=1.0" rel="shortcut icon" type="image/png">
	<link href="/frontend/images/apple-icon.png?v=1.0" rel="icon" type="image/png">
	<title>WaveOne</title>
	@include('frontend._includes.styles')
	@yield('page-styles')
</head>
<body>
	@include('frontend._includes.header')
	@yield('content')
	@include('frontend._includes.footer')
	@include('frontend._includes.scripts')
	@yield('page-scripts')
</body>
</html>