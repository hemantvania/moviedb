<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
@yield('pagetitle')
@include('includes.admin-head')
</head>
<body class="no-skin">
@include('includes.admin-header')
<div class="main-container ace-save-state" id="main-container">
<script type="text/javascript">
	try{ace.settings.loadState('main-container')}catch(e){}
</script>
	@include('includes.admin-sidebar')
	<div class="main-content">
		<div class="main-content-inner">
			@yield('content')
		</div>
	</div>
    <footer>
        <div class="container">
        @include('includes.admin-footer')
        </div>
    </footer><!--end-footer-->
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div>
@include('includes.admin-footerscripts')
@yield('pagescripts')
</body>
</html>