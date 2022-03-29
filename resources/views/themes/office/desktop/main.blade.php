<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	@include('themes.office.desktop.head')
	<!--end::Head-->
	<!--begin::Body-->
	@guest
	<body id="kt_body" class="page-loading-enabled page-loading bg-body">
	@endguest
	@auth
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed page-loading-enabled page-loading">
	@endauth
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="page-loader flex-column">
			<img alt="Logo" style="width:5%;" class="max-h-25px" src="{{asset('img/icon.png')}}" />
			<div class="d-flex align-items-center mt-5">
				<span class="spinner-border text-primary" role="status"></span>
				<span class="text-muted fs-6 fw-bold ms-5">{{__('button.please_wait')}}...</span>
			</div>
		</div>
		<div class="d-flex flex-column flex-root">
			@guest
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{asset('img/bg/123.png')}}">
				<!--begin::Content-->
				{{$slot}}
				<!--end::Content-->
				<!--begin::Footer-->
				<!--end::Footer-->
			</div>
			@endguest
			@auth
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				@include('themes.office.desktop.aside')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					@include('themes.office.desktop.header')
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						{{$slot}}
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					@include('themes.office.desktop.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
			@endauth
		</div>
		<!--end::Root-->
		@auth
		<!--end::Root-->
		<!--begin::Drawers-->
		<!--begin::Activities drawer-->
		{{-- @include('themes.office.activities') --}}
		<!--end::Activities drawer-->
		<!--begin::Chat drawer-->
		{{-- @include('themes.office.chat') --}}
		<!--end::Chat drawer-->
		<!--end::Drawers-->
		<!--end::Main-->
		<!--begin::Engage drawers-->
		<!--begin::Demos drawer-->
		{{-- @include('themes.office.demos') --}}
		<!--end::Demos drawer-->
		<!--begin::Help drawer-->
		{{-- @include('themes.office.help') --}}
		<!--end::Help drawer-->
		<!--end::Engage drawers-->
		<!--begin::Engage toolbar-->
		<div class="engage-toolbar d-flex position-fixed px-5 fw-bolder zindex-2 top-50 end-0 transform-90 mt-20 gap-2 d-none">
			<!--begin::Demos drawer toggle-->
			<button id="kt_engage_demos_toggle" class="engage-demos-toggle btn btn-flex h-35px bg-body btn-color-gray-700 btn-active-color-gray-900 shadow-sm fs-6 px-4 rounded-top-0" title="Check out 21 more demos" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-dismiss="click" data-bs-trigger="hover">
				<span id="kt_engage_demos_label">Demos</span>
			</button>
			<!--end::Demos drawer toggle-->
			<!--begin::Help drawer toggle-->
			<button id="kt_help_toggle" class="engage-help-toggle btn btn-flex h-35px bg-body btn-color-gray-700 btn-active-color-gray-900 shadow-sm px-5 rounded-top-0" title="Learn &amp; Get Inspired" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-dismiss="click" data-bs-trigger="hover">Help</button>
			<!--end::Help drawer toggle-->
			<!--begin::Purchase link-->
			<a href="https://1.envato.market/EA4JP" target="_blank" class="engage-purchase-link btn btn-color-gray-700 bg-body btn-active-color-gray-900' btn-flex h-35px px-5 shadow-sm rounded-top-0">Buy now</a>
			<!--end::Purchase link-->
		</div>
		<!--end::Engage toolbar-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Modals-->
		@include('themes.office.desktop.modal')
		<!--end::Modals-->
		@endauth
		@include('themes.office.desktop.drawer')
		@include('themes.office.desktop.js')
		@yield('custom_js')
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>