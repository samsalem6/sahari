@extends('layouts.app')
@section('css')
<!-- Global site tag (gtag.js) - Google Ads: 768703777 -->

<script async src="https://www.googletagmanager.com/gtag/js?id=AW-768703777"></script>

{{-- <script>

	window.dataLayer = window.dataLayer || [];

	function gtag(){dataLayer.push(arguments);}

	gtag('js', new Date());


	gtag('config', 'AW-768703777');

</script> --}}

<!-- Event snippet for Experiment form conversion page -->

{{-- <script>

	gtag('event', 'conversion', {'send_to': 'AW-768703777/x4FlCMrEupMBEKH6xe4C'});

</script> --}}
@endsection
@section('title', 'Gracias Por Enviar Tu Solicitud')
@section('meta')
	<meta name="title" content="Gracias Por Enviar Tu Solicitud">
	<meta name="keywords" content="Gracias Por Enviar Tu Solicitud">
	<meta name="description" content="Muchas gracias, hemos recibido tu consulta y uno de nuestros asesores se pondrá en contacto contigo dentro de 24 horas.">
@endsection
@section('content')

<div class="banners-b text-center" data-image-src="/images/contactus.jpg" style="background-image: url('../../images/contactus.jpg')">
	<div class="overlay">
			{{-- <div class="d-lg-none">
					<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 50px;position: absolute;left: 0%;top: 30%;" alt="Nile Cruises" data-retina="true">
				</div>
				<div class="d-none d-lg-block">
					<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 0%;top: 98px;" alt="Nile Cruises" data-retina="true">
				</div> --}}
				<div class="container">
					<div class="animated fadeInDown">
						<h1>Consulta enviada</h1>
					</div>
				</div>

	</div>
</div>
<!-- End Section -->

<main>
	{{-- <div id="position">
		<div class="container">
			<ul>
				<li><a href="/">Incio</a>
				</li>
				<li>Consulta enviada</li>
			</ul>
		</div>
	</div> --}}
	<!-- End position -->

	<div class="container margin_60">
		<div class="row">
			<div class="col-lg-12 add_bottom_15">

				<div class="form_title">

					<h3><strong><i class="icon-ok"></i></strong>Gracias 

						{{session('name')}}

						! </h3>

				</div>

				<div class="step">

					<h6 style="text-align: center;">

						Muchas gracias, hemos recibido tu consulta y uno de nuestros asesores se pondrá en contacto contigo dentro de 24 horas. Te enviaremos tus nuevos planes de viaje a :

						<br>

¿No has recibido la respuesta después de 24 horas? Por favor revisa tu carpeta de Spam para un mensaje de Vamos Viajando. Nosotros acabamos cayendo allí de vez en cuando.

					</h6>

				</div>


				{{-- <div class="form_title">
					<h3><strong><i class="icon-tag-1"></i></strong>Booking summary</h3>
				</div>
				<div class="step">
					<table class="table table-striped confirm">
						<tbody>
							<tr>
								<td>
									<strong>Name</strong>
								</td>
								<td>
									Jhon Doe
								</td>
							</tr>
							<tr>
								<td>
									<strong>Check in</strong>
								</td>
								<td>
									10 April 2015</td>
							</tr>
							<tr>
								<td><strong>Check out</strong>
								</td>
								<td>
									12 April 2015
									<br>
								</td>
							</tr>
							<tr>
								<td><strong>rooms</strong>
								</td>
								<td>1 double room</td>
							</tr>
							<tr>
								<td><strong>Nights</strong>
								</td>
								<td>2</td>
							</tr>
							<tr>
								<td><strong>Adults</strong>
								</td>
								<td>2</td>
							</tr>
							<tr>
								<td><strong>Childs</strong>
								</td>
								<td>0</td>
							</tr>
							<tr>
								<td>
									<strong>Payment type</strong>
								</td>
								<td>
									Credit card
								</td>
							</tr>
							<tr>
								<td>
									<strong>TOTAL COST</strong>
								</td>
								<td>
									$154
								</td>
							</tr>
						</tbody>
					</table>
				</div> --}}
				<!--End step -->
			</div>
			<!--End col -->

		</div>
		<!--End row -->
		<hr>
		{{-- @include('layouts.Reviews') --}}
		@include('layouts.faq')
	</div>
	<!--End container -->
</main>
<!-- End main -->

@endsection
@section('js')

{{-- timo --}}


@endsection