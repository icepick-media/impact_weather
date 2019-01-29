@extends('frontend._layouts.main')
@section('content')

<!-- Inner page heading start -->
<section class="my-inner-heading-field my-inner-heading-three  my-layer-black">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="my-inner-heading-col">
					<h2>Solutions</h2>
					<p><a href="{{ route('frontend.index') }}">Home</a> <span>/</span> <a href="#">Solutions</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Inner page heading end -->

<section class="my-blog-filed">
	<div class="container text-center">
		<div class="row" style="height: 200px;">
			<div class="col-md-12">
				<h2 class="text-muted">This page is under construction.</h3><br>
				<a href="{{ route('frontend.index') }}" class="btn btn-lg btn-default my-btn-black">Back to homepage</a>
			</div>
		</div>
	</div>
</h2>
@endsection

@section('page-styles')
@endsection
