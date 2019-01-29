@extends('frontend._layouts.main')
@section('content')

<section class="my-inner-heading-field my-inner-heading-two  my-layer-black">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="my-inner-heading-col">
					<h2>Contact Us</h2>
					<p><a href="{{ route('frontend.index') }}">Home</a> <span>/</span> <a href="#">Contact</a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Contact start -->
<section class="my-contact-field">
	<div class="container">
		{!! $contact->content or 'MISSING_CONTACT_PAGE' !!}
		<div class="my-main-contact-from">
			<div class="row">
				<div class="col-md-12">
					<h5>send your message :</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="my-contact-col">
						@if(Session::has('notification-status'))
							@if(Session::get('notification-status') == "success")
							<div class="alert alert-success">
								{!! Session::get('notification-msg') !!}
							</div>
							@endif
						@endif
						<form id="contact_form" name="contact_form" class="contact-form" action="" method="post" novalidate="novalidate">
							{{ csrf_field() }}
	                        <div class="messages"></div>
	                        <div class="row">
	                            <div class="col-md-3">
	                                <div class="form-group {{ $errors->has('name') ? 'has-error' : NULL }}">
	                                    <input id="form_name" name="name" value="{{ old('name') }}" class="form-control my-form-control" placeholder="enter a name" required="required" data-error="Name is required." type="text">
	                                    @if($errors->has('name')) <div class="help-block with-errors">{{ $errors->first('name') }}</div> @endif
	                                </div>
	                            </div>
	                            <div class="col-md-3">
	                                <div class="form-group {{ $errors->has('email') ? 'has-error' : NULL }}">
	                                    <input type="email" style="text-transform: none; " id="form_email" name="email" value="{{ old('email') }}" class="form-control my-form-control required email" placeholder="Enter an email" required="required" data-error="Email is required." type="email">
	                                    @if($errors->has('email')) <div class="help-block with-errors">{{ $errors->first('email') }}</div> @endif
	                                </div>
	                            </div>
	                            <div class="col-md-3">
	                                <div class="form-group {{ $errors->has('contact') ? 'has-error' : NULL }}">
	                                    <input id="form_phone" name="contact" value="{{ old('contact') }}" class="form-control my-form-control required" placeholder="Phone" required="required" data-error="Phone Number is required." type="text">
	                                    @if($errors->has('contact')) <div class="help-block with-errors">{{ $errors->first('contact') }}</div> @endif
	                                </div>
	                            </div>
	                            <div class="col-md-3">
	                                <div class="form-group {{ $errors->has('subject') ? 'has-error' : NULL }}">
	                                	{!! Form::select('subject', $subjects, old('subject'), ['id' => "form_subject", 'class' => "form-control my-form-control required", 'data-error' => "Subject is required."]) !!}
	                                    @if($errors->has('subject')) <div class="help-block with-errors">{{ $errors->first('subject') }}</div> @endif
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group {{ $errors->has('message') ? 'has-error' : NULL }}">
	                            <textarea id="form_message" name="message" class="form-control required" rows="8" placeholder="Message" required="required" data-error="Message is required.">{{ old('message') }}</textarea>
	                            @if($errors->has('message')) <div class="help-block with-errors">{{ $errors->first('message') }}</div> @endif
	                        </div>
	                        <div class="form-group text-right">
	                            <input id="form_botcheck" name="form_botcheck" class="form-control my-form-control" value="" type="hidden">
	                            <button type="submit" class="btn btn-lg btn-block my-btn-yellow" data-loading-text="Getting Few Sec...">Send Message</button>
	                        </div>
	                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact end -->

<!-- Google map start -->
<div class="container-fluid">
    <div class="row">
        <div class="my-map" id="map-canvas" style="height: 520px;"></div>
    </div>
</div>

@endsection
@section('page-styles')
<style>
	.my-main-contact-from .my-form-control {
	    margin-bottom: 0;
	}
	.has-error .form-control {
	    border-color: #a94442 !important;
	}
</style>
@endsection
