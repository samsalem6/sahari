@extends('layouts.app')
@section('css')
<!-- CSS -->
<link href="{{ asset('/front/css/blog.css')}}" rel="stylesheet">
@endsection
@section('title', 'Guía del viajero | Vamos Viajando')

@section('meta')
	<meta name="title" content="Guía del viajero | Vamos Viajando">
	<meta name="keywords" content="Guía del viajero">
	<meta name="description" content="Antes de su viaje, conozca más toda la información turística sobre las principales atracciones, monumentos, datos históricos, curiosidades. ¡Lea más!">
@endsection
@section('content')

<div class="banners-b text-center" style="background-image: url({{ asset('/images/wiki.jpeg')}})">
	<div class="overlay">
			{{-- <div class="d-lg-none">
			<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 50px;position: absolute;right: 7%;top: 68%;" alt="Nile Cruises" data-retina="true">
			</div>
			<div class="d-none d-lg-block">
				<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 0%;top: 20%;" alt="Nile Cruises" data-retina="true">
			</div> --}}
            {{-- <div class="animated fadeInDown">
				<h1>Guía de Viajes</h1>
				<p>Puede conocer la información turística para enriquecer su visita. Aprende todo sobre cada lugar, figuras y datos históricos, monumentos y civilizaciones.</p>
			</div> --}}
            <div class="container">
				<h1>Guía de Viajes</h1>
				<div id="position">
					<div class="container">
						<ul class="list-unstyled">
							<li><a hreflang="es" href="/">Inicio</a>
							</li>
							<li class="arrow"><i class="icon-angle-right"></i></li>
							<li>Guía de Viajes</li>
						</ul>
					</div>
				</div>
			</div>
	</div>
</div>
<!-- End section -->

<main>

	{{-- <div id="position">
		<div class="container">
			<ul>
				<li><a href="/">Página Principal</a>
				</li>
				<li>guia de viajes</li>
			</ul>
		</div>
	</div> --}}
	<!-- Position -->

	<div class="container margin_60">


			<div class="main_title">
			</div>

		<div class="row">

            <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="tour_container">
                    <div class="img_container_2">
                        <div class="owl-carousel owl-theme carousel_item">
                            <div class="item">
                                <a href="/guia-de-viajes/egipto-guia-de-viajes"><img data-src="{{ asset('/images/Egipto.png')}}" width="800" height="533" alt="image" class="img-fluid owl-lazy"></a>
                            </div>
                        </div>
                        <!--/carousel-->
                        <div class="short_info">
                        </div>
                    </div>
                    <div class="tour_title_blog" style="text-align: center;">
                        <h3><strong>Egipto Guía de Viajes</strong></h3>
                        <p>
                            ¡Aquí encontrará información general sobre Egipto. La información de Egipto muestra todos los detalles sobre este fantástico destino.
                        </p>
                    </div>
                </div>
                <!-- End box tour -->
            </div>
            <!-- End col -->

            <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="tour_container">
                    <div class="img_container_2">
                        <div class="owl-carousel owl-theme carousel_item">
                            <div class="item">
                                <a href="/guia-de-viajes/turquia-guia-de-viajes"><img data-src="{{ asset('/images/Turquia.png')}}" width="800" height="533" alt="image" class="img-fluid owl-lazy"></a>
                            </div>
                        </div>
                        <!--/carousel-->
                        <div class="short_info">
                        </div>
                    </div>
                    <div class="tour_title_blog" style="text-align: center;">
                        <h3><strong>Turquia Guía de Viajes</strong></h3>
                        <p>
                            ¡Aquí encontrará información general sobre Turquía. Descubre los principales lugares de interés, los mejores lugares para visitar, actividades y mucho más. ¡Déjate encantar por este increíble país
                        </p>
                    </div>
                </div>
                <!-- End box tour -->
            </div>
            <!-- End col -->

            <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="tour_container">
                    <div class="img_container_2">
                        <div class="owl-carousel owl-theme carousel_item">
                            <div class="item">
                                <a href="/guia-de-viajes/marruecos-guia-de-viajes"><img data-src="{{ asset('/images/Marruecos.jpeg')}}" width="800" height="533" alt="image" class="img-fluid owl-lazy"></a>
                            </div>
                        </div>
                        <!--/carousel-->
                        <div class="short_info">
                        </div>
                    </div>
                    <div class="tour_title_blog" style="text-align: center;">
                        <h3><strong>Marruecos Guía de viajes</strong></h3>
                        <p>
							Aquí puedes descubrir los principales lugares de interés, los mejores lugares para visitar, actividades y mucho más a través del Guía de Viajes para Marruecos.
                        </p>
                    </div>
                </div>
                <!-- End box tour -->
            </div>
            <!-- End col -->

            <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="tour_container">
                    <div class="img_container_2">
                        <div class="owl-carousel owl-theme carousel_item">
                            <div class="item">
                                <a href="/guia-de-viajes/dubai-guia-de-viajes"><img data-src="{{ asset('/images/dubai.jpeg')}}" width="800" height="533" alt="image" class="img-fluid owl-lazy"></a>
                            </div>
                        </div>
                        <!--/carousel-->
                        <div class="short_info">
                        </div>
                    </div>
                    <div class="tour_title_blog" style="text-align: center;">
                        <h3><strong>Dubai Guía de Viajes</strong></h3>
                        <p>
                            Descubre qué ver, dónde comer, cómo ahorrar y mucho más. En nuestra guía de viajes Dubai
                        </p>
                    </div>
                </div>
                <!-- End box tour -->
            </div>
            <!-- End col -->

        </div>
		<!-- End row -->
		{{-- @include('layouts.Reviews') --}}
		@include('layouts.faq')
	</div>
	<!-- End container -->
</main>
<!-- End main -->

@endsection

@section('js')

<!-- Date and time pickers -->
<script src="{{ asset('/front/js/jquery.sliderPro.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function ($) {
		$('#Img_carousel').sliderPro({
			width: 960,
			height: 500,
			fade: true,
			arrows: true,
			buttons: false,
			fullScreen: false,
			smallSize: 500,
			startSlide: 0,
			mediumSize: 1000,
			largeSize: 3000,
			thumbnailArrows: true,
			autoplay: false
		});
	});
</script>

<!-- Date and time pickers -->
<script>
	$(document).ready(function() {
	var date = new Date();
	var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
	var tomorrow = new Date(date.getFullYear(), date.getMonth(), (date.getDate() + 1));

	$('input.date-pick').datepicker({
		format: "dd/mm/yyyy",
		startDate: tomorrow,
		autoclose: true
	});
	var datepicker2 = (date.getDate() + 1) + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();

	// $('input.date-pick').datepicker('setDate', datepicker2);

	});
</script>

<!--Review modal validation -->
<script src="{{ asset('/front/assets/validate.js')}}"></script>

<!-- Fixed sidebar -->
<script src="{{ asset('/front/js/theia-sticky-sidebar.js')}}"></script>
<script>
	jQuery('#sidebar').theiaStickySidebar({
		additionalMarginTop: 80
	});
</script>

<script src="{{ asset('/front/js/datepicker_advanced.js')}}"></script>

@endsection
