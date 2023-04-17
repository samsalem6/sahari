<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >

@include('admin.layouts.head')

<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">

			<header class="logo-env">

				<!-- logo -->
				<div class="logo">

					{{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="159.882" height="49.212" viewBox="0 0 2063 635">
						<metadata><?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?>
						<x:xmpmeta xmlns:x="adobe:ns:meta/" x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01        ">
							<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
								<rdf:Description rdf:about=""/>
							</rdf:RDF>
						</x:xmpmeta>


						<?xpacket end="w"?></metadata>
						<defs>
						<style>
							.cls-1, .cls-2 {
							font-size: 250px;
							text-anchor: middle;
							font-family: "Palatino Linotype";
							}

							.cls-1 {
							fill: #de4552;
							}

							.cls-2 {
							fill: #de4353;
							}
						</style>
						</defs>
						<image y="12" width="1967" height="614" xlink:href="data:img/png;base64,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"/>
						<text id="Amos" class="cls-1" x="1052.52" y="338.068"><tspan x="1052.52">Amos</tspan></text>
						<text id="Iajando" class="cls-2" x="962.538" y="538.538"><tspan x="962.538">Iajando</tspan></text>
					</svg> --}}
					<img src="{{ asset('/images/'.meta()->logo)}}" alt="" style="height: 55px;">
					
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse chat-visible">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>


				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>

			@include('admin.layouts.aside')

		</div>

	</div>

	<div class="main-content">

		<div class="row">

			@include('admin.layouts.header')

		</div>

		<hr />
		<script type="text/javascript">
		function getRandomInt(min, max)
		{
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		</script>

		<ol class="breadcrumb 2">
			<li>
				<a href="/home"><i class="fa-home"></i>@lang('lang.Home')</a>
			</li>

			<li class="active">
				<strong>@yield('title')</strong>
			</li>
		</ol>
		@include('admin.layouts.msg')
		@yield('content')
		<br />

		<!-- Footer -->
		<footer class="main">

			&copy; 2019 <strong> </strong>

		</footer>
	</div>

</div>

	<!-- Bottom scripts (common) -->
	<script src="/admin/js/gsap/TweenMax.min.js"></script>
	{{-- <script src="/admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script> --}}
	<script src="/admin/js/bootstrap.js"></script>
	<script src="/admin/js/joinable.js"></script>
	<script src="/admin/js/resizeable.js"></script>
	<script src="/admin/js/neon-api.js"></script>
	<script src="/admin/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<link rel="stylesheet" href="{{ asset('admin/js/dist/summernote.css')}}">
    <script src="{{ asset('admin/js/dist/summernote.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
	<script src="{{ asset('/front/js/jquery-ui.multidatespicker.js')}}"></script>
	
	<!-- Imported scripts on this page -->
	<script src="/admin/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="/admin/js/jquery.sparkline.min.js"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="/admin/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="/admin/js/neon-demo.js"></script>
	<script src="/admin/js/pricingTemplatesAdd.js"></script>
	<script>
		$(document).ready(function(){
          $(".alert").slideDown(300).delay(5000).slideUp(300);
    });
	</script>

	@yield('js')

</body>
</html>
