<!-- Main Header Start -->
<header class="my-main-header">
	<div class="my-header-top-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4">
					<div class="my-header-top-col my-text-center">
						<p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $contact_settings['address'] or "(Blank)" }}</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-4">
					<div class="my-header-top-col my-text-center">
						<p><i class="fa fa-phone" aria-hidden="true"></i> {{ $contact_settings['phone'] or "(Blank)" }}</p>
					</div>
				</div>
				<div class="col-md-2 col-md-offset-4 col-sm-4">
					<div class="my-header-top-col text-right my-text-center">
						<button class="btn btn-default" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in | Register</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="my-logo-bar">
		<div class="container">
			<div class="col-sm-12">
				<div class="my-logo">
					<a href="index.php">
						<img src="/frontend/images/header-logo.png?v=1.1" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Header Styles -->
	<div class="my-header-nav">
		<div class="main-header-nav scrollingto-fixed">
			<div class="container">
			    <nav class="navbar navbar-default bootsnav my-menu-style-one yellow my-nav-shape">
				    <!-- Start Top Search -->
				    <div class="top-search">
				        <div class="container">
				            <div class="input-group">
				                <span class="input-group-addon"><i class="fa fa-search"></i></span>
				                <input type="text" class="form-control" placeholder="Search">
				                <span class="input-group-addon close-search"><i class="my-color-black fa fa-times"></i></span>
				            </div>
				        </div>
				    </div>
				    <!-- End Top Search -->

			        <div class="container my-pad-zero"> 

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			            </div>
			            <!-- End Header Navigation -->
			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-left" data-in="fadeIn">
			                    <li>
			                        <a href="{{ route('frontend.index') }}" class="{{ active_class(if_route('frontend.index')) }}">Home</a>
			                    </li>
			                    <li>
			                        <a href="{{ route('frontend.about') }}" class="{{ active_class(if_route('frontend.about')) }}">About Us</a>
			                    </li>
			                    <li>
			                        
			                    	<a href="{{ route('frontend.solution.index') }}" class="{{ active_class(if_route(['frontend.solution.index', 'frontend.solution.show'])) }}">Solutions</a>
			                    </li>
			                    <li>
			                    	<a href="{{ route('frontend.product.index') }}" class="{{ active_class(if_route(['frontend.product.index', 'frontend.product.show'])) }}">Products</a>
			                    </li>
			                    <!-- <li>
			                        <a href="services.php">Services</a>
			                    </li> -->
			                    <!-- <li>
			                        <a href="sensors.php">sensors</a>
			                    </li> -->
			                    <li>
			                        <a href="{{ route('frontend.blog.index') }}" class="{{ active_class(if_route(['frontend.blog.index', 'frontend.blog.show'])) }}">Blogs</a>
			                    </li>
			                    <li>
			                    	<a href="{{ route('frontend.contact') }}" class="{{ active_class(if_route('frontend.contact')) }}">Contact Us</a>
			                    </li>
			                    <!-- <li>
			                        <a href="support.php">support</a>
			                    </li> -->
			                </ul>
							<!-- <div class="pull-right">
								<a href="#"><span class="icon icon-ShoppingCart my-shopping-icon hidden-sm"></span></a>
							</div> -->
				        	<!-- Start Atribute Navigation -->
					        <div class="attr-nav pull-right">
					            <ul>
					                <li class="search">
					                	{{-- <a href="#"><i class="icon icon-Search my-searce-icon hidden-sm"></i></a> --}}
					                </li>
					            </ul>
					        </div>
					        <!-- End Atribute Navigation -->
			            </div><!-- /.navbar-collapse -->
			        </div>
			    </nav>
			</div>
		</div>
	</div>
</header>
<!-- Main Header end -->