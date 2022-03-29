<!DOCTYPE html>
<html dir="ltr" lang="en-US">
@include('themes.web.head')
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		@include('themes.web.header')
        <!-- #header end -->

		<!-- Content
		============================================= -->
		{{$slot}}
        <!-- #content end -->

		<!-- Footer
		============================================= -->
		@include('themes.web.footer')
        <!-- #footer end -->
	</div>
    <!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	@include('themes.web.js')
	@yield('custom_js')
</body>
</html>