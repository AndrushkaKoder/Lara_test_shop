<div class="col-xl-3 col-md-6 col-sm-12">
	<div class="card shadow-sm">
		<div class="card-body">
			<div class="card-image">
				@if($cover = $product->getCover())
					<img src="{{ $cover }}" alt="{{ $product->title }}">
				@endif
			</div>
			<p>{{ $product->getCategories() }}</p>
			<h5>{{ $product->title }}</h5>
			@if($product->description)
				<div class="card-description">
					<p class="card-text">
						{{ $product->description }}
					</p>
					<button data-close class="card-description-hide btn btn-success">Скрыть</button>
				</div>
			@endif
			<div class="d-flex justify-content-between align-items-center">
				<div class="btn-group">
					<button data-open type="button" class="btn btn-sm btn-outline-secondary">Описание</button>
					<button type="button" class="btn btn-sm btn-outline-secondary">В корзину</button>
				</div>
				@if($product->price)
					<p class="text-body-secondary">{{ $product->getPrice() }}</p>
				@endif
			</div>
		</div>
	</div>
</div>
