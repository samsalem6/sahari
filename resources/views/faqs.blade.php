@extends('layouts.app')
@section('css')
@endsection
@section('title','Preguntas Frecuentes')
@section('meta')
	<meta name="title" content="Preguntas Frecuentes">
	<meta name="keywords" content="Preguntas Frecuentes">
	<meta name="description" content="Preguntas frecuentes de los viajeros sobre los diferentes temas. Consulte nuestras respuestas para planificar tu viaje con manera perfecta">
@endsection
@section('content')

<div class="banners-b text-center" style="background-image: url('../../images/faq.jpg')">
	<div class="overlay">
			{{-- <div class="d-lg-none">
					<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 50px;position: absolute;right: 0%;top: 30%;" alt="Nile Cruises" data-retina="true">
				</div>
				<div class="d-none d-lg-block">
					<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 0%;top: 20%;" alt="Nile Cruises" data-retina="true">
				</div> --}}
				<div class="container">
					<div class="animated fadeInDown">
						<h1>Preguntas Frecuentes</h1>
						{{-- <p>
							Preguntas frecuentes de los viajeros sobre los diferentes temas. Consulte nuestras respuestas para planificar tu viaje con manera perfecta
						</p> --}}
						<div id="position">
							<div class="container">
								<ul class="list-unstyled">
									<li><a href="/">Incio</a>
									</li>
									<li class="arrow"><i class="icon-angle-right"></i></li>
									<li>Preguntas Frecuentes</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

	</div>
</div>
<!-- End section -->

<div class="search">
    <div class="container">
        <h2 class="text-center">Hola, ¿Cómo podemos ayudar?</h2>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="s_body">
                    <form>
                        <div class="row">
                            <div class="col-lg-9 col-md-8 col-sm-7">
                                <div class="s_in">
                                    <i class="fa fa-search s"></i>
                                    <input type="text" id="search_by_text" placeholder="Escriba palabras claves para encontrar respuestas" name="search">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-5">
                                <button>Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<main class="package-det">
	
	<!-- Position -->

	<div class="container margin_60">

		<div class="row">

			<!--End aside -->
			<div class="col-lg-8 col-md-7" id="faq">
				<h4 class="title">Preguntas Frecuentes</h4>
				<p>Encuentre respuestas a sus preguntas antes de unirse a un recorrido para que pueda averiguar exactamente lo que quiere saber.</p>
				<div id="payment" class="accordion_styled">
				@foreach ($faqss as $faqs)
				  <div class="card">
					<div class="card-header">
					  <h3>
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapse_{{ $faqs->id }}">{{ $faqs->title }}<i class="indicator {{ $loop->first ?'icon-down-open':'icon-down-open' }}  float-right"></i></a>
					  </h3>
					</div>
					<div id="collapse_{{ $faqs->id }}" class="collapse" data-parent="#payment">
					  <div class="card-body">
							{!! $faqs->body !!}
					  </div>
					</div>
				  </div>
				@endforeach

			</div>
			<!-- End col lg-9 -->
			<hr>
			{{-- @include('layouts.Reviews') --}}
		</div>
		@if ($contactss !== null)
		<div class="col-lg-4 col-md-5">
			<div class="address">
				<h5>Dirección</h5>
				@if ($contactss->location)
				<div>{{ $contactss->location }}</div>
				@endif
				<div class="line"></div>
				<h5>Email</h5>
				@if ($contactss->email)
				<div>{{ $contactss->email }}</div>
				@endif
			</div>
		</div>
		@endif

		<!-- End row -->
	</div>
	<!-- End container -->
</main>
<!-- End main -->
@endsection
@section('js')
@endsection


