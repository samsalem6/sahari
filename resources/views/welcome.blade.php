@extends('layouts.app')
@section('meta')
	<meta name="title" content="Viaje a Egipto | Marruecos | Turquía">
	<meta name="keywords" content="Viaje a Egipto | Marruecos | Turquía">
	<meta name="description" content=" Aquí le ofrecmos los inolvidables viajes a Egipto,Turquía, Marruecos con guia de habla hispana con valor incomparable y todo incluido. !Elija su paquete Ya!">
@endsection
@section('css')
	<!-- REVOLUTION SLIDER CSS -->
	<link href="/front/layerslider/css/layerslider.css" rel="stylesheet">
	<style>
		.ls-gpuhack{
			background-color: rgba(0,0,0,0.4) !important;
		}
        h3.slide_typo{
            text-transform: none !important;
        }
        .slide_typo_2 {
            text-transform: none !important;
            white-space: normal;
            text-align: center;
        }
	</style>

	<script type="application/ld+json">
	{
	  "@context" : "http://schema.org",
	  "@type" : "Organization",
	  "name" : "vamos viajando",
	  "url" : "https://www.vamos-viajando.com",
	  "logo": "https://www.vamos-viajando.com/images/logo.png",
	  "aggregateRating": {
		"@type": "AggregateRating",
		"bestRating": "5",
		"ratingValue": "4.5",
		"reviewCount": "300"
	  },
	  "sameAs" : [
		"https://www.tripadvisor.com/Attraction_Review-g297543-d1547186-Reviews-Memphis_Tours_Day_Tours-Port_Said_Port_Said_Governorate.html"
	  ]
	}
	</script>
	<script type="application/ld+json">
	  {
		 "@context": "http://schema.org",
		 "@type": "Blog",
		 "url": "https://www.memphistours.com/blog"
	  }
	</script>

@endsection
@section('plain','plain')
@section('content')
<main>

	<!-- layerslider -->
	@if(count($sliderss) > 0)
		<div id="full-slider-wrapper" style="padding-top: 75px !important;">
			<div id="layerslider" style="width:100%;height:400px;">
					{{-- <div class="d-lg-none">
						<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;position: absolute;right: 0%;top: 0%;width: 13%;" alt="vamos viajando" data-retina="true">
					</div>
					<div class="d-none d-lg-block">
						<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 0%;top: 3%;" alt="vamos viajando" data-retina="true">
					</div> --}}
				@foreach($sliderss as $slider)
				<!-- first slide -->
				<div class="ls-slide" data-ls="slidedelay: 5000; transition2d:1;">
					<img src="{{ asset('/images/sliders/'.$slider->image)}}" class="ls-bg" alt="{{$slider->title}}">

					<h3 class="ls-l slide_typo" style=" top: 45%; left: 50%;color: #fff !important;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">{{$slider->title}}</h3>

					<p class="ls-l slide_typo_2 d-none d-lg-block" style="padding: 0 150px;top:210px; left:110px;color: #fff !important;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">{{$slider->description}}</p>
					@if($slider->link)
					<a class="ls-l button_intro_2 " style="top:250px; left:50%;white-space: nowrap;" data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='{{$slider->link}}'>Detalles</a>
					@endif
					<img src="/images/mt.png" style="top:10px;" data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;">
				</div>
				@endforeach
			</div>
		</div>
	@endif
	<!-- End layerslider -->
	{{-- Reasons --}}
	@if (count($reasonsss) > 0)
	<div class="reasons">
		<div class="container">
				<div class="row r">
					@foreach ($reasonsss as $res)
					<div class="row">
						<div class="r_item">
							<div class="item">
								<h6><i><img src="{{ asset('/images/packages/'.$res->image) }}" width="90%" height="90%" alt=""></i>{{ $res->title }}</h6>
								<p>{{ $res->body }}</p>
							</div>
						</div>
					</div>
					@endforeach	
				</div>
		</div>
	</div>
	@endif
	{{-- End Reasons --}}

	<div class="regions">
		<div class="container">
			<h2 class="text-center">Trips Collection</h2>
			<p class="text-center">Find the best offer suiting your taste & budget</p>
			<div class="tab_head d-none d-sm-block">
				<ul class="nav justify-content-center" id="myTab" role="tablist">

					<li class="nav-item">
						<a class="nav-link active"  aria-current="page" id="region{{ $destinationss[0]->id }}-tab" data-toggle="tab" href="#region-{{$destinationss[0]->slug}}" role="tab"
						aria-controls="#region-{{ $destinationss[0]->id }}" aria-selected="true">{{$destinationss[0]->name}}</a>
					</li>
					@if (Arr::except($destinations, 0))
					@foreach ($destinations as $dest)
					<li class="nav-item">
						<a class="nav-link"  aria-current="page" id="region{{ $dest->id }}-tab" data-toggle="tab" href="#region-{{$dest->slug}}	" role="tab"
						aria-controls="#region-{{ $dest->id }}" aria-selected="true">{{$dest->name}}</a>
					</li>
					@endforeach
					@endif

				</ul>
			</div>
			<div class="tab_head tab_head_m d-sm-none">
				<ul class="nav justify-content-center" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active"  aria-current="page" id="region{{ $destinationss[0]->id }}-tab" data-toggle="tab" href="#region-{{$destinationss[0]->slug}}" role="tab"
						aria-controls="#region-{{ $destinationss[0]->id }}" aria-selected="true">{{$destinationss[0]->name}}</a>
					</li>
					@if (Arr::except($destinations, 0))
					@foreach ($destinations as $dest)
					<li class="nav-item">
						<a class="nav-link"  aria-current="page" id="region{{ $dest->id }}-tab" data-toggle="tab" href="#region-{{ $dest->id }}" role="tab"
						aria-controls="#region-{{ $dest->id }}" aria-selected="true">{{$dest->name}}</a>
					</li>
					@endforeach
					@endif
					   
				</ul>
			</div>
			<div class="tab_body">
				<div class="tab-content" id="myTabContent">
					 <div class="tab-pane fade show active" role="tabpanel" id="region-{{$destinationss[0]->slug}}"> 
						@php
							$packages = \App\Model\Package::where('destination_id', 1)->where('landing',false)->where('viewInSite',true)->where('inHome',true)->get();
						@endphp 
						<div class="d-none d-sm-block">
							<div class="row">
								@foreach ($packages as $package)
								<div class="col-lg-3 col-md-6">
									<div class="product">
										<div class="product_pic">
											@if($package->type =='combined')
											<a hreflang="es-es" href="/Egipto/paquetes-para-egipto-y-otros-paises/{{ $package->slug }}">
											@else
												<a hreflang="es-es" href="/{{ $package->slug }}">
											@endif
											<img src="{{ asset('/images/packages/'.$package->shortImage)}}" width="100%" height="200px" alt="{{ $package->altShort }}">
											</a>
											<h6>{{ $destinationss[0]->name }}</h6>
										</div>
										<div class="product_body">
											@if($package->type =='combined')
											<a hreflang="es-es" href="/Egipto/paquetes-para-egipto-y-otros-paises/{{ $package->slug }}">
											@else
												<a hreflang="es-es" href="/{{ $package->slug }}">
											@endif
										<h2>{{ $package->name}}</h2></a>
										<div class="price text-right">
											<span class="from">Desde</span><br>
											<span class="p"><span></span>{{Helper::currency_converter($package->startPrice)}}</span>
										</div>
										<div class="date">
											<span style="font-size: 14px;color:#333">{{ $package->duration }}</span>
										</div>
										<div class="rating">
											<i class="icon-star {{ $package->stars >= 1 ? ' voted' : '' }}"></i>
											<i class="icon-star {{ $package->stars >= 2 ? ' voted' : '' }}"></i>
											<i class="icon-star {{ $package->stars >= 3 ? ' voted' : '' }}"></i>
											<i class="icon-star {{ $package->stars >= 4 ? ' voted' : '' }}"></i>
											<i class="icon-star {{ $package->stars >= 5 ? ' voted' : '' }}"></i>
											{{-- <small>({{ $package->starsNum }})</small> --}}
										</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="d-sm-none">
							<div class="prod_slider">
								@foreach ($packages as $package)
									<div class="prod_slider_item">
										<div class="s_item">
											<div class="product">
												<div class="product_pic">
													@if($package->type =='combined')
													<a hreflang="es-es" href="/Egipto/paquetes-para-egipto-y-otros-paises/{{ $package->slug }}">
													@else
														<a hreflang="es-es" href="/{{ $package->slug }}">
													@endif
													<img src="{{ asset('/images/packages/'.$package->shortImage)}}" width="100%" height="200px" alt="{{ $package->altShort }}">
													</a>
													<h6>{{ $destinationss[0]->name }}</h6>
												</div>
												<div class="product_body">
													@if($package->type =='combined')
													<a hreflang="es-es" href="/Egipto/paquetes-para-egipto-y-otros-paises/{{ $package->slug }}">
													@else
														<a hreflang="es-es" href="/{{ $package->slug }}">
													@endif
												<h2>{{ $package->name}}</h2></a>
												<div class="price text-right">
													<span class="from">Desde</span><br>
													<span class="p"><span></span>{{Helper::currency_converter($package->startPrice)}}</span>
												</div>
												<div class="date">
													<span style="font-size: 14px;color:#333">{{ $package->duration }}</span>
												</div>
												<div class="rating">
													<i class="icon-star {{ $package->stars >= 1 ? ' voted' : '' }}"></i>
													<i class="icon-star {{ $package->stars >= 2 ? ' voted' : '' }}"></i>
													<i class="icon-star {{ $package->stars >= 3 ? ' voted' : '' }}"></i>
													<i class="icon-star {{ $package->stars >= 4 ? ' voted' : '' }}"></i>
													<i class="icon-star {{ $package->stars >= 5 ? ' voted' : '' }}"></i>
													{{-- <small>({{ $package->starsNum }})</small> --}}
												</div>
												
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
						<div class="buttons text-center">
							<a href="/{{tdestinations('30000000')}}" class="btn-main">View All</a>
						</div>
					</div> 
					@if (Arr::except($destinations, 0))
					@foreach ($destinations as $dest)
					<div class="tab-pane fade" role="tabpanel" id="region-{{$dest->slug}}">
						@php
							$packages = \App\Model\Package::where('destination_id', $dest->id)->where('landing',false)->where('viewInSite',true)->where('inHome',true)->get();
						@endphp
												<div class="d-none d-sm-block">
													<div class="row">
														@foreach ($packages as $package)
														<div class="col-lg-3 col-md-6">
															<div class="product">
																<div class="product_pic">
																	@if($package->type =='combined')
																	{{-- <a hreflang="es-es" href="/Egipto/paquetes-para-egipto-y-otros-paises/{{ $package->slug }}"> --}}
																	@else
																		<a hreflang="es-es" href="/{{ $package->slug }}">
																	@endif
																	<img src="{{ asset('/images/packages/'.$package->shortImage)}}" width="100%" height="200px" alt="{{ $package->altShort }}">
																	</a>
																	<h6>{{ $dest->name }}</h6>
																</div>
																<div class="product_body">
																	@if($package->type =='combined')
																	{{-- <a hreflang="es-es" href="/Egipto/paquetes-para-egipto-y-otros-paises/{{ $package->slug }}"> --}}
																	@else
																		<a hreflang="es-es" href="/{{ $package->slug }}">
																	@endif
																<h2>{{ $package->name}}</h2></a>
																<div class="price text-right">
																	<span class="from">Desde</span><br>
																	<span class="p"><span></span>{{Helper::currency_converter($package->startPrice)}}</span>
																</div>
																<div class="date">
																	<span style="font-size: 14px;color:#333">{{ $package->duration }}</span>
																</div>
																<div class="rating">
																	<i class="icon-star {{ $package->stars >= 1 ? ' voted' : '' }}"></i>
																	<i class="icon-star {{ $package->stars >= 2 ? ' voted' : '' }}"></i>
																	<i class="icon-star {{ $package->stars >= 3 ? ' voted' : '' }}"></i>
																	<i class="icon-star {{ $package->stars >= 4 ? ' voted' : '' }}"></i>
																	<i class="icon-star {{ $package->stars >= 5 ? ' voted' : '' }}"></i>
																	{{-- <small>({{ $package->starsNum }})</small> --}}
																</div>
																
																</div>
															</div>
														</div>
														@endforeach
													</div>
												</div>
												<div class="d-sm-none">
													<div class="prod_slider">
														@foreach ($packages as $package)
															<div class="prod_slider_item">
																<div class="s_item">
																	<div class="product">
																		<div class="product_pic">
																			@if($package->type =='combined')
																			<a hreflang="es-es" href="/Egipto/paquetes-para-egipto-y-otros-paises/{{ $package->slug }}">
																			@else
																				<a hreflang="es-es" href="/{{ $package->slug }}">
																			@endif
																			<img src="{{ asset('/images/packages/'.$package->shortImage)}}" width="100%" height="200px" alt="{{ $package->altShort }}">
																			</a>
																			<h6>{{ $destinationss[0]->name }}</h6>
																		</div>
																		<div class="product_body">
																			@if($package->type =='combined')
																			<a hreflang="es-es" href="/Egipto/paquetes-para-egipto-y-otros-paises/{{ $package->slug }}">
																			@else
																				<a hreflang="es-es" href="/{{ $package->slug }}">
																			@endif
																		<h2>{{ $package->name}}</h2></a>
																		<div class="price text-right">
																			<span class="from">Desde</span><br>
																			<span class="p"><span></span>{{Helper::currency_converter($package->startPrice)}}</span>
																		</div>
																		<div class="date">
																			<span style="font-size: 14px;color:#333">{{ $package->duration }}</span>
																		</div>
																		<div class="rating">
																			<i class="icon-star {{ $package->stars >= 1 ? ' voted' : '' }}"></i>
																			<i class="icon-star {{ $package->stars >= 2 ? ' voted' : '' }}"></i>
																			<i class="icon-star {{ $package->stars >= 3 ? ' voted' : '' }}"></i>
																			<i class="icon-star {{ $package->stars >= 4 ? ' voted' : '' }}"></i>
																			<i class="icon-star {{ $package->stars >= 5 ? ' voted' : '' }}"></i>
																			{{-- <small>({{ $package->starsNum }})</small> --}}
																		</div>
																		
																		</div>
																	</div>
																</div>
															</div>
														@endforeach
													</div>
												</div>
												<div class="buttons text-center">
													<a href="/{{ $dest->slug }}" class="btn-main">View All</a>
												</div>
					</div>
					@endforeach
					@endif

				</div>
			</div>
		</div>
	</div>

	@if ($tailors === null)
	<div class="tailor text-center">
		<div class="overlay">
			<div class="container">
				<h3>Personalize Your Trip</h3>
				<p class="nomargin">
					Personalize your trip now! We've prepared a selection of the best travel destinations all across the world to pick from. You'll find the best packages to Egypt, Jordan, Dubai, Morocco, Turkey, Greece, Kenya, Mexico, Peru, India, and many more suiting all tastes, budgets, and time schedules. But if you still can't find the right match, don't worry; we can tailor your trip according to your preferences! We take care of booking your accommodation, arranging your transportation, ensuring that you are accompanied by the most professional tour guides, along with all the other minor details that will make your trip unforgettable. Come with us and let us show you a fantastic adventure awaiting for you. Inquire Now!
				</p>
				
				<a hreflang="es-es" href="/personaliza-tu-viaje" class="btn-main">Comienza Ahora</a>
			</div>
		</div>
	</div>
	@else
	<div class="tailor text-center" style="background-image: url({{ asset('/images/packages/'.$tailors->image) }})">
		<div class="overlay">
			<div class="container">
				<h3>{{ $tailors->title }}</h3>
				<p class="nomargin">{!! $tailors->body !!}</p>
				{{-- <div class="col-12">
					<ul class="list_order text-left" style="margin-left: 75px; color:#fff;">
						<li>Imagina tu viaje soñado .</li>
						<li>Rellena el formulario con tus respuestas .</li>
						<li>Uno de nuestros expertos en viajes se pondrá en contacto contigo .</li>
					</ul>
				</div> --}}
				<a hreflang="es-es" href="/customize-your-trip" class="btn-main">Custom Tour</a>
			</div>
		</div>
	</div>
	@endif



	<div class="region_boxes">
		{{-- <div class="container"> --}}
			<div class="container">
				<div class="row">
					@foreach ($destinationss as $dest)
						@if ($dest->name == 'Turquía' || $dest->name == 'Marruecos')
						<div class="col-md-6">
							<a href="/{{ $dest->slug }}">
								<div class="item text-center" style="background-image: url('{{ asset('/images/packages/'.$dest->image)}}')">
									<div class="overlay">
										<h4>{{ $dest->name }}</h4>
									</div>
								</div>
							</a>
						</div>
						@endif
						@if ($dest->name == 'Egipto')
						<div class="col-md-12">
							<a href="/{{ $dest->slug }}">
								<div class="item text-center" style="background-image: url('{{ asset('/images/packages/'.$dest->image)}}')">
									<div class="overlay">
										<h4>{{ $dest->name }}</h4>
									</div>
								</div>
							</a>
						</div>
						@endif
					@endforeach
				</div>
			</div>
		{{-- </div> --}}
	</div>

	<div class="contact">
		<div class="container">
			<div class="fill text-center">
				<h2>Get in Touch</h2>
				<p class="text-center">Need assistance with your next trip? Catch up with our local travel agents and drop us an email here!</p>
			</div>
			<div class="contact_body">
				<div class="row">
					<div class="col-md-12">
						<div class="contact_form">
							<form method="post" action="/contact" id="contactform">
								@csrf
									<input name="terms" type="hidden" value="{{ request()->terms }}">
									<input name="source" type="hidden" value="{{ request()->source }}">
									<input name="previous" type="hidden" value="{{ URL::previous() }}">
									<input name="utm_campaign" type="hidden" value="{{ request()->utm_campaign }}">
									<input name="utm_term" type="hidden" value="{{ request()->utm_term }}">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>First Name</label>
											<input
											required=""
											oninvalid="this.setCustomValidity('Este Campo es requerido')"
											oninput="setCustomValidity('')"
		
											type="text" class="form-control" id="name_contact" name="name_contact" placeholder="First Name">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Last Name</label>
											<input
											required=""
											oninvalid="this.setCustomValidity('Este Campo es requerido')"
											oninput="setCustomValidity('')"
											type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="Last Name">
										</div>
									</div>
								</div>
								<!-- End row -->
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Email</label>
											<input
											required=""
											oninvalid="this.setCustomValidity('Este Campo es requerido')"
											oninput="setCustomValidity('')"
											type="email" id="email" name="email" class="form-control" placeholder="Email">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Phone or Whatsapp</label>
											<input
											required=""
											oninvalid="this.setCustomValidity('Este Campo es requerido')"
											oninput="setCustomValidity('')"
											type="text" id="whats" name="whats" class="form-control" placeholder="Phone or Whatsapp">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label>Type of Tours *</label>
											<select required="" oninvalid="this.setCustomValidity('Este Campo es requerido')" oninput="setCustomValidity('')" name="destination" class="form-control ">
												<option value="">Type of Tours *</option>
												<option value="Destination">Destination</option>
												<option value="Nile Cruise">Nile Cruise</option>
												<option value="Camping">Camping</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Budget *<span> Per person </span></label>
	
											<select name="budget" class="form-control">
												<option value="">Budget *</option>
												<option value="Por Persna $1000 - $2000">Per Person $1000 - $2000</option>
												<option value="Por Persona $2000 - $3000">Per Person $2000 - $3000</option>
												<option value="Por Persona $3000 en adelante">Per Person $3000 Above</option>
											</select>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label><i class="icon-calendar-7"></i> Preferred Travel Dates *</label>
											<input
											required=""
											readonly
											oninvalid="this.setCustomValidity('Este Campo es requerido')"
											oninput="setCustomValidity('')"
											class="date-pick form-control {{ $errors->has('Arrival') ? ' is-invalid' : '' }}" data-date-format="" name="Arrival" type="text" placeholder="d/m/aaaa">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											{{-- <label>Mensaje</label> --}}
											<textarea
											required=""
										oninvalid="this.setCustomValidity('Este campo es requerido')"
										oninput="setCustomValidity('')"
										 rows="4" id="comment" name="comment" class="form-control" placeholder="the more information, the better." style="height:200px;"></textarea>
										</div>
									</div>
								</div>
								{{-- <div class="row"> --}}
										{!! app('captcha')->render(); !!}
									<div class="text-center">
										<input type="submit" value="Submit" class="btn-main" id="submit-contact">
									</div>
								{{-- </div> --}}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- <div class="reviews">
		<div class="container">
			<h4 class="text-center">Reseñas recientes</h4>
			<p class="text-center">Opiniones de Nuestros Usuarios</p>
			<div id="feefo-service-review-carousel-widgetId" class="feefo-review-carousel-widget-service"></div>
		</div>
	</div> --}}

	<div class="blog">
		<div class="overlay">
			<div class="container">
				<h4 class="text-center">Featured Articles</h4>
				<p class="text-center">Discover Our Featured Articles</p>
				<div class="row">
					@foreach ($blogsss as $blog)
					<div class="col-md-3">
						<div class="box">
							<a href="/blog-de-viajes/{{ $blog->type }}/{{ $blog->slug }}">
								<div class="pic" style="background-image: url('{{ asset('/images/blogs/'.$blog->image) }}')">
								</div>
							</a>
							<div class="content">
								<a href="/blog-de-viajes/{{ $blog->type }}/{{ $blog->slug }}">
									<h2>{{ $blog->title  }}</h2>
								</a>
								<h6><span>{{ $blog->created_at->format('d F') }}</span></h6>
							</div>
						</div>
					</div>
				  @endforeach
				</div>
			</div>
		</div>
	</div>



	<div class="container margin_60">

		{{-- @include('layouts.Reviews') --}}
		@include('layouts.faq')

	</div>
	
	<!-- End container -->

</main>
<!-- End main -->
@endsection

@section('js')

	<!-- Specific scripts -->
	<script src="/front/layerslider/js/greensock.js"></script>
	<script src="/front/layerslider/js/layerslider.transitions.js"></script>
	<script src="/front/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
	<script src="{{ asset('/front/js/datepicker_advanced.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			'use strict';
			$('#layerslider').layerSlider({
				autoStart: true,
				responsive: true,
				responsiveUnder: 1280,
				layersContainer: 1170,
				skinsPath: '/front/layerslider/skins/'
					// Please make sure that you didn't forget to add a comma to the line endings
					// except the last line!
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
            startDate: "+2d",
            autoclose: true
        });

        $('input.date-pick2').datepicker({
            format: "dd/mm/yyyy",
            startDate: "+2d",
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
            const newStartDate = new Date(dateArray[2], dateArray[1] - 1, dateArray[0] + 4);

            $('input.date-pick2').datepicker('setStartDate', newStartDate)
            // $('input.date-pick2').datepicker('setDate', newStartDate);
        })
	});
</script>


@endsection
