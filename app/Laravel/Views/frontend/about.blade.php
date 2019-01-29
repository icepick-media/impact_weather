@extends('frontend._layouts.main')
@section('content')

<section class="my-inner-heading-field my-inner-heading-two  my-layer-black">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="my-inner-heading-col">
					<h2>About Us</h2>
					<p><a href="{{ route('frontend.index') }}">Home</a> <span>/</span> <a href="#">About</a></p>
				</div>
			</div>
		</div>
	</div>
</section>

{!! $welcome->content or 'MISSING_WELCOME_PAGE' !!}

{!! $devices->content or 'MISSING_DEVICES_PAGE' !!}

{!! $challenges->content or 'MISSING_CHALLENGES_PAGE' !!}

<!-- Team start -->
<section class="my-team-field">
	<img class="my-transpar-bg-right" src="/frontend/images/icon/welder.png" alt="">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-6 col-sm-12">
				<div class="my-section-title my-section-title-right text-right">
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
	.knockout-top-to-bottom {
	  position: relative; 
	}
	.knockout-top-to-bottom:before, .knockout-top-to-bottom:after {
	  content: "";
	  position: absolute;
	}
	.knockout-top-to-bottom:before {
	    top: -3px;
	    left: -3px;
	    bottom: 0;
	    right: -3px;
	    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#5b45cf), to(transparent));
	    background-image: -webkit-linear-gradient(#4a30d0, transparent);
	    background-image: -moz-linear-gradient(#000, transparent);
	    background-image: -o-linear-gradient(#000, transparent);
	    z-index: -2;
	}
	.knockout-top-to-bottom:after {
	    z-index: -1;
	    top: 0;
	    left: 0;
	    bottom: 0;
	    right: 0;
	    background: rgba(242, 109, 45, 0.38);
	}
	.my-img-hover {
    	position: relative;
	    text-align: center;
	    background: #fff;
	}
</style>
@endsection
