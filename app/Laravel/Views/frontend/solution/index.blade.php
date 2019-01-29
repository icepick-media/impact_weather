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

{!! $profits->content or 'MISSING_PROFIT_PAGE' !!}

<section class="container">
	@foreach($solutions as $index => $solution)
	<div class="col-md-6 col-sm-6 min-height-300" style="padding: 25px 0;">
		<div class="my-about-col" style="margin: 25px 0;">
			<div class="col-sm-12">
				<div class="col-xs-6 pull-left">
					<div class="animated flipInY slow delay-250">
						<img src="{{ $solution->directory . '/resized/' . $solution->filename }}" alt="">
					</div>
				</div>
				<div class="col-xs-6">
					<h4>{{ $solution->title }}</h4>
					<p class="min-height-80">{{ str_replace("\r\n", "<br>", $solution->excerpt) }} </p>
					<div class="text-center">
					<a class="btn btn-default my-btn-black" href="{{ route('frontend.solution.show', [$solution->slug]) }}" style="margin-top: 25px; text-align: center;">view more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</section>

{!! $success_stories->content or 'MISSING_SUCCESS_STORIES_PAGE' !!}

@endsection

@section('page-styles')
<style>
	.my-features-field {
	    padding: 0px 0px 50px;
	}
	.my-layer-yellow:before {
	    background-color: transparent;
	}
	.min-height-300 {
		min-height: 300px;
	}
	.sstable {
		border:1px solid #000;
		background-color: #fff;
		width: 100%;
		margin: 10px 0;
	}
	.sstable td, .sstable th {
		padding: 10px;
	}
	.sstable td {
		text-align:left;
	}
	table, th, td {
	    border: 1px solid black;
	}
	tr:nth-child(even) {
		background-color: rgba(74, 48, 208, 0.76);
		color: #fff
	}
</style>
@endsection
