<div class="main_title" id="title">
	<h2>Opiniones de Nuestros Usuarios</h2>
</div>
<div class="container">
	<div class="row">
		<div class="row col-lg-12">
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
</div>
</div>
<hr>