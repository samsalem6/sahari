@extends('layouts.app')
@section('css')
<!-- CSS -->
<link href="{{ asset('/front/css/blog.css')}}" rel="stylesheet">
@endsection
@section('title', $blog->metaTitle)

@section('meta')
	<meta name="title" content="{{$blog->metaTitle}}">
	<meta name="keywords" content="{{$blog->metaKeywords}}">
	<meta name="description" content="{{$blog->metaDescription}}">
@endsection
@section('content')

{{-- <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('/images/tailormake.jpg')}}" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-1">
			<div class="d-lg-none">
			<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 50px;position: absolute;right: 7%;top: 68%;" alt="Nile Cruises" data-retina="true">
			</div>
			<div class="d-none d-lg-block">
				<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 3%;top: 78%;" alt="Nile Cruises" data-retina="true">
			</div>
            <div class="animated fadeInDown">
				<h1>Blog de Viajes</h1>
				<p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
			</div>
	</div>
</section> --}}
<div class="header-b" style="background-image: url({{ asset('/images/blogs/'.$blog->image)}}">
	<div class="overlay">
		{{-- <div class="animated fadeInDown"> --}}
			{{-- <p>
			Contacta con Vamos Viajando. Una de las mejores agencias del Medio Oriente que se especializa en viajes a través de Egipto y otros destinos. Rellena el formulario y uno de nuestros consultores expertos en viajes estará listo para enviarle el mejor paquete a Egipto de acuerdo con su disponibilidad.
			</p> --}}
			<div class="container">
                <div class="content">
                    <h1>{{ $blog->title }}</h1>
                    <h6><span>{{ $blog->created_at->format('d F')  }}</span></h6>
                </div>
			</div>

		{{-- </div> --}}
	</div>
</div>
<!-- End section -->

<main>

	{{-- <div id="position">
		<div class="container">
			<ul>
				<li><a hreflang="es" href="/">Página Principal</a>
				</li>
				<li>Blog de Viajes</li>
				<li>{{$blog->title}}</li>
			</ul>
		</div>
	</div> --}}
	<!-- Position -->

	<div class="container margin_60">
		<div class="row">

            <div class="col-lg-9">
                {{-- <div class="box_style_1"> --}}
                    <div class="post nopadding">
                        {{-- <img src="{{ asset('/images/blogs/'.$blog->image)}}" alt="{{$blog->imageAlt}}" class="img-fluid"> --}}
                        {{-- <div class="post_info clearfix">
                            <div class="post-left">
                                <ul>
                                    <li><i class="icon-calendar-empty"></i>On <span>{{$blog->created_at->format(' Y/m/d')}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        {{-- <h2>{{$blog->title}}</h2>
                        <p>
                            {!!$blog->Description!!}
                        </p> --}}
                        {{-- <hr> --}}


                        @if (count($blog->items)>0)
                            @foreach ($blog->items as $item)
                                <img src="{{ asset('/images/blogs/'.$item->image)}}" alt="{{$item->imageAlt}}" title="{{$item->imageTitle}}" class="img-fluid">
                                <h2>{{$item->title}}</h2>
                                <p>
                                    {!!$item->Description!!}
                                </p>
                                @if ($loop->last)

                                @else

                                <hr>
                                @endif
                            @endforeach
                        @else

                        @endif

                    </div>
                    <!-- end post -->
                {{-- </div> --}}
            </div>

            <aside class="col-lg-3 add_bottom_30">

                <div class="widget">
                    <h4>Tours Sugeridos</h4>
                    <hr>

                    @if (count($blog->Related)>0)
                        <div class="container ">
                            <div class="row">
                                @foreach ($blog->Related as $item)
                                @if (getPackage_id($item->package->id))
                                @if ($loop->first)
                                        <div class="col-lg-12 col-md-12  zoomIn">
                                    @else
                                    <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.{{ $loop->index }}s">
                                    @endif
                                        <div class="tour_container">
                                            @switch($item->package->popular)
                                                @case('popular')
                                                <div class="ribbon_3 popular"><span>Popular</span></div>
                                                    @break
                                                @case('toprated')
                                                <div class="ribbon_3"><span>Destacado</span></div>
                                                    @break
                                                @default
                                            @endswitch
                                            <div class="img_container">
                                                @if($item->package->hot) 
                                                <a hreflang="es" href="/ofertas-de-viajes/{{ $item->package->slug }}">
                                                @else
                                                    @if($item->package->type =='combined') 
                                                        <a hreflang="es" href="/Egipto/paquetes-para-egipto-y-otros-paises/{{ $item->package->slug }}">
                                                    @else
                                                    <a hreflang="es" href="/{{ $item->package->slug }}">
                                                        @endif
                                                @endif
                                                <img src="{{ asset('/images/packages/'.$item->package->shortImage)}}" width="800" height="533" class="img-fluid" alt="{{ $item->package->altShort }}">
                                                <div class="short_info">
                                                    Desde <span class="price"><sup>$</sup>{{ $item->package->startPrice}}</span>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="tour_title">
                                                <h3><strong>{{ $item->package->name}}</strong></h3>
                                                <div class="rating">
                                                    <i class="icon-smile {{ $item->package->stars >= 1 ? ' voted' : '' }}"></i>
                                                    <i class="icon-smile {{ $item->package->stars >= 2 ? ' voted' : '' }}"></i>
                                                    <i class="icon-smile {{ $item->package->stars >= 3 ? ' voted' : '' }}"></i>
                                                    <i class="icon-smile {{ $item->package->stars >= 4 ? ' voted' : '' }}"></i>
                                                    <i class="icon-smile {{ $item->package->stars >= 5 ? ' voted' : '' }}"></i>
                                                    <small>({{ $item->package->starsNum }})</small>
                                                </div><!-- end rating -->
                                            </div>
                                        </div>
                                    </div>

                                @else

                                @endif

                                @endforeach
                            </div><!-- End row -->
                        </div><!-- End container -->
                    @endif

                    {{-- @if (count($blog->Related)>0)
                        <div class="container ">
                            <div class="row">
                                @foreach ($blog->Related as $item)
                                @if ($loop->first)
                                    <div class="col-lg-12 col-md-12  zoomIn">
                                @else
                                <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.{{ $item->package->id }}s">
                                @endif
                                    <div class="tour_container">
                                        @switch($item->package->popular)
                                            @case('popular')
                                            <div class="ribbon_3 popular"><span>Popular</span></div>
                                                @break
                                            @case('toprated')
                                            <div class="ribbon_3"><span>Destacado</span></div>
                                                @break
                                            @default
                                        @endswitch
                                        <div class="img_container">
                                            <a href="/Egipto/Viajes-Egipto/{{ $item->package->slug }}">
                                            <img src="{{ asset('/images/packages/'.$item->package->shortImage)}}" width="800" height="533" class="img-fluid" alt="{{ $item->package->altShort }}">
                                            <div class="short_info">
                                                Desde<span class="price"><sup>$</sup>{{ $item->package->startPrice}}</span>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="tour_title">
                                            <h3><strong>{{ $item->package->name}}</strong></h3>
                                            <div class="rating">
                                                <i class="icon-smile {{ $item->package->stars >= 1 ? ' voted' : '' }}"></i>
                                                <i class="icon-smile {{ $item->package->stars >= 2 ? ' voted' : '' }}"></i>
                                                <i class="icon-smile {{ $item->package->stars >= 3 ? ' voted' : '' }}"></i>
                                                <i class="icon-smile {{ $item->package->stars >= 4 ? ' voted' : '' }}"></i>
                                                <i class="icon-smile {{ $item->package->stars >= 5 ? ' voted' : '' }}"></i>
                                                <small>({{ $item->package->starsNum }})</small>
                                            </div><!-- end rating -->
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div><!-- End row -->
                        </div><!-- End container -->
                    @endif --}}
                </div>
                <!-- End widget -->
            </aside>
            <!-- End aside -->

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
            $('input.date-pick2').datepicker('setDate', newStartDate);
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

<script src="{{ asset('/front/js/datepicker_advanced.js')}}"></script>

@endsection
