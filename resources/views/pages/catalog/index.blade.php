@extends('layout.index')

@section('content')
	<div class="album py-5 bg-body-tertiary">
		<div class="container">
			@if($categories)
				<div class="row">
					<div class="col-12">
						<ul>
							@foreach($categories as $category)
								<li>
									<a href="{{ $category->url() }}">
										{{ $category->title }}
									</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			@else
				<div class="row">
					<div class="col-12 text-center">
						<h2>Категорий пока что нет =(</h2>
					</div>
				</div>
			@endif

		</div>
	</div>
@endsection
