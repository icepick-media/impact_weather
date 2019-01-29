@if(session()->has('notification-status'))

	@if(session()->get('notification-status') == "alert")
	<div class="alert bg-primary alert-icon-left alert-dismissible fade in mb-2" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! session()->get('notification-msg') !!}
	</div>
	@endif

	@if(session()->get('notification-status') == "success")
	<div class="alert bg-success alert-icon-left alert-dismissible fade in mb-2" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! session()->get('notification-msg') !!}
	</div>
	@endif


	@if(session()->get('notification-status') == "error" OR session()->get('notification-status') == "danger")
	<div class="alert bg-danger alert-icon-left alert-dismissible fade in mb-2" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! session()->get('notification-msg') !!}
	</div>
	@endif

@endif