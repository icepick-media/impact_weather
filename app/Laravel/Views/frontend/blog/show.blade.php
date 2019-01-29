@extends('frontend._layouts.main')
@section('content')

<!-- Inner page heading start -->
<section class="my-inner-heading-field my-inner-heading-three  my-layer-black">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="my-inner-heading-col">
					<h2>Blogs</h2>
					<p>
						<a href="{{ route('frontend.index') }}">Home</a> 
						<span>/</span> 
						<a href="{{ route('frontend.blog.index') }}">Blogs</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Inner page heading end -->

<!-- Blog start -->
<section class="my-blog-filed my-blog-single">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="my-blog-col">
					<img src="{{ $blog->directory .'/resized/' . $blog->filename }}" alt="">
					<div class="my-blog-heading">
						<h2>{{ $blog->created_at->format("d") }} / <span>{{ $blog->created_at->format("F, Y") }}</span></h2>
						<h3>{{ $blog->title }}</h3>
					</div>
					{!! $blog->content !!}
					<div style="padding: 20px;"></div>
					<div id="disqus_thread"></div>
					<script>

					var disqus_config = function () {
						this.page.url = "{{ route('frontend.blog.show', [$blog->slug]) }}";  // Replace PAGE_URL with your page's canonical URL variable
						this.page.identifier = "{{ $blog->slug }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					};

					(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = 'https://waveone.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
					})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				</div>
			</div>
			<div class="col-md-4">
				<div class="my-blog-col">
					<div class="my-search-box">
                        <div class="search-form">
		                    <form method="post" action="{{ route('frontend.blog.search') }}">
			                    <div class="input-group">
                    				{{ csrf_field() }}
									<input placeholder="SEARCH..." class="form-control" name="keyword" type="text">
									<span class="input-group-btn">
									<button type="submit" class="btn"><i class="fa fa-search"></i></button>
									</span>
			                    </div>
		                    </form>
		                </div>
                    </div>
                    <div class="my-post">
                    	<h3 class="my-sidebar-title">Related <span>Blog</span></h3>
                    	@foreach($related_blogs as $index => $blog)
                    	<div class="my-post-item">
                    		<a href="{{ route('frontend.blog.show', [$blog->slug]) }}">
                    			<img src="{{ $blog->directory . '/thumbnails/' . $blog->filename }}" alt="">
	                    		<h4 title="{{ $blog->title }}">{{ Str::limit($blog->title, 70) }}</h4>
	                    		<span>{{ $blog->created_at->format("F d Y") }}</span>
                    		</a>
                    	</div>
                    	@endforeach
                    </div>
                    {{-- <div class="my-categories">
                    	<h3 class="my-sidebar-title">Categories</h3>
                    	<ul>
                    		<li><i class="fa fa-check" aria-hidden="true"></i><a href="#">Online courses</a></li>
                    		<li><i class="fa fa-check" aria-hidden="true"></i><a href="#">Kindergarden</a></li>
                    		<li><i class="fa fa-check" aria-hidden="true"></i><a href="#">University Board</a></li>
                    		<li><i class="fa fa-check" aria-hidden="true"></i><a href="#">Events Log</a></li>
                    		<li><i class="fa fa-check" aria-hidden="true"></i><a href="#">Exam Patterns</a></li>
                    	</ul>
                    </div>
                    <div class="my-resousce">
                    	<h3 class="my-sidebar-title">Resource</h3>
						<div class="my-video-layer my-layer-yellow">
							<img src="images/blog/16.jpg" alt="">
							<a class="popup-youtube" href="https://www.youtube.com/watch?v=KmCQSVFqOYg">
								<i class="icofont icofont-play-alt-1"></i>
							</a>
						</div>
                    </div>
                    <div class="my-tags clearfix">
                    	<h3 class="my-sidebar-title">Tags</h3>
                    	<ul>
                    		<li><a href="#">Education</a></li>
                    		<li><a href="#">Crisis</a></li>
                    		<li><a href="#">Water</a></li>
                    		<li><a href="#">Small Business</a></li>
                    		<li><a href="#">Giving</a></li>
                    		<li><a href="#">Children</a></li>
                    	</ul>
                    </div>  --}}
				</div>	
			</div>
		</div>
	</div>
</section>
<!-- Blog end -->
@endsection
@section('page-styles')
<style type="text/css">
	.my-post .my-post-item img { width: 70px; height: 70px; }
	.my-post .my-post-item h4 { padding-top: 0; }
	.my-blog-filed .my-blog-col .my-blog-heading h3 { min-height: 55px; }
</style>
@endsection
@section('page-scripts')
<script id="dsq-count-scr" src="//waveone.disqus.com/count.js" async></script>
@endsection
