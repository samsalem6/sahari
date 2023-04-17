<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="referrer" content="no-referrer-when-downgrade">
    <?php if(isset($package) && $package){?>
        <?php if($package->hot == "Offers"){?>
            <link hreflang="es-es" rel="canonical" href="{{env('APP_URL')}}/ofertas-de-viajes/<?php echo $package->slug;?>" />
        <?php }elseif($package->hot == "Cruceros-Nilo"){?>
            <link hreflang="es-es" rel="canonical" href="{{env('APP_URL')}}/cruceros-por-el-nilo/<?php echo $package->slug;?>" />
        <?php }else{ ?>
            <link hreflang="es-es" rel="canonical" href="/<?php echo $package->slug;?>" />
        <?php } ?>
    <?php }else{?>
    	<link hreflang="es-es" rel="canonical" href="{{ Request::fullUrl() }}" />
    <?php } ?>
	{{-- <link rel="alternate" href="https://www.vamos-viajando.com" hreflang="es-es" /> --}}
	{{-- <link rel="alternate" href="https://www.vamos-viajando.com" hreflang="es-mx" /> --}}
	{{-- <link rel="alternate" href="https://www.vamos-viajando.com" hreflang="es-pe" /> --}}
	{{-- <link rel="alternate" href="https://www.vamos-viajando.com" hreflang="es-ar" /> --}}
	{{-- <link rel="alternate" href="https://www.vamos-viajando.com" hreflang="es-py" /> --}}
	{{-- <link rel="alternate" href="https://www.vamos-viajando.com" hreflang="es-uy" /> --}}
	{{-- <link rel="alternate" href="https://www.vamos-viajando.com" hreflang="es-cl" /> --}}


	<style>
		.btn-number {
			background-color: #fff !important;
			border: 1px solid #ced4da !important;
			color: #666 !important;
			font-size: 10px !important;
			height: 35px !important;
			line-height: 35px !important;
			width: 35px !important;
		}
		.btn-number[data-type="minus"]{
			border-top-left-radius: 4px;
			border-bottom-left-radius: 4px;
		}
		.btn-number[data-type="plus"]{
			border-top-right-radius: 4px;
			border-bottom-right-radius: 4px;
		}
		.input-number {
			background-color: transparent !important;
			text-align: center;
			height: 35px !important;
			padding: 0px !important;
			margin: 0px !important;
			box-shadow: none !important;
			border: 1px solid #ced4da !important;
		}
		.btn-number[disabled] {
			color: lightgray;
			border-color: lightgray;
			cursor: not-allowed;
		}
	</style>

	<title>
		@hasSection('title')
		@yield('title')
		@else
		Vamos Viajando
		@endif
	</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@hasSection('meta')
    	@yield('meta')
	@else
		<meta name="title" content="Nile Cruise Vacation | Egypt Tours | Egypt Trips">
		<meta name="description" content="Powered by Memphis Tours. Big Variety of Egypt Tours Mixed with Nile Cruise Vacation, Red Sea Relaxation with the best online Prices.">
		<meta name="keywords" content="Nile Cruise Vacation | Egypt Tours | Egypt Trips">
    @endif

    <!-- Favicons-->
	<link rel="shortcut icon" href="{{ asset('images/profile.png')}}" type="image/x-icon">

	{{session()->put(['utm_source' => request()->utm_source])}}
	{{session()->put(['utm_campaign' => request()->utm_campaign])}}
	{{session()->put(['utm_term' => request()->utm_term])}}

    <!-- COMMON CSS -->
	<link href="{{ asset('/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/front/css/style_new.css?v=new')}}" rel="stylesheet">
	<link href="{{ asset('/front/css/vendors.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css"
	href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!-- CUSTOM CSS -->
	{{-- <link href="{{ asset('/front/css/custom.css')}}" rel="stylesheet"> --}}
	<style>
	.back-Inquire {
		position: fixed;
		bottom: 0px;
		width: 100%;
		display: none;
	}
    </style>

<style>
    .card-body a {color: #007bff !important}
    .new_price_box {
        border-radius: 15px 15px 0 0;
        border: 1px solid #eee;
        background-color: #fff;
    }
    .new_price_box_title {
        border-radius: 15px 15px 0px 0px;
        background: #09415d;
        text-align: center;
        font-size: 1.538rem;
        color: #fff;
        font-weight: bold;
        padding: 13px 0;
    }
    .new_price_box_prices {
        padding: 20px 10px;
        background-color: #fff;
    }
    .new_price_box_hotels {
        padding: 20px 10px;
    }
    .new-hotel-boxes-title {
        font-size: 1rem;
        text-align: left;
        color: #212121;
        margin: 9px 0;
    }
    .new-hotel-boxes-img {
        width: 100%;
        overflow: hidden;
        position: relative;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 135px;
    }
    ul.list-inline {
        flex-direction: row;
    }
    .new-hotel-boxes ul li {
        margin-bottom: 0;
        padding-left: 0;
        position: relative;
        list-style: none;
        display: inline-block;
        margin-right: 5px;
    }
    .new-hotel-boxes img {
        height: 17px;
        width: 17px;
    }
    .new_price_box_hotels ul li:before {
        display: none;
    }
    .new_price_box_sub_title {
        font-weight: bold;
        font-size: 1.538rem;
        text-align: left;
        color: #212121;
        margin-bottom: 10px;
    }
    .new_price_box_price_text{
        background: #fafafa;
        padding: 12px 16px;
    }
    .new_price_box_price_price {
        font-size: 1.538rem;
        color: #F5A31B;
        padding: 0px 10px;
    }
    .new_price_box_price_price .new_price_box_price_price_discount {
        color: #757575;
        font-size: 1rem;
    }

    .new-prices-tbl_title {
        width: 100%;
        font-size: 15px;
        font-weight: bold;
        color: #000;
        margin-bottom: 10px;
    }
    .new-prices-tbl_data {
        width: 100%;
        margin: 15px 0;
        font-size: 14px;
    }
    .prices_box_title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #131313;
        margin: 15px 0px;

        width: 100%;
        padding: 0px;
    }
    .prices_all {
        width: 100%;

        margin-top: 30px;
    }
    .new-hotel-boxes {
        margin-top: 0px;
        margin-bottom: 15px;
    }
    .price_icon_content {
        width: 100%;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        border-right: 1px solid #e6e6e6;
        padding: 30px 0px;
    }
    .pricelarge2{
        color: #f5a623;
    }
</style>

	@yield('css')

	<!-- Google Tag Manager -->
	<script >(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MP6XB3S');</script>
	<!-- End Google Tag Manager -->




</head>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MP6XB3S"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
	<header id="plain" style="font-weight: 700; height: 75px;">
		@include('layouts.navbar')
			{{-- <div id="top_line">
					<div class="container">
						<div class="row">
							@if ($contactss->phone || $contactss->email)
							<div class="col-6">
								{{-- @if ($contactss->phone)
									<i class="icon-phone"></i>
									<strong>{{ $contactss->phone }}</strong>
								@endif --}}
								{{-- @if ($contactss->email)
									<span id="opening">
										<i class=" icon-mail-alt"></i>
										{{ $contactss->email }}
									</span>
								@endif --}}


							{{-- </div>
							@endif --}}

							{{-- <div class="col-6">

								<ul id="top_links"> --}}
										{{-- @if ($contactss->mobile)
										<a href="https://wa.me/{{$contactss->mobile}}" style="border-radius: 8px;
										background-color: #24a317;
										padding: 5px 12px;
										color: #fff;
										font-size: 16px;
										text-align: center;
										margin: 8px auto;
										font-weight: 500;">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="20px" height="20px">
											<path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z" />
											<path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z" />
											<path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z" />
											<path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z" />
											<path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd" />
										</svg>
											What'sApp</a>
										@endif --}}
									{{-- <li id="social_top">
										@if (count($socialss)>0)
											@foreach ($socialss as $social)
											<li><a hreflang="es" href="{{ $social->link }}"><i class="icon-{{ $social->name }}"></i></a></li>
											@endforeach
										@endif
									</li>
								</ul>
							</div>

						</div> --}}
						<!-- End row -->
					{{-- </div> --}}
					<!-- End container-->
				{{-- </div> --}}
				<!-- End top line-->

	</header><!-- End Header -->
	{{-- <div id="feefo-service-review-floating-widgetId"></div> --}}

	@yield('content')

    	<footer class="footer">
			<div class="container">
				<div class="row top">
					<div class="col-md-3 col-sm-6">
						<h3>{{ $about->title }}</h3>
						<p>{!! $about->body !!}</p>
					</div>
					<div class="col-md-3 col-sm-6">
						<h3>Our Info</h3>
						<ul class="list-unstyled">
							<li><a hreflang="es" href="/about-us">About us</a></li>
							<li><a hreflang="es" href="/contact-us">Contact Us</a></li>
							<li><a hreflang="es" href="/terms">Terms and Conditions</a></li>
							<li><a hreflang="es" href="/faqs">FAQ</a></li>
                            <li><a hreflang="es" href="/privacy-policy">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6">
						<h3>Contact</h3>
						<ul class="list-unstyled">
							<li>{{ $contactss->email }}</li>
						</ul>
						<div class="payment-icons">
							<ul class="d-flex flex-wrap align-items-center justify-content-center">
							  <li>
								<img src="../../front/img/visa.png" alt="">
							  </li>
							  <li>
								<img src="../../front/img/mastercard.png" alt="">
							  </li>
							  <li>
								<img src="../../front/img/paypal.png" alt="">
							  </li>
							</ul>
							<div class="social_footer">
								@if (count($socialss)>0)
								<ul class="d-flex flex-wrap">
									@foreach ($socialss as $social)
									<li><a hreflang="es" href="{{ $social->link }}"><i class="icon-{{ $social->name }}"></i></a></li>
									@endforeach
								</ul>
								 @endif
							  </div>
						  </div>
					</div>
					<div class="col-md-3 col-sm-6">
							<h3>Newsletters</h3>
								<p>
									Get updated by subscribe our weekly newsletter
								</p>
									<form method="post" action="/newsletters" style="display: flex">
										@csrf
										<input type="text" name="email" required>
										<button><i class="icon-angle-right"></i></button>
									</form>
					</div>
					{{-- <div class="col-lg-12">
						<div class="companies">
							<ul class="d-flex flex-wrap align-items-center justify-content-center">
								<li>Egypt air</li>
								<li>Ashranda</li>
								<li>Sonesta</li>
								<li>Oberoi</li>
								<li>Movenpick</li>
								<li>Hilton</li>
								<li>Steigenberger</li>
							  </ul>
						</div>
					</div> --}}
				</div>
				{{-- <div class="row"> --}}
					{{-- <div class="col-md-4">
						@if ($contactss->phone || $contactss->email)
							<h3>¿Necesitas ayuda?</h3>
							@if ($contactss->phone)
							<a hreflang="es" href="tel://{{ $contactss->phone }}" id="phone">{{ $contactss->phone }}</a>
							@endif
							@if ($contactss->email)
							<a hreflang="es" href="mailto:{{ $contactss->email }}" id="email_footer">{{ $contactss->email }}</a>
							@endif
						@endif
					</div> --}}
					{{-- <div class="col-md-3"> --}}
						{{-- <h3>About</h3> --}}
						{{-- <ul>
							<li><a hreflang="es" href="/sobre-nosotros">Sobre Nosotros</a></li>
							<li><a hreflang="es" href="/contactanos">Contacto</a></li>
							<li><a hreflang="es" href="/terminos-condiciones">Términos y Condiciones</a></li>
							<li><a hreflang="es" href="/preguntas-frecuentes">Preguntas Frecuentes</a></li>
                            <li><a hreflang="es" href="/politica-de-privacidad">Politica de Privacidad</a></li>
						</ul>
					</div>
				</div><!-- End row --> --}}

				<div class="row bottom">
					<div class="col-md-6">
						<div id="social_footer">
							{{-- @if (count($socialss)>0) --}}
							{{-- <ul>
								@foreach ($socialss as $social)
								<li><a hreflang="es" href="{{ $social->link }}"><i class="icon-{{ $social->name }}"></i></a></li>
								@endforeach
							</ul> --}}
							{{-- @endif --}}
							{{-- <p>Desarrollado Por Memphis Tours</p> --}}
							<p>{{session()->get('utm_source')}}</p>
							<p>{{session()->get('utm_campaign')}}</p>
							<p>{{session()->get('utm_term')}}</p>
							<p>© Sahari {{now()->year}}</p>
						</div>
					</div>
					<div class="col-md-6 text-right">
						<ul class="list-unstyled">
							<li><a hreflang="es" href="/terminos-condiciones">Conditions</a></li>
                            <li><a hreflang="es" href="/politica-de-privacidad">Privacy Policy</a></li>
						</ul>
					</div>
				</div><!-- End row -->
			</div><!-- End container -->

				<a hreflang="es" id="back-Inquire" href="/personaliza-tu-viaje" style="background: #00aeff; width: 100%; color: #fff; font-size: 22px;text-align: center ;z-index:100001" class="d-lg-none back-Inquire btn btn-primary">Personaliza Tu Viaje</a>


		</footer><!-- End footer -->

		<div id="toTop"></div><!-- Back to top button -->

		<!-- Common scripts -->
		<script src="{{ asset('/front/js/jquery-2.2.4.min.js')}}"></script>
		<script src="{{ asset('/front/js/common_scripts_min.js')}}"></script>
		<script src="{{ asset('/front/js/functions.js?v=new')}}"></script>

		<!-- Cookie bar script -->
		<script src="{{ asset('/front/js/jquery.cookiebar.js')}}"></script>
		<script>
			$(document).ready(function(){
			'use strict';
			//  $.cookieBar({
			// 	fixed: true
			// });
			});
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
		{{-- <script type="text/javascript" src="https://api.feefo.com/api/javascript/vamos-viajando"></script> --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



		@yield('js1')
		@yield('js')
		<script>
			@if(session('message'))

			  toastr.options =
		  {
			  "closeButton" : true,
			  "progressBar" : true
		  }
				  toastr.success("{{ session('message') }}");
				  @endif

				  @if(session('error'))

		toastr.options =
	{
		"closeButton" : true,
		"progressBar" : true
	}
			toastr.error("{{ session('error') }}");
			@endif


		</script>

		<script>
			function updateAgeFieldsAll(a, b, c) {
			var d = $("[ageDesc='" + c + "']");
			d.find(".age-input-div").length && d.find(".age-input-div").remove();
			for (var e = 0; b > e; e++) {
				if( c == "infant"){
					var f = $("#ageInputDiv").clone().removeAttr("id").addClass("hidden age-input-div").removeClass("form-group label-floating");
					f.find(".div-1").html("<input id='" + c + e + "' type='hidden' size='3' class='form-control' maxlength='2'  min='1' value='1.99' max='12.99' name='infants_age[" + c + "_" + e + "]' />"), d.append(f.removeClass("hidden"))
			}else{
					var f = $("#ageInputDiv").clone().removeAttr("id").addClass("col-md-6 age-input-div");
					f.find(".div-0").html("<label for='" + c + e + "'><?php echo str_limit("Age of child"); ?> "+ (e+1) +" </label>"), f.find(".div-1").html("<select name='children_age[" + c + e + "]' class='form-control'><option value='0'></option><option value='0'>0 año</option><option value='1'>1 año</option><option value='2'>2 años</option><option value='3'>3 años</option><option value='4'>4 años</option><option value='5'>5 años</option> <option value='6'>6 años</option><option value='7'>7 años</option><option value='8'>8 años</option><option value='9'>9 años</option><option value='10'>10 años</option><option value='11'>11 años</option><option value='>12'>>12 años</option></select>"), d.append(f.removeClass("hidden"))
				}
			}
		}

			function updateAgeSelectionAll(a) {
				var b = 0,
					c = 0,
					d = $('[id^="ageBands\\["]');
				d.each(function() {
					b += parseInt($(this).val())
				}), c = a - b, d.each(function() {
					var a = $(this),
						b = parseInt(a.val()) + c,
						d = a.val(),
						e = 0;
					a.val(d)
				})
			}

			function paxOnChangeAll(a, b, c, d, e) {
				"Adult" === c ? updateAgeSelectionAll(e) : (updateAgeFieldsAll(a, b, c.toLowerCase()), updateAgeSelectionAll(e))
			}

			$('.btn-number.book_all').click(function(e){
				e.preventDefault();

				fieldName = jQuery(this).attr('data-field');
				type      = jQuery(this).attr('data-type');
				var input = jQuery("input[id='"+fieldName+"']");

				var currentVal = parseInt(input.val());

				if (!isNaN(currentVal)) {
					if(type == 'minus') {

						if(currentVal > input.attr('min')) {
							input.val(currentVal - 1).change();
						}
						if(parseInt(input.val()) == input.attr('min')) {
							jQuery(this).attr('disabled', true);
						}

					} else if(type == 'plus') {

						if(currentVal < input.attr('max')) {
							input.val(currentVal + 1).change();
						}
						if(parseInt(input.val()) == input.attr('max')) {
							jQuery(this).attr('disabled', true);
						}

					}
				} else {
					input.val(1);
				}
			});
			$('.input-number.book_all').focusin(function(){
				jQuery(this).data('oldValue', jQuery(this).val());
			});
			$('.input-number.book_all').change(function() {

				let minValue =  parseInt($(this).attr('min'));
				let maxValue =  parseInt($(this).attr('max'));
				let valueCurrent = parseInt($(this).val());

				let name = $(this).attr('id');
				if(valueCurrent >= minValue) {
					$(".btn-number.book_all[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
				} else {
					alert('Sorry, the minimum value was reached');
					$(this).val($(this).data('oldValue'));
				}
				if(valueCurrent <= maxValue) {
					$(".btn-number.book_all[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
				} else {
					alert('Sorry, the maximum value was reached');
					$(this).val($(this).data('oldValue'));
				}


			});
			$(".input-number.book_all").keydown(function (e) {
				// Allow: backspace, delete, tab, escape, enter and .
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
					// Allow: Ctrl+A
					(e.keyCode == 65 && e.ctrlKey === true) ||
					// Allow: home, end, left, right
					(e.keyCode >= 35 && e.keyCode <= 39)) {
					// let it happen, don't do anything
					return;
				}
				// Ensure that it is a number and stop the keypress
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});




		</script>

          <script>

function currency_change(currency_abbrev, currency_name) {
    $.ajax({
        type:'POST',
        url: '{{ route('currency.load') }}',
        data:{
            currency_abbrev:currency_abbrev,
			currency_name:currency_name,
            _token: '{{ csrf_token() }}',

        },
        success:function (response) {
            if(response['status']) {
                location.reload();
            } else {
                alert('server error');
            }
        }
    })
}



</script>
<script>
	$(window).scroll(function() {
    // scrollToTop is not a function - changed to scrollTop
    if ($(this).scrollTop() < 600) {
        $('#back-Inquire').show();
    } else {
        $('#back-Inquire').hide();
    }
    }).trigger('scroll');
</script>
<script>
	jQuery(document).ready(function($){
	  $('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		nav:true,
          navText: ["<i class='arrow_carrot-left'></i>","<i class='arrow_carrot-right'></i>"],
		dots: false,
		responsive:{
		  0:{
			items:1
		  },
		}
	  })
	})
	</script>
	<script>
        function valueChanged(){
        if(jQuery('.flight').is(":checked")) {
            jQuery("#departure_airport").attr("required", true);
            jQuery(".flight_from").show();
        }else{
            jQuery(".flight_from").hide();
            jQuery("#departure_airport").attr("required", false);
        }
    }
    </script>
<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/6434059c31ebfa0fe7f7759a/1gtljbr6t';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->

	</body>
	

	</html>

