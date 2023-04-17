<div class="container">
	<div class="row">
		<div class="col-sm-5 mb-2">
			<img src="../../front/img/t11.jpg" alt="" height="100%" width="100%" style="border-radius: 5px;">
		</div>
		<div class="col-lg-7" id="faq">

			<div id="payment" class="accordion_styled">
				<h5 class="nomargin_top title">Preguntas Frecuentes</h5>
				  @foreach ($faqsss as $faqs)
					<div class="card">
					<div class="card-header">
						<h5>
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapse_{{ $faqs->id }}">{{ $faqs->title }}<i class="indicator {{ $loop->first ?'icon-down-open':'icon-down-open' }} float-right"></i></a>
						</h5>
					</div>
					<div id="collapse_{{ $faqs->id }}" class="collapse" data-parent="#payment">
						<div class="card-body">
							{!! $faqs->body !!}
						</div>
					</div>
					</div>
				@endforeach
			</div>
			<br>
			<p class="text-left nopadding">
				<a href="/preguntas-frecuentes" class="btn-main">View All</a>
			</p>
		
		</div>
		
	</div>
</div>
