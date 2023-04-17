@extends('layouts.app')
@section('css')
<!-- CSS -->
<link href="{{ asset('/front/css/blog.css')}}" rel="stylesheet">
@endsection
@section('title', 'Blog de viajes | Vamos Viajando')

@section('meta')
	<meta name="title" content="Blog de viajes | Vamos Viajando">
	<meta name="keywords" content="Blog de viajes | Vamos Viajando">
	<meta name="description" content="Bienvenido al blog de Vamos Viajando, aquí le hemos recupilado los mejores blogs para que te ayuden a organizar su viaje al mejor estilo.">
@endsection
@section('content')

<div class="banners-b text-center" style="background-image: url('../../images/blog.jpeg')">
	<div class="overlay">
			{{-- <div class="d-lg-none">
			<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 50px;position: absolute;right: 7%;top: 68%;" alt="Nile Cruises" data-retina="true">
			</div>
			<div class="d-none d-lg-block">
				<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 0%;top: 20%;" alt="Nile Cruises" data-retina="true">
			</div> --}}
            {{-- <div class="animated fadeInDown">
				<h1>Blog de Viajes</h1>
				<p>Bienvenido al blog de Vamos Viajando, Te invitamos para dar consejos de seguridad, alimentos y más. Nuestro blog de viajes te dice todo lo que necesita saber.</p>
			</div> --}}
			<div class="container">
				<h1>Blog de Viajes</h1>
				<div id="position">
					<div class="container">
						<ul class="list-unstyled">
							<li><a hreflang="es" href="/">Inicio</a>
							</li>
							<li class="arrow"><i class="icon-angle-right"></i></li>
							<li>Blog de Viajes</li>
						</ul>
					</div>
				</div>
			</div>
	</div>
</div>
<!-- End section -->

<main class="package-det">

	{{-- <div id="position">
		<div class="container">
			<ul>
				<li><a href="/">Página Principal</a>
				</li>
				<li>Blog de Viajes</li>
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
                                <a href="/blog-de-viajes/Blog-de-Viajes-a-Egipto"><img data-src="{{ asset('/images/Piramides.jpeg')}}" width="800" height="533" alt="image" class="img-fluid owl-lazy"></a>
                            </div>
                        </div>
                        <!--/carousel-->
                        <div class="short_info">
                        </div>
                    </div>
                    <div class="tour_title_blog" style="text-align: center;">
                        <h3><strong>Blog de Viajes a Egipto</strong></h3>
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
                                <a href="/blog-de-viajes/blog-de-viajes-a-turquia"><img data-src="{{ asset('/images/Second_subpage_photo.jpeg')}}" width="800" height="533" alt="image" class="img-fluid owl-lazy"></a>
                            </div>
                        </div>
                        <!--/carousel-->
                        <div class="short_info">
                        </div>
                    </div>
                    <div class="tour_title_blog" style="text-align: center;">
                        <h3><strong>Blog de Viajes a Turquía</strong></h3>
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
                                <a href="/blog-de-viajes/blog-de-viajes-marruecos"><img data-src="{{ asset('/images/morocco3.jpeg')}}" width="800" height="533" alt="image" class="img-fluid owl-lazy"></a>
                            </div>
                        </div>
                        <!--/carousel-->
                        <div class="short_info">
                        </div>
                    </div>
                    <div class="tour_title_blog" style="text-align: center;">
                        <h3><strong>Blog de Viajes Marruecos</strong></h3>
                    </div>
                </div>
            </div>
                <!-- End box tour -->

				
			<div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.1s">
				<div class="tour_container">
					<div class="img_container_2">
						<div class="owl-carousel owl-theme carousel_item">
							<div class="item">
								<a href="/blog-de-viajes/blog-de-viajes-jordania"><img data-src="{{ asset('/images/jordania.jpeg')}}" width="800" height="533" alt="image" class="img-fluid owl-lazy"></a>
							</div>
						</div>
						<!--/carousel-->
						<div class="short_info">
						</div>
					</div>
					<div class="tour_title_blog" style="text-align: center;">
						<h3><strong>Blog de Viajes Jordania</strong></h3>
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
								<a href="/blog-de-viajes/blog-de-viajes-a-dubai"><img data-src="{{ asset('/images/dubai.jpeg')}}" width="800" height="533" alt="image" class="img-fluid owl-lazy"></a>
							</div>
						</div>
						<!--/carousel-->
						<div class="short_info">
						</div>
					</div>
					<div class="tour_title_blog" style="text-align: center;">
						<h3><strong>Blog de Viajes a Dubai</strong></h3>
					</div>
				</div>
				<!-- End box tour -->
			</div>

        </div>
		<!-- End row -->
		{{-- @include('layouts.Reviews') --}}
		{{-- @include('layouts.faq') --}}
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

	$('input.date-pick').datepicker('setDate', datepicker2);

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
