@extends('layout.index')

@section('content')
	<div class="container">
		<div class="row mt-5">
			@if($products->count())
				<div class="col-12 d-flex justify-content-end">
					<a href="{{ route('cart.clear') }}" class="btn btn-danger clear-cart-button">Очистить корзину</a>
				</div>
				<div class="col-12">
					<div class="cart-products-wrapper">
						@foreach($products as $product)
							<div class="cart-item d-flex justify-content-between align-items-center">
								<div class="cart-image">
									@if($cover = $product->getCover())
										<img src="{{ $cover }}" alt="{{ $product->title }}">
									@endif
								</div>
								<div class="cart-title">
									<a href="{{ $product->getPath() }}"><span>{{ $product->title }}</span></a>
								</div>
								<div class="cart-price">
									<span>{{ $product->getPrice() }}</span>
								</div>
							</div>
							<hr>
						@endforeach
					</div>
				</div>
			@else
				<div class="col-12 text-center">
					<h2>Ваша корзина пуста =(</h2>
				</div>
			@endif
		</div>
	</div>
@endsection
