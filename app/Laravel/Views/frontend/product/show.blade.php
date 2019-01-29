@extends('frontend._layouts.main')
@section('content')

<!-- Inner page heading start -->
<section class="my-inner-heading-field my-inner-heading-three  my-layer-black">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="my-inner-heading-col">
					<h2>{{ $product->title }}</h2>
					<p>
						<a href="{{ route('frontend.index') }}">Home</a> 
						<span>/</span> 
						<a href="{{ route('frontend.product.index') }}">Products</a>
						<span>/</span> 
						<a href="#">{{ $product->title }}</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Inner page heading end -->

<!-- Team details start -->
<section class="my-team-details">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="my-team-details-col">
					<img src="{{ $product->directory . '/resized/' . $product->filename }}" alt="">
					<!--Progress bar start-->
					<div class="col-sm-12" style="padding: 20px 0">
						<h3>Measures</h3>
						<ul class="my-reviews">
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>Temperature</li>
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>RH</li>
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>Wind Speed</li>
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>Direction</li>
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>Precipitation</li>
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>Leaf Wetness</li>
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>DewPoint</li>
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>Sunshine hours</li>
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>Cloud Cover</li>
							<li><i class="fa fa-sun-o" aria-hidden="true"></i>Evapotranspiration</li>
						</ul>
					</div>
				</div>
				<div>
				<h3>Live data feed</h3>
        		<a href="https://ng.fieldclimate.com/dashboard" target="_blank">
        			<img src="/frontend/images/about/climate.jpg" alt="">
        		</a>
      </div>	
			</div>
			<div class="col-md-8">
				<div class="my-team-details-col">
					<div class="my-ditails-content">
						{!! $product->content !!}
						<div style="padding: 50px 0;">
							<h3>Installed Device</h3>
							<div class="my-map" id="map-canvas" style="height: 520px;"></div>
						</div>
						
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>
<!-- Team details end -->

<!-- Team start -->
<section class="my-team-field my-team-two">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="my-section-title">
					<h2>our great<span> expert</span></h2>
					<div class="my-title-line"></div>
					<div class="clearfix"></div>
					<p>Meet the PESSL team.</p>
				</div>	
			</div>
		</div>
		<div class="row animatedParent animateOnce">
			@foreach($experts as $index => $member)
			<div class="col-md-3 col-sm-6">
				<div class="my-team-col animated fadeInUpShort slow delay-250">
					<div class="my-team-box">
						<img class="img-responsive" src="{{ $member->directory . '/resized/' . $member->filename }}" alt="">
						<div class="my-layer">
							<ul class="my-team-social">
								<li><a href="{{ $member->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="{{ $member->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="{{ $member->linked_in }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="my-team-content">
						<h4>{{ $member->name }}</h4>
						<p>- {{ $member->position }} -</p>
					</div>
				</div>	
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Team end -->

@endsection

@section('page-styles')
@endsection
