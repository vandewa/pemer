@extends('layouts/app')
@section('content')
<!--start content-->
<main class="page-content">
	<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
		<div class="col">
			<div class="card rounded-4">
			  	<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="">
							<p class="mb-1">Total Tiket</p>
							{{-- <h4 class="mb-0">{{ $data['total'] }}</h4> --}}
						</div>
						<div class="text-white ms-auto widget-icon bg-primary">
							<i class="fadeIn animated bx bx-book-bookmark"></i>
						</div>
					</div>
			  	</div>
			</div>
		</div>
		{{-- @foreach ($data['tiket'] as $index => $item )
		<div class="col">
			<div class="card rounded-4">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="">
							<p class="mb-1">{{ $item->nama }}</p>
							<h4 class="mb-0">{{ $item->jumlah }}</h4>
					
						</div>
						<div class="ms-auto widget-icon bg-{{ $data['bg'][$index] }} text-white">
							<i class="fadeIn animated bx {{ $data['icon'][$index] }}"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach --}}
	</div>
</main>
<!--end page main-->
@endsection