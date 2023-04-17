@extends('layouts.app')
@section('css')
@endsection
@section('title', 'ofertas a Egipto')

@section('meta')
	<meta name="title" content="ofertas a Egipto">
	<meta name="keywords" content="ofertas a Egipto">
	<meta name="description" content="Disfrute de los paquetes especiales de Navidad y Semana Santa en Egipto, también, elija una de nuestras promociones de Egipto.¡El viaje de tus sueños está aquí!">
@endsection
@section('content')

<div class="banners" style="background-image: url('{{ asset('/images/packages1.jpg')}}')">
	{{-- <div class="parallax-content-1"> --}}
			{{-- <div class="d-lg-none">
			<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 50px;position: absolute;right: 7%;top: 68%;" alt="Nile Cruises" data-retina="true">
			</div>
			<div class="d-none d-lg-block">
				<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 0%;top: 20%;" alt="Nile Cruises" data-retina="true">
			</div> --}}
			<div class="overlay">
				<div class="container">
					<div class="dest_con">
						<div class="cont">
							<h1>Ofertas de Viajes</h1>
						</div>
						<div id="position" class="dest_bread text-right">
							{{-- <div class="container"> --}}
								<ul class="list-unstyled">
									<li><a href="/">Inicio</a>
									</li>
									<li class="arrow"><i class="icon-angle-right"></i></li>
									<li>Ofertas de Viajes</li>
								</ul>
							{{-- </div> --}}
						</div>
					</div>
				</div>
			</div>
		{{-- <div class="animated fadeInDown">
			<h1>Ofertas de Viajes</h1>
			<p>
                Disfrute de los paquetes especiales de Navidad y Semana Santa en Egipto, también, elija una de nuestras promociones de Egipto con Guía profesional en español. ¡El viaje de tus sueños está aquí!
			</p>
		</div> --}}
	{{-- </div> --}}
</div>
<!-- End section -->

<main>
	{{-- <div id="position">
		<div class="container">
			<ul>
				<li><a href="/">Página Principal</a>
				</li>
				<li>Ofertas de Viajes</li>
			</ul>
		</div>
	</div> --}}
	<!-- Position -->

	@if (count($christmas)>0)
		<div class="container margin_60">
			<div class="main_title">
				<h2>Ofertas Fin de año 2023</h2>
			</div>
			<div class="row">
				@foreach ($christmas as $christma)
				@if ($loop->first)
					<div class="col-lg-4 col-md-6  zoomIn">
				@else
				<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.{{ $christma->id }}s">
				@endif
					<div class="product">
						<div class="product_pic">
							<a href="/ofertas-de-viajes/{{ $christma->slug }}">
							<img src="{{ asset('/images/packages/'.$christma->shortImage)}}" width="100%" height="200px" alt="{{ $christma->altShort}}">
							@switch($christma->popular)
							@case('popular')
							<div class="ribbon_3 popular"><h6>Popular</h6></div>
								@break
							@case('toprated')
							<div class="ribbon_3"><h6>Top rated</h6></div>
								@break
							@default
						@endswitch
							</a>
						</div>
						<div class="product_body">
							<a href="/ofertas-de-viajes/{{ $christma->slug }}">
							<h2>{{ $christma->name}}</h2></a>
							<div class="price text-right">
								<span class="from">Desde</span><br>
								<span class="p"><span></span>{{Helper::currency_converter($christma->startPrice)}}</span>
							</div>
							<div class="date">
								<span style="font-size: 14px;color:#333">{{ $christma->duration }}</span>
							</div>
							<div class="rating">
								<i class="icon-star {{ $christma->stars >= 1 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $christma->stars >= 2 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $christma->stars >= 3 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $christma->stars >= 4 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $christma->stars >= 5 ? ' voted' : '' }}"></i>
								<small>({{ $christma->starsNum }})</small>
							</div><!-- end rating -->

						</div>
					</div>
				</div>
				@endforeach
			</div><!-- End row -->
		</div><!-- End container -->
	@endif

	@if (count($easter)>0)
		<div class="container margin_60">
			<div class="main_title">
				<h2>Tours en Semana Santa 2023</h2>
			</div>
			<div class="row">
				@foreach ($easter as $christma)
				@if ($loop->first)
					<div class="col-lg-4 col-md-6  zoomIn">
				@else
				<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.{{ $christma->id }}s">
				@endif
					<div class="product">
						<div class="product_pic">
							<a href="/ofertas-de-viajes/{{ $christma->slug }}">
							<img src="{{ asset('/images/packages/'.$christma->shortImage)}}" width="100%" height="200px" alt="{{ $christma->altShort}}">
								@switch($christma->popular)
								@case('popular')
								<div class="ribbon_3 popular"><h6>Popular</h6></div>
									@break
								@case('toprated')
								<div class="ribbon_3"><h6>Top rated</h6></div>
									@break
								@default
								@endswitch
							</a>
						</div>
						<div class="product_body">
							<a href="/ofertas-de-viajes/{{ $christma->slug }}">
							<h2>{{ $christma->name}}</h2></a>
							<div class="price text-right">
								<span class="from">Desde</span><br>
								<span class="p"><span></span>{{Helper::currency_converter($christma->startPrice)}}</span>
							</div>
							<div class="date">
								<span style="font-size: 14px;color:#333">{{ $christma->duration }}</span>
							</div>
							<div class="rating">
								<i class="icon-star {{ $christma->stars >= 1 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $christma->stars >= 2 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $christma->stars >= 3 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $christma->stars >= 4 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $christma->stars >= 5 ? ' voted' : '' }}"></i>
								<small>({{ $christma->starsNum }})</small>
							</div><!-- end rating -->

						</div>
					</div>
				</div>
				@endforeach
			</div><!-- End row -->
		</div><!-- End container -->
	@endif

	@if (count($Offers)>0)
		<div class="container margin_60">
			<div class="main_title">
				<h2>Promociones de Viajes</h2>
			</div>
			<div class="row">
				@foreach ($Offers as $Roteiro)
				@if ($loop->first)
					<div class="col-lg-4 col-md-6  zoomIn">
				@else
				<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.{{ $Roteiro->id }}s">
				@endif
					<div class="product">
						
						<div class="product_pic">
							<a href="/ofertas-de-viajes/{{ $Roteiro->slug }}">
							<img src="{{ asset('/images/packages/'.$Roteiro->shortImage)}}" width="100%" height="200px" alt="{{ $Roteiro->altShort}}">
								@switch($christma->popular)
								@case('popular')
								<div class="ribbon_3 popular"><h6>Popular</h6></div>
									@break
								@case('toprated')
								<div class="ribbon_3"><h6>Top rated</h6></div>
									@break
								@default
								@endswitch
							</a>
						</div>
						<div class="product_body">
							<a href="/ofertas-de-viajes/{{ $Roteiro->slug }}">
							<h2>{{ $Roteiro->name}}</h2></a>
							<div class="price text-right">
								<span class="from">Desde</span><br>
								<span class="p"><span></span>{{Helper::currency_converter($Roteiro->startPrice)}}</span>
							</div>
							<div class="date">
								<span style="font-size: 14px;color:#333">{{ $Roteiro->duration }}</span>
							</div>
							<div class="rating">
								<i class="icon-star {{ $Roteiro->stars >= 1 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $Roteiro->stars >= 2 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $Roteiro->stars >= 3 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $Roteiro->stars >= 4 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $Roteiro->stars >= 5 ? ' voted' : '' }}"></i>
								<small>({{ $Roteiro->starsNum }})</small>
							</div><!-- end rating -->

						</div>
					</div>
				</div>
				@endforeach
			</div><!-- End row -->
		</div><!-- End container -->
	@endif

	<div class="container margin_60">
		{{-- <div class="row">
			<div class="col-lg-12">
				@foreach ($packages as $package)
					<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
						<div class="row">
								<div class="col-lg-3 col-md-3">

									@switch($package->popular)
										@case('popular')
											<div class="ribbon_3 popular"><span>Popular</span></div>
											@break
										@case('toprated')
											<div class="ribbon_3"><span>Top rated</span></div>
											@break
										@default
									@endswitch

									<div class="img_list">
										<a href="/ofertas-de-viajes/{{ $package->slug }}">
											<img src="{{ asset('/images/packages/'.$package->shortImage)}}" width="800" height="533" class="img-fluid" alt="{{ $package->name }}">
										</a>
									</div>
								</div>

								<div class="col-lg-7 col-md-7">
									<div class="tour_list_desc">
										<div class="rating">
											<i class="icon-star {{ $package->stars >= 1 ? ' voted' : '' }}"></i>
											<i class="icon-star {{ $package->stars >= 2 ? ' voted' : '' }}"></i>
											<i class="icon-star {{ $package->stars >= 3 ? ' voted' : '' }}"></i>
											<i class="icon-star {{ $package->stars >= 4 ? ' voted' : '' }}"></i>
											<i class="icon-star {{ $package->stars >= 5 ? ' voted' : '' }}"></i>
											<small>({{ $package->starsNum }})</small>
										</div>
										<a href="/viagens-egito/{{ $package->slug }}">
										<h3>{{ $package->name}}</h3>
										</a>
										<p>{!! substr (strip_tags($package->description), 0, 250) !!} ...</p>
										<ul class="add_info">
												<li>
													<div class="tooltip_styled tooltip-effect-4">
														<span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>
														<div class="tooltip-content">
															<h4>Schedule</h4>
															<strong>Every Day</strong>
														</div>
													</div>
												</li>
												<li>
													<div class="tooltip_styled tooltip-effect-4">
														<span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
														<div class="tooltip-content">
															<h4>Locations</h4> As Mentioned in the Itenerary
															<br>
														</div>
													</div>
												</li>
												<li>
													<div class="tooltip_styled tooltip-effect-4">
														<span class="tooltip-item"><i class="icon_set_1_icon-97"></i></span>
														<div class="tooltip-content">
															<h4>Languages</h4> English - French - Italian - Portuguese - Spanish
														</div>
													</div>
												</li>
												<li>
													<div class="tooltip_styled tooltip-effect-4">
														<span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>
														<div class="tooltip-content">
															<h4>Transfers</h4> All Transfers Includes
															<br>
														</div>
													</div>
												</li>
												<li>
													<div class="tooltip_styled tooltip-effect-4">
														<span class="tooltip-item"><i class="pe-7s-users"></i></span>
														<div class="tooltip-content">
															<h4>Tout Type</h4>
															Small Group Tour
														</div>
													</div>
												</li>
											</ul>
									</div>
								</div>

								<div class="col-lg-2 col-md-2">
									<div class="price_list">
										<div><sup>$</sup>{{ $package->startPrice}}*<span class="normal_price_list"></span><small>*Per person</small>
											<p><a href="/viagens-egito/{{ $package->slug }}" style="background: #37a5db;color:#fff" class="btn_1">Details</a>
											</p>
										</div>

									</div>
								</div>

							</div>
					</div>
				@endforeach
				<hr>
			</div>
			<!-- End col lg-9 -->
		</div> --}}
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
<script src="{{ asset('/front/js/datepicker_advanced.js')}}"></script>

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

        $('input.date-pick2').datepicker({
            format: "dd/mm/yyyy",
            startDate: tomorrow,
            autoclose: true
        });
        var datepicker2 = (date.getDate() + 1) + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();


        // $('input.date-pick').datepicker('setDate', datepicker2);
        // $('input.date-pick2').datepicker('setDate', datepicker2);


        $('input.time-pick').timepicker({
            minuteStep: 15,
            showInpunts: false
        });

        $('input.date-pick').change(event => {
            const dateString = event.target.value;
            const dateArray = dateString.split('/').map(v => Number(v));
            const newStartDate = new Date(dateArray[2], dateArray[1] - 1, dateArray[0]);

            $('input.date-pick2').datepicker('setStartDate', newStartDate)
            // $('input.date-pick2').datepicker('setDate', newStartDate);
        })
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

@endsection
