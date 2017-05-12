<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ URL::asset('assets/admin/js/jquery-2.1.4.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{{ URL::asset('assets/admin/js/jquery-1.11.3.min.js') }}"></script>
<![endif]-->

<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src=\"{{ URL::asset('assets/admin/js/jquery.mobile.custom.min.js') }} \" >"+"<"+"/script>");
</script>

<script src="{{ URL::asset('assets/admin/js/functions.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>

<!-- ace scripts -->
<script src="{{ URL::asset('assets/admin/js/ace-elements.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/ace.min.js') }}"></script>
