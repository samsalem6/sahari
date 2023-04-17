@extends('layouts.app')
@section('title','Por qué Vamos Viajando?')
@section('meta')
	<meta name="title" content="Por qué Vamos Viajando?">
	<meta name="keywords" content="Por qué Vamos Viajando?">
	<meta name="description" content=" ¿Por qué Vamos Viajando? porque es una de las primeras agencias de viajes que obtuvo todos los registros por parte de Egipto y de las organizaciones internacionales de turismo.">
@endsection
@section('content')

<div class="banners-b text-center" style="background-image: url('../../images/aboutus.jpg')">
	<div class="overlay">
		<div class="container">
			{{-- <div class="animated fadeInDown"> --}}
				<h1>Sobre Nosotros</h1>
				<div id="position">
					<div class="container">
						<ul class="list-unstyled">
							<li><a hreflang="es" href="/">Inicio</a>
							</li>
							<li class="arrow"><i class="icon-angle-right"></i></li>
							<li>Sobre Nosotros</li>
						</ul>
					</div>
				</div>
			{{-- </div> --}}
		</div>
	</div>
</div>
<!-- End Section -->

<main class="about">
	
	<!-- End Position -->

	<div class="container margin_60 text-center">

		<div class="title">
			<h2>¿Por qué reservar con <span style="color: #00aeff">Vamos Viajando </span>? </h2>
		</div>

        <div class="col-lg-12">
            <h6>Sobre Nosotros</h6>
			<p>
				<p>Vamos Viajando es una operadora de turismo con una basta experiencia, siendo una de las primeras agencias de viajes que obtuvo todos los registros por parte de Egipto y de las organizaciones internacionales de turismo para brindarte el mejor servicio y soporte que necesitas durante tus viajes.</p>

				<p>Hemos logrado una especialización en turismo en países del medio oriente y una gran experiencia en destinos como Jordania y Israel. En Vamos Viajando damos especial atención a las necesidades de nuestros clientes, logrando ofrecer lo que necesitan ya que podemos personalizar por completo los tours que tenemos. Trabajamos enfocándonos en la calidad, siendo nuestra prioridad el servicio, seguridad y tranquilidad de nuestros clientes.</p>
	
				<p>Esto se ha logrado trabajando en conjunto desde la dirección hasta el último miembro de nuestro personal el cual se siente orgulloso y feliz de trabajar sobre una misma visión: Ser la compañía líder de turismo en África y Oriente medio por lo es necesario trabajo en equipo. Esto último ha convertido nuestra agencia en una empresa altamente competitiva por el compromiso de todos sus colaboradores que buscarán que tus vacaciones sean inigualables.</p>
	
				<p>Trabajando de la mano de la tecnología, en Vamos Viajando nos esforzamos diariamente para facilitar tu proceso de viaje, desde darte toda la información necesaria sobre tu destino en el momento en que tu lo necesites, complementando con un proceso de reserva simple. Ya sea desde el teléfono móvil u ordenador, así como una conexión segura. Sin descuidar que detrás de eso se cuenta con un equipo humano que podrá entenderte y ayudarte en todo el proceso  las 24 horas, complementadose al llegar a tu destino con personal que hablará tu idioma y facilitará toda tu experiencia.</p>
	
				<p>Por último podemos mencionar que parte de la filosofía de Vamos Viajando es la capacitación constante de todo el personal, por este motivo los comentarios de los clientes son muy importantes para nosotros por que en base a eso, tenemos un plan de capacitación anual, buscando la excelencia en nuestro servicio. Vamos Viajando, por su experiencia y compromiso con nuestros clientes, somos definitivamente la mejor opción para viajar y disfrutar tus vacaciones que tanto mereces.</p>
			</p>

        </div>

        <hr>

        <div class="col-lg-12">
           <h4>Gestionado por</h4>
            <p>
                <b>Business Travel Experts LLC.</b><br>
                <a href="https://www.businesstravelexperts.us/" target="_blank">
                    www.BusinessTravelExperts.us
                </a>
            </p>
            <p>
                630 Freedom Business Center Drive.<br>
                King of Prussia, PA 19406.<br><br>

                <b>Office:</b> +1 6103404040 <br>
                <b>Fax:</b> 4849611189
            </p>
        </div>

        <hr>

		{{-- <hr> --}}
		{{-- @include('layouts.Reviews') --}}
		{{-- @include('layouts.faq') --}}

	</div>
	<div class="tailor text-center">
		<div class="overlay">
			<div class="container">
				<h3>Planificá tu viaje Con <span>Vamos Viajando</span></h3>
				<p>
					Puedes personalizar las vacaciones de tus sueños con una variedad de viajes en Egipto, Jordania,
						Marruecos, Turquía y Dubai a través de 3 sencillos pasos
				</p>
				<div class="col-12">
					<ul class="list_order text-left" style="margin-left: 75px;">
						<li><span>1</span>Imagina tu viaje soñado .</li>
						<li><span>2</span>Rellena el formulario con tus respuestas .</li>
						<li><span>3</span>Uno de nuestros expertos en viajes se pondrá en contacto contigo .</li>
					</ul>
				</div>
				<a hreflang="es-es" href="/personaliza-tu-viaje" class="btn-main">Comienza Ahora</a>
			</div>
		</div>
	</div>
	<div class="container margin_60">
		{{-- @include('layouts.faq') --}}
	</div>
	<!-- End container -->

</main>
<!-- End main -->
@endsection
@section('js')
@endsection


