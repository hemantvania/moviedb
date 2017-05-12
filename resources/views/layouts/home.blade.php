<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.head')
</head>
<body>
<div class="container">
  @include('includes.header')
  @yield('content')
</div><!--end-container-->
<footer>
  <div class="container">
	 @include('includes.footer')
  </div>
</footer><!--end-footer-->
	 @include('includes.footerscripts')
</body>
</html>