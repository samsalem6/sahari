@extends('layouts.app')
@section('css')
<!-- CSS -->
<link href="{{ asset('/front/css/blog.css')}}" rel="stylesheet">
@endsection
@section('title', 'Blog de Viajes a Turquía')

@section('meta')
	<meta name="title" content="Blog de Viajes a Turquía">
	<meta name="keywords" content="Blog de Viajes a Turquía">
	<meta name="description" content="Bienvenido al blog de Vamos Viajando, Te invitamos para dar consejos de seguridad, alimentos y más. Nuestro Blog de Viajes a Turquía te dice todo lo que necesita saber.">
@endsection
@section('content')

{{-- <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('/images/Second_subpage_photo.jpeg')}}" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-1"> --}}
			{{-- <div class="d-lg-none">
			<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 50px;position: absolute;right: 7%;top: 68%;" alt="Nile Cruises" data-retina="true">
			</div>
			<div class="d-none d-lg-block">
				<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 0%;top: 20%;" alt="Nile Cruises" data-retina="true">
			</div> --}}
            {{-- <div class="animated fadeInDown">
				<h1>Blog de Viajes a Turquía</h1>
			</div>
	</div>
</section> --}}
<!-- End section -->
<div class="blogs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-sm-6 nopadding">
                @if ($tblogs[0])
                    <a href="/blog-de-viajes/blog-de-viajes-a-turquia/{{$tblogs[0]->slug}}">
                        <div class="item big" style="background-image: url({{ asset('/images/blogs/'.$tblogs[0]->image)}})">
                            <div class="overlay">
                                <div class="content">
                                    <h3>{{ $tblogs[0]->title }}</h3>
                                    <h6><span>{{$tblogs[0]->created_at->format('d F')}}</span></h6>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
            <div class="col-lg-5 col-sm-6 nopadding">
                <div class="row nomargin">
                    {{-- @if (Arr::except($tblogs, 0)) --}}
                        @foreach (Arr::except($tblogs, 0) as $tblog)
                            <div class="col-12 nopadding pl-sm-3">
                                <a href="/blog-de-viajes/blog-de-viajes-a-turquia/{{$tblog->slug}}">
                                    <div class="item" style="background-image: url({{ asset('/images/blogs/'.$tblog->image)}})">
                                        <div class="overlay">
                                            <div class="content">
                                                <h3>{{ $tblog->title }}</h3>
                                                <h6><span>{{$tblog->created_at->format('d F')}}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>

<main>

	{{-- <div id="position">
		<div class="container">
			<ul>
				<li><a hreflang="es" href="/">Página Principal</a>
				</li>
				<li>Blog de Viajes a Turquía</li>
			</ul>
		</div>
	</div> --}}
	<!-- Position -->
    <div class="featured">
        <div class="container">
            <h1>¡Inspírate & vive la experiencia real!</h1>
            <h2 class="line"><span>Artículos relacionados</span></h2>
            <div class="details">
                <div class="row">
                    @foreach ($tblogss as $tblog)
                    <div class="col-md-3">
                        <div class="box">
                            <a href="/blog-de-viajes/blog-de-viajes-a-turquia/{{ $tblog->slug }}">
                                <div class="pic" style="background-image: url('{{ asset('/images/blogs/'.$tblog->image) }}')">
                                </div>
                            </a>
                            <div class="content">
                                <a href="/{{ $tblog->slug }}">
                                    <h2>{{ $tblog->title  }}</h2>
                                </a>
                                <h6><span>{{ $tblog->created_at->format('d F') }}</span></h6>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>

        </div>
    </div>

	<div class="container margin_60">
		<div class="row">

            <div class="col-lg-9 col-md-8">
                {{-- <div class="box_style_1"> --}}
                    <h3 class="line"><span>Todos los artículos</span></h3>

                    @if (count($blogs)>0)
                        @foreach ($blogs as $blog)
                            <div class="post">
                                <div class="row nomargin">
                                    <div class="col-lg-4 col-md-5 nopadding">
                                        <a hreflang="es" href="/blog-de-viajes/blog-de-viajes-a-turquia/{{$blog->slug}}"><img src="{{ asset('/images/blogs/'.$blog->image)}}" title="{{$blog->imageTitle}}" alt="Image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-md-7 nopadding">
                                        <div class="contant">
                                            <a hreflang="es" href="/blog-de-viajes/blog-de-viajes-a-turquia/{{$blog->slug}}"><h3>{{$blog->title}}</h3></a>
                                            <h6><i class="icon-calendar-empty"></i><span>{{$blog->created_at->format(' Y/m/d')}}</span></h6>
                                            <p>
                                                {!!$blog->shortDescription!!}
                                            </p>
                                            {{-- <div class="text-right">
                                                <a hreflang="es" href="/blog-de-viajes/blog-de-viajes-a-turquia/{{$blog->slug}}" class="btn btn-primary">Read more</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <!-- end post -->
                        @endforeach
                    @else
                    @endif
                    {{-- <hr> --}}
                {{-- </div> --}}
                {{-- <hr> --}}
                <nav aria-label="Page navigation">
                    {{$blogs}}
                </nav>
                <!-- end pagination-->

            </div>
            <div class="col-lg-3 col-md-4">
                <div class="latest">
                    <h4 class="line"><span>últimos artículos</span></h4>
                    <div class="details">
                        {{-- <div class="row"> --}}
                            @foreach ($tblogss as $tblog)
                            {{-- <div class="col-md-3"> --}}
                                <div class="box">
                                    <a href="/blog-de-viajes/blog-de-viajes-a-turquia/{{ $tblog->slug }}">
                                        <div class="pic" style="background-image: url('{{ asset('/images/blogs/'.$tblog->image) }}')">
                                        </div>
                                    </a>
                                    <div class="content">
                                        <a href="/{{ $tblog->slug }}">
                                            <h2>{{ $tblog->title  }}</h2>
                                        </a>
                                        <h6><span>{{ $tblog->created_at->format('d F') }}</span></h6>
                                    </div>
                                </div>
                            {{-- </div> --}}
                          @endforeach
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            <!-- End col -->

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
