@if($products)
	@foreach($products as $product)
		@include('pages.catalog.product.grid')
	@endforeach
@endif

