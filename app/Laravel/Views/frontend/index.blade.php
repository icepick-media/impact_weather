@extends('frontend._layouts.main')
@section('content')
<!-- Main Slider Start -->
<section class="my-main-slider">
	<div class="container-fluid">
		<div class="cd-hero">
			<ul class="cd-hero-slider autoplay">
				@foreach($image_slider as $slider)
				<li class="{{ $loop->first ? 'selected' : NULL }}" style="background-image: url({{ $slider->directory . '/resized/' . $slider->filename }}) !important;">
					<div class="cd-full-width my-big-font style2 my-slider-title">
						{!! $slider->content !!}
					</div> <!-- .cd-full-width -->
				</li>
				@endforeach
			</ul> <!-- .cd-hero-slider -->

			<div class="cd-slider-nav">
				<nav>
					<span class="cd-marker item-1"></span>				
					<ul>
						@foreach($image_slider as $index => $slider)
						<li class="{{ $loop->first ? 'selected' : NULL }}"><a class="my-navigation-bg{{ $index }}" href="#0"></a></li>
						@endforeach
					</ul>
				</nav> 
			</div> <!-- .cd-slider-nav -->

		</div>
	</div>
</section>
<!-- Main Slider end -->

{!! $about->content or 'MISSING_ABOUT_WAVEONE_PAGE' !!}

<!-- Service start -->
<section class="my-service-field">
	<img class="my-transpar-bg-left" src="/frontend/images/icon/wagon.png" alt="">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="my-section-title">
					<h2>Our <span>Product</span></h2>
					<div class="my-title-line"></div>
					<div class="clearfix"></div>
					<p>Pessl Instruments has been producing reliable measuring instruments for more than 30 years, hence has credibility.</p>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="co-sm-12">
				<div class="owl-carousel-grid-four"> 
					@foreach($products as $product)
                    <div class="item">
                    	<div class="my-single-item">
                    		<img src="{{ $product->directory . '/resized/' . $product->filename }}" alt="">
                    		<div class="my-arrow"></div>
                    		<img class="my-small-img" src="{{ $product->icon_directory . '/resized/' . $product->icon_filename }}" alt="">
                    		<div class="layer"></div>
                    	</div>
                    </div>
                    @endforeach
                </div>
			</div>
		</div>

	</div>
</section>
<!-- Service end -->

<!-- Blog start -->
<section class="my-blog-filed">
	<img class="my-transpar-bg-left" src="/frontend/images/icon/factory-1.png" alt="">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="my-section-title">
					<h2>latest <span>news</span></h2>
					<div class="my-title-line"></div>
					<div class="clearfix"></div>
					<!-- <p>Nulla eu ipsum vehicula, vehicula metus nec, suscipit elit. Morbi sed libero ac velit aliquam rhoncus vestibulum sed purus. Sed scelerisque rutrum eleifend.</p> -->
				</div>	
			</div>
		</div>
		<div class="row animatedParent animateOnce">
			@foreach($blogs as $index => $blog)
			<div class="col-md-4">
				<div class="my-blog-col animated fadeInUpShort slow delay-250">
					<div class="my-blog-image">
						<img src="{{ $blog->directory . '/resized/' . $blog->filename }}" alt="">
					</div>
					<div class="my-blog-heading">
						<h2>{{ $blog->created_at->format("d") }} / <span>{{ $blog->created_at->format("F") }}</span></h2>
						<h3><a href="{{ route('frontend.blog.show', [$blog->slug]) }}">{{ $blog->title }}</a></h3>
					</div>
					<p>{!! str_replace("\r\n", "<br>", $blog->excerpt) !!} <a href="#">[.....]</a></p>
				</div>	
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Blog end -->

{!! $download->content or 'MISSING_DOWNLOAD_PAGE' !!}

<!-- Client start -->
<section class="my-client-field my-client-field-two">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="my-section-title my-section-title-right my-section-title-center text-center">
					<h2>Our Trusted <span> Partners</span></h2>
					<div class="my-title-line"></div>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="row animatedParent animateOnce">
        	<div class="row animatedParent animateOnce">
        		@foreach($partners as $index => $partner)
	        	<div class="col-md-4 col-sm-4 col-xs-6 {{ $loop->first ? 'col-sm-offset-2' : NULL }}">
	        		<div class="my-client-col animated fadeIn delay-250">
	        			<a target="_blank" href="{{ $partner->url }}"><img src="{{ $partner->directory . '/resized/' . $partner->filename }}" alt="" class="img-responsive"></a>
	        		</div>
	        	</div>
	        	@endforeach
	        </div>
        </div>
	</div>
</section>
<!-- Client end -->

@endsection
@section('page-styles')
<style>
	.my-big-font.style2 span {
	    color: #fff;
	    font-size: 25px;
	}

	@foreach($image_slider as $index => $slider)
	.my-navigation-bg{{ $index }} {
	    background-image: url({{ $slider->directory . '/thumbnails/' . $slider->filename  }}?v=1.1);
	    background-size: cover;
	    background-position: center center;
	    border: 6px solid #f26521;
	}
	@endforeach

</style>
@endsection
