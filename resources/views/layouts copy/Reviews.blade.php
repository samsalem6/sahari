<div class="main_title" id="title">
	<h2>Avaliações</h2>
</div>
<div class="container">
	<div class="row">
		<div class="row col-lg-8">
			@if (count($Reviewss)>0)
				@foreach ($Reviewss as $Review)
					<div class="col-lg-6">
						<div class="review_strip">
							@if( ($Review->image))
							<img src="/images/reviews/{{ $Review->image }}" width="76px" height="76px" alt="{{ $Review->name }}" class="rounded-circle"">
							@else
								<img src="/images/reviews/default.jpg" width="76px" height="76px" alt="Image" class="rounded-circle" />
							@endif
							<h4>{{ $Review->name}}</h4>
							<p>{{ $Review->description}}</p>
							<div class="rating">
								<i class="icon-star {{ $Review->stars >= 1 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $Review->stars >= 2 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $Review->stars >= 3 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $Review->stars >= 4 ? ' voted' : '' }}"></i>
								<i class="icon-star {{ $Review->stars >= 5 ? ' voted' : '' }}"></i>
							</div>
						</div>
						<!-- End review strip -->
					</div>
				@endforeach
			@endif
		</div>
		<div class="col-lg-2">
            <div id="TA_selfserveprop122" class="TA_selfserveprop"><ul id="UpPOFmMlbA6" class="TA_links zOyohBci26"><li id="WYpcepi" class="9JxQ4MZKCpy"><a target="_blank" href="https://www.tripadvisor.com.br/"><img src="https://www.tripadvisor.com.br/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=122&amp;locationId=1547186&amp;lang=pt&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=false&amp;iswide=false&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>

	</div>
	</div>
</div>
<hr>
