@extends('layout.index')

@section('content')
	<div class="container">
		<div class="row my-3">
			<div class="col-12 text-start">
				<a href="{{ route('catalog.index') }}">Вернуться в Каталог</a>
			</div>
		</div>
		<div class="row my-3">
			<div class="col-12 text-center">
				<h2>{{ $category->title }}</h2>
			</div>
		</div>

		@if(($products = $category->products)->count())
			<div class="row row-gap-3 products-wrapper">
				@foreach($products as $product)
					@include('pages.catalog.product.grid')
				@endforeach
			</div>
		@endif
	</div>

@endsection
