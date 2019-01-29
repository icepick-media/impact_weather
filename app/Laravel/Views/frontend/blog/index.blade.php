@extends('frontend._layouts.main')
@section('content')

<!-- Inner page heading start -->
<section class="my-inner-heading-field my-inner-heading-three  my-layer-black">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="my-inner-heading-col">
					<h2>Blogs</h2>
					<p><a href="{{ route('frontend.index') }}">Home</a> <span>/</span> <a href="#">Blogs</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Inner page heading end -->

<!-- Blog start -->
<section class="my-blog-filed">
	@if(isset($keyword) AND $keyword)
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="my-blog-col">
					<div class="my-post">
					<h3 class="my-sidebar-title">Search results for <span>"{{ $keyword }}"</span></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if($blogs->count() == 0)
	<div class="container text-center">
		<div class="row" style="height: 200px;">
			<div class="col-md-12">
				<h3 class="text-muted">No posts to show.</h3><br>
				<a href="{{ route('frontend.index') }}" class="btn btn-lg btn-default my-btn-black">Back to homepage</a>
			</div>
		</div>
	</div>
	@endif
	@endif
	<div class="container">
		<div class="row animatedParent animateOnce">
			@foreach($blogs as $index => $blog)
			<div class="col-md-4">
				<div class="my-blog-col animated fadeInUpShort slow delay-250">
					<div class="my-blog-image">
						<a href="{{ route('frontend.blog.show', [$blog->slug]) }}">
							<img src="{{ $blog->directory . '/resized/' . $blog->filename }}" alt="">
						</a>
					</div>
					<div class="my-blog-heading">
						<h2>{{ $blog->created_at->format("d") }} / <span>{{ $blog->created_at->format("F, Y") }}</span></h2>
						<h3><a href="{{ route('frontend.blog.show', [$blog->slug]) }}" title="{{ $blog->title }}">{{ Str::limit($blog->title, 60) }}</a></h3>
					</div>
					<p>{!! str_replace("\r\n", "<br>", $blog->excerpt) !!} <a href="{{ route('frontend.blog.show', [$blog->slug]) }}">[.....]</a></p>
					{{-- <div class="my-blog-bottom clearfix">
						<ul>
							<li><i class="icon icon-Pencil"></i> <a href="#">jon william</a></li>
							<li>|</li>
							<li><i class="icon icon-MessageRight"></i><a href="#">5 Comments</a></li>
						</ul>
					</div> --}}
				</div>	
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Blog end -->

@endsection
@section('page-styles')
<style type="text/css">
	.my-blog-filed .my-blog-col .my-blog-heading h3 {
	    min-height: 100px;
	}
</style>
@endsection
