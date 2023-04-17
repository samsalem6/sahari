<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="canonical" href="{{ Request::fullUrl() }}" />

	<title>
		@hasSection('title')
		@yield('title')
		@else
		Viagens para o Egito
		@endif
	</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@hasSection('meta')
    	@yield('meta')
	@else
		<meta name="title" content="Viagens para o Egito">
		<meta name="keywords" content="Viagens para o Egito">
		<meta name="description" content="Pacotes variados de Viagens para o Egito. As principais atrações turísticas com guia em Língua Portuguesa, comforto e o melhor preço. Aproveite já!">
    @endif

    <!-- Favicons-->
	<link rel="shortcut icon" href="{{ asset('/images/favicon.ico')}}" type="image/x-icon">

    <!-- COMMON CSS -->
	<link href="{{ asset('/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/front/css/style.css')}}" rel="stylesheet">
	<link href="{{ asset('/front/css/vendors.css')}}" rel="stylesheet">

	<!-- CUSTOM CSS -->
	<link href="{{ asset('/front/css/custom.css')}}" rel="stylesheet">
	<style>
	.back-Inquire {
		position: fixed;
		bottom: 0px;
		width: 100%
		display: none;
	}
	</style>

    @yield('css')

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-M4KPJDF');</script>
    <!-- End Google Tag Manager -->


</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M4KPJDF"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
		<header id="plain" style="font-weight: bold;">
			<div class="container">
				<div class="row">
					<div class="col-3">
						<div id="logo_home">
							<a href="/" title="">
								<img width="180" height="45" src="{{ asset('/images/'meta())}}" alt="">
							</a>
						</div>
					</div>
					<nav class="col-9">
						<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);">
							<span>Menu mobile</span></a>
						<div class="main-menu">
							<div id="header_menu">
								<img src="{{ asset('/images/'meta())}}" width="160" height="34" alt="City tours" data-retina="true">
							</div>
							<a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
							<ul>
								<li><a href="/">Página Principal</a></li>
								<li><a href="/viagens-egito">Pacotes</a></li>
                                <li><a href="/cruzeiros-no-nilo">Cruzeiros no Nilo</a></li>
                                <li><a href="/egito-e-outros-paises">Egito e outros Países</a></li>
								@if (count($hotss)>0)
                                <li><a href="/ofertas-imprediveis">Ofertas Imperdíveis</a></li>
                                @endif
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Mais <i class="icon-down-open-mini"></i></a>
                                    <ul>
                                        <li><a href="/sobre-nos">Quem somos</a></li>
                                        @if (count($wikiss)>0)
                                        <li><a href="/informacoes-turisticas">Informações Turísticas</a></li>
                                        @endif
                                        @if (count($blogss)>0)
                                        <li><a href="/blog-de-viagem">Blog de Viagem</a></li>
                                        @endif
                                        <li><a href="/contate-nos">Contato</a></li>
                                    </ul>
                                </li>

							</ul>

						</div><!-- End main-menu -->

							<ul id="top_tools" class="d-none d-lg-block">
								<li>
									<a href="/personalize" style="margin: -9%;background: #37a5db;color:#fff" class="btn_1">Solicite</a>
								</li>

							</ul>
					</nav>
				</div>
			</div><!-- container -->
		</header><!-- End Header -->

		@yield('content')

    	<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						@if ($contactss->phone || $contactss->email)
							<h3>Precisa de ajuda?</h3>
							@if ($contactss->phone)
							<a href="tel://{{ $contactss->phone }}" id="phone">{{ $contactss->phone }}</a>
							@endif
							@if ($contactss->email)
							<a href="mailto:{{ $contactss->email }}" id="email_footer">{{ $contactss->email }}</a>
							@endif
						@endif
					</div>
					<div class="col-md-3">
						{{-- <h3>About</h3> --}}
						<ul>
							<li><a href="/sobre-nos">Quem somos</a></li>
							<li><a href="/contate-nos">Contato</a></li>
							<li><a href="/faqs">FAQ</a></li>
							<li><a href="/politica-de-privacidade">Políticas de Privacidade</a></li>
							<li><a href="/termos-e-condicoes">Termos & Condições</a></li>
						</ul>
					</div>
				</div><!-- End row -->

				{{-- <div class="row">
					<div class="col-md-12">
						<div id="social_footer">
							@if (count($socialss)>0)
							<ul>
								@foreach ($socialss as $social)
								<li><a href="{{ $social->link }}"><i class="icon-{{ $social->name }}"></i></a></li>
								@endforeach
							</ul>
							@endif
							<p>© Pacotes Para Egito 2020</p>
						</div>
					</div>
				</div><!-- End row --> --}}
			</div><!-- End container -->
			@if (\Request::is('/') || \Request::is('contate-nos')|| \Request::is('viagens-egito'))

				<a id="back-Inquire" href="/personalize" style="background: #37a5db;
				color: #fff; font-size: 22px;text-align: center ;z-index:100001" class="d-lg-none back-Inquire btn_full">Solicite</a>

			@endif
		</footer><!-- End footer -->

		<div id="toTop"></div><!-- Back to top button -->

		<!-- Common scripts -->
		<script src="{{ asset('/front/js/jquery-2.2.4.min.js')}}"></script>
		<script src="{{ asset('/front/js/common_scripts_min.js')}}"></script>
		<script src="{{ asset('/front/js/functions.js')}}"></script>

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
        @yield('js')

		<script>
				function updateAgeFieldsAll(a, b, c) {
				var d = $("[ageDesc='" + c + "']");
				d.find(".age-input-div").length && d.find(".age-input-div").remove();
				for (var e = 0; b > e; e++) {
					if( c == "infant"){
						var f = $("#ageInputDiv").clone().removeAttr("id").addClass("hidden age-input-div").removeClass("form-group label-floating");
						f.find(".div-1").html("<input id='" + c + e + "' type='hidden' size='3' class='form-control' maxlength='2'  min='1' value='1.99' max='11.99' name='infants_age[" + c + "_" + e + "]' />"), d.append(f.removeClass("hidden"))
					}else{
						var f = $("#ageInputDiv").clone().removeAttr("id").addClass("col-md-6 age-input-div");
						f.find(".div-0").html("<label for='" + c + e + "'><?php echo _("Idade da Criança"); ?> "+ (e+1) +" </label>"), f.find(".div-1").html("<select name='children_age[" + c + e + "]' class='form-control'><option value='0'></option><option value='0'>0 ano</option><option value='1'>1 ano</option><option value='2'>2 anos</option><option value='3'>3 anos</option><option value='4'>4 anos</option><option value='5'>5 anos</option> <option value='6'>6 anos</option><option value='7'>7 anos</option><option value='8'>8 anos</option><option value='9'>9 anos</option><option value='10'>10 anos</option><option value='11'>11 anos</option><option value='>12'>>12 anos</option></select>"), d.append(f.removeClass("hidden"))
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

        <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5f65d79bf0e7167d0011cfdb/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script> --}}
    <!--End of Tawk.to Script-->
	</body>

	</html>

