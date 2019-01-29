<!-- Footer start -->
<section class="my-footer">
	<div class="container">
		<div class="row animatedParent animateOnce">
			<div class="col-sm-4">
				<div class="my-footer-col">
					<div class="my-section-title">
						<h2>recent posts</h2>
						<div class="my-title-line"></div>
						<div class="clearfix"></div>
					</div>
					@foreach($recent_blogs as $index => $blog)
					<div class="my-tweets">
						<i class="fa fa-newspaper-o" aria-hidden="true"></i>
						<p title="{{ $blog->title }}">
							<a style="color: #fff !important;" href="{{ route('frontend.blog.show', [$blog->slug]) }}">{{ Str::limit($blog->title, 75) }}</a>
						</p>
						<a href="#">{{ $blog->updated_at->diffForHumans() }}</a>
					</div>
					@endforeach
				</div>	
			</div>
			<div class="col-sm-4">
				<div class="my-footer-col">
					<div class="my-footer-logo">
						<img src="/frontend/images/logo-footer.png" alt="">
						<p style="text-transform: uppercase;">WaveOne aims to transform the way we farm by building a climate resilient agriculture with its quality products and services.</p>
						<ul class="my-footer-social clearfix">
							@if(isset($contact_settings['facebook']) AND $contact_settings['facebook'])<li><a href="{{ $contact_settings['facebook'] }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>@endif
							@if(isset($contact_settings['twitter']) AND $contact_settings['twitter'])<li><a href="{{ $contact_settings['twitter'] }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>@endif
						</ul>
					</div>
				</div>	
			</div>
			<div class="col-sm-4">
				<div class="my-footer-col clearfix">
					<div class="my-section-title">
						<h2>Latest Products</h2>
						<div class="my-title-line"></div>
						<div class="clearfix"></div>
					</div>
					<div class="my-flickr">
						@foreach($recent_products as $index => $product)
						<div class="my-flickr-img clearfix animated fadeIn delay-{{ ($index + 1) * 250 }}">
							<img class="img-responsive my-img-fluided " src="{{ $product->directory . '/thumbnails/' . $product->filename }}" alt="">
							<div class="my-layer">
								<a href="{{ $product->directory . '/resized/' . $product->filename }}" class="lightbox-image" data-fancybox-group="gallery"><i class="icon icon-Search"></i></a>
							</div>
						</div>
						@endforeach
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="my-copyright">
					<p>Copyright ©2017 <a href="#">BlackcellTechnology</a> All Rights Reserved</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Footer end -->