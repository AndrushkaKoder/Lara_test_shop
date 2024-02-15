@extends('layout.index')

@section('content')

	<div class="container">
		<div class="row mt-5">
			<div class="col-12 d-flex">
				<div class="col-md-6">
					@if($cover = $product->getCover())
						<img src="{{ $cover }}" alt="{{ $product->title }}">
					@endif
				</div>
				<div class="col-md-6">
					<div class="product-title">
						<h2>{{ $product->title }}</h2>
					</div>
					<div class="product-description">
						{{ $product->description }}
					</div>
					<div class="product-params">
						@if($product->count)
							<span>Остаток: {{ $product->count }}</span>
							<span>Цена: {{ $product->getPrice() }}</span>
							@include('components.cart-button')
						@else
							<span class="text-bg-dark">Товар закончился</span>
						@endif
					</div>
				</div>
			</div>
		</div>
		@if($photos = $product->getPhotos())
			<div class="row mt-5">
				<div class="col-12">
					<h5>Фотографии товара</h5>
				</div>
				<div class="col-12">
					@foreach($photos as $photo)
						<img src="{{ $photo }}" alt="{{ $product->title }}" class="product-photo">
					@endforeach
				</div>
			</div>
		@endif
	</div>

@endsection
