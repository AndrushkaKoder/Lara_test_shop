@extends('layout.index')

@section('content')

	@include('pages.home.banner')

	<div class="album py-5 bg-body-tertiary">
		<div class="container">
			<div class="products-wrapper">
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
					<x-catalog-component></x-catalog-component>
				</div>
			</div>
		</div>
	</div>
@endsection



