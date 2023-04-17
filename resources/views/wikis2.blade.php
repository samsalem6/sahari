@extends('layouts.app')
@section('css')
<!-- CSS -->
<link href="{{ asset('/front/css/blog.css')}}" rel="stylesheet">
<?php
$page = '';
if (isset($_GET['page'])) {
    $page = 'Page ' . $_GET['page'];
}
?>
@endsection
    @if ($da == 'Turquia')
        @section('title', 'Turquía Guia de Viajes ' . $page)
    @elseif($da == 'Egipto')
        @section('title', 'Egipto Guía de Viajes ' . $page)
    @elseif ($da == 'marruecos')
        @section('title', 'Marruecos Guía de viajes ' . $page)
    @elseif ($da == 'dubai')
        @section('title', 'Dubai Guía de viajes ' . $page)
    @endif
@section('meta')
    @if ($da == 'Turquia')
        <meta name="title" content="Turquía guía de viajes {{$page}}">
        <meta name="keywords" content="Turquía guía de viajes">
        <meta name="description" content="Descubre los principales lugares de interés, los mejores lugares para visitar, actividades y mucho más. a través de Turquia guia de viajes {{$page}}.">
    @elseif($da == 'Egipto')
        <meta name="title" content="Egipto guía de viajes {{$page}}">
        <meta name="keywords" content="Egipto guía de viajes">
        <meta name="description" content="¡Aquí encontrará información general sobre Egipto. La información de Egipto muestra todos los detalles sobre este fantástico destino {{$page}}.">
    @elseif ($da == 'marruecos')
        <meta name="title" content="Marruecos Guía de viajes {{$page}}">
        <meta name="keywords" content="Marruecos Guía de viajes">
        <meta name="description" content="Aquí puedes descubrir los principales lugares de interés, los mejores lugares para visitar, actividades y mucho más a través del Guía de Viajes para Marruecos {{$page}}.">
        @elseif ($da == 'dubai')
        <meta name="title" content="Dubai Guía de viajes {{$page}}">
        <meta name="keywords" content="Dubai Guía de viajes">
        <meta name="description" content="Descubre qué ver, dónde comer, cómo ahorrar y mucho más. En nuestra guía de viajes Dubai {{$page}}.">

    @endif
@endsection
@section('content')
    @if ($da == 'Turquia')
        <div class="banners-b text-center"  style="background-image: url({{ asset('/images/Turquia.png')}})">
    @elseif($da == 'Egipto')
        <div class="banners-b text-center"   style="background-image: url({{ asset('/images/Egipto.png')}})">
    @elseif ($da == 'marruecos')
        <div class="banners-b text-center"  style="background-image: url({{ asset('/images/Marruecos.jpeg')}})">
    @elseif ($da == 'dubai')
        <div class="banners-b text-center"  style="background-image: url({{ asset('/images/dubai.jpeg')}})">
    @endif
	<div class="overlay">
			{{-- <div class="d-lg-none">
			<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 50px;position: absolute;right: 7%;top: 68%;" alt="Nile Cruises" data-retina="true">
			</div>
			<div class="d-none d-lg-block">
				<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 0%;top: 20%;" alt="Nile Cruises" data-retina="true">
			</div> --}}
            <div class="container">
                <div class="animated fadeInDown">
                    @if ($da == 'Turquia')
                    <h1>Turquía Guia de Viajes</h1>
                    {{-- <p>
                        ¡Aquí encontrará información general sobre Turquía. Descubre los principales lugares de interés, los mejores lugares para visitar, actividades y mucho más. ¡Déjate encantar por este increíble país
                    </p> --}}
                    <div id="position">
                        <div class="container">
                            <ul class="list-unstyled">
                                <li><a hreflang="es" href="/">Inicio</a>
                                </li>
                                <li class="arrow"><i class="icon-angle-right"></i></li>
                                <li>Turquía Guia de Viajes</li>
                            </ul>
                        </div>
                    </div>
                    @elseif($da == 'Egipto')
                    <h1>Egipto Guía de Viajes</h1>
                    {{-- <p>
                        ¡Aquí encontrará información general sobre Egipto. La información de Egipto muestra todos los detalles sobre este fantástico destino.
                    </p> --}}
                    <div id="position">
                        <div class="container">
                            <ul class="list-unstyled">
                                <li><a hreflang="es" href="/">Inicio</a>
                                </li>
                                <li class="arrow"><i class="icon-angle-right"></i></li>
                                <li>Egipto Guía de Viajes</li>
                            </ul>
                        </div>
                    </div>
                    @elseif ($da == 'marruecos')
                    <h1>Marruecos Guía de viajes</h1>
                    {{-- <p>
                        Aquí puedes descubrir los principales lugares de interés, los mejores lugares para visitar, actividades y mucho más a través del Guía de Viajes para Marruecos.
                    </p> --}}
                    <div id="position">
                        <div class="container">
                            <ul class="list-unstyled">
                                <li><a hreflang="es" href="/">Inicio</a>
                                </li>
                                <li class="arrow"><i class="icon-angle-right"></i></li>
                                <li>Marruecos Guía de viajes</li>
                            </ul>
                        </div>
                    </div>
                    @elseif ($da == 'dubai')
                    <h1>Dubai Guía de viajes</h1>
                    {{-- <p>
                        Descubre qué ver, dónde comer, cómo ahorrar y mucho más. En nuestra guía de viajes Dubai
                    </p> --}}
                    <div id="position">
                        <div class="container">
                            <ul class="list-unstyled">
                                <li><a hreflang="es" href="/">Inicio</a>
                                </li>
                                <li class="arrow"><i class="icon-angle-right"></i></li>
                                <li>Dubai Guía de viajes</li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

	</div>
</div>
<!-- End section -->

<main>
{{-- 
	<div id="position">
		<div class="container">
			<ul>
				<li><a href="/">Página Principal</a>
                </li>
                <li><a href="/guia-de-viajes">guia de viajes</a>
				</li>
				<li>
                @if ($da == 'Turquia')
				Turquia Guía de Viajes
                @elseif($da == 'Egipto')
				Egipto Guía de Viajes
                @elseif ($da == 'marruecos')
				Marruecos Guía de viajes
                @elseif ($da == 'dubai')
                Dubai Guía de viajes
                @endif
                </li>
			</ul>
		</div>
	</div> --}}
	<!-- Position -->

	<div class="container margin_60">
        @if (count($wikis)>0)
		<div class="row">

            <div class="col-lg-9">
                {{-- <div class="box_style_1"> --}}

                        @foreach ($wikis as $wiki)
                        <div class="post">
                            <div class="row nomargin">
                                <div class="col-lg-4 col-md-5 nopadding">
                                    <a hreflang="es" href="/guia-de-viajes/{{$wiki->slug}}"><img src="{{ asset('/images/wikis/'.$wiki->image)}}" title="{{$wiki->imageTitle}}" alt="Image" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-7 nopadding">
                                    <div class="contant">
                                        <a hreflang="es" href="/guia-de-viajes/{{$wiki->slug}}"><h3>{{$wiki->title}}</h3></a>
                                        <h6><i class="icon-calendar-empty"></i><span>{{$wiki->created_at->format(' Y/m/d')}}</span></h6>
                                        <p>
                                            {!!$wiki->shortDescription!!}
                                        </p>
                                        {{-- <div class="text-right">
                                            <a href="/guia-de-viajes/{{$wiki->slug}}" class="btn_1">Leer Más</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                            
                            <!-- end post -->
                        @endforeach
                        {{-- <hr> --}}

                    {{-- </div> --}}
                    {{-- <hr> --}}

                    <nav aria-label="Page navigation">
                        {{$wikis}}
                    </nav>
                    <!-- end pagination-->

                </div>
                <!-- End col -->

            </div>
            @else

            @endif
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
