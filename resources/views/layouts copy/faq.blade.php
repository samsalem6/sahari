<div class="col-lg-12" id="faq">

	<div id="payment" class="accordion_styled">
		<h3 class="nomargin_top">FAQ</h3>
	  	@foreach ($faqsss as $faqs)
			<div class="card">
			<div class="card-header">
				<h4>
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapse_{{ $faqs->id }}">{{ $faqs->title }}<i class="indicator {{ $loop->first ?'icon-right-open':'icon-down-open' }}  float-right"></i></a>
				</h4>
			</div>
			<div id="collapse_{{ $faqs->id }}" class="collapse {{ $loop->first ?'show':'' }}" data-parent="#payment">
				<div class="card-body">
					{!! $faqs->body !!}
				</div>
			</div>
			</div>
		@endforeach
	</div>
	<br>
	<p class="text-center nopadding">
		<a href="/faqs" style="background: #37a5db;color:#fff" class="btn_1 medium"><i class="icon-eye-7"></i>Ver mais</a>
	</p>

</div>
