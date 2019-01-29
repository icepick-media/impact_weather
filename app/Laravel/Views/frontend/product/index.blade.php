@extends('frontend._layouts.main')
@section('content')

<!-- Inner page heading start -->
<section class="my-inner-heading-field my-inner-heading-three  my-layer-black">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="my-inner-heading-col">
					<h2>Products</h2>
					<p><a href="{{ route('frontend.index') }}">Home</a> <span>/</span> <a href="#">Products</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Inner page heading end -->

<!-- Project title start -->
<section class="my-project-title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Masonry Filter -->
                <ul class="list-inline masonry-filter text-center">
                    <li><a href="#" class="active" data-filter="*"><span>View All</span></a></li>
                    @foreach($tags as $index => $tag)
                    <li><a href="#{{ $tag }}" data-filter=".{{ str_replace(" ", "-", $tag) }}" class=""><span>{{ Str::title($tag) }}</span></a></li>
                    @endforeach
                </ul>
                <!-- End Masonry Filter -->
                <!-- Masonry Grid -->
                <div id="grid" class="masonry-gallery grid-three-item my-gutter clearfix" style="position: relative; height: 864px;">
                	@foreach($products as $index => $product)
                	<!-- Masonry Item -->
		        	<div class="isotope-item {{ str_replace(",", " ", str_replace(" ", "-", $product->tags)) }}">
		                <div class="my-title-item">
		                	<a href="{{ route('frontend.product.show', [$product->slug]) }}">
		                		<img src="{{ $product->directory .'/resized/' . $product->filename }}" alt="">
								<p>{{ $product->title }}</p>
		                	</a>
		                </div>
		            </div>
		            @endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Project title end -->
@endsection

@section('page-styles')
@endsection
