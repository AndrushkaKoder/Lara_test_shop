@php
	/**
	 * @var \App\Models\Product $product
	 */
		$inCart = ($sessionProducts = session()->get('product')) && in_array($product->id, $sessionProducts)
@endphp
<button
	data-id="{{ $product->id }}"
	type="button"
	class="btn btn-sm btn-outline-secondary @if($inCart) status-in-cart @endif"
>
	@if($inCart)
		В корзине
	@else
		В корзину
	@endif
</button>
