@if(session()->has('notification-status'))
<script type="text/javascript">
	$(function(){

		setTimeout(function() {
			@if(session()->get('notification-status') == "success")
			toastr.success("{!! session()->get('notification-msg') !!}", "Success!", {
	            positionClass: "toast-top-right",
	            containerId: "toast-top-right",
	        });
			@elseif(session()->get('notification-status') == "error" OR session()->get('notification-status') == "danger")
			toastr.error("{!! session()->get('notification-msg') !!}", "Error!", {
	            positionClass: "toast-top-right",
	            containerId: "toast-top-right",
	        });
			@elseif(session()->get('notification-status') == "info")
			toastr.info("{!! session()->get('notification-msg') !!}", "Information!", {
	            positionClass: "toast-top-right",
	            containerId: "toast-top-right",
	        });
			@elseif(session()->get('notification-status') == "warning")
			toastr.warning("{!! session()->get('notification-msg') !!}", "Warning!", {
	            positionClass: "toast-top-right",
	            containerId: "toast-top-right",
	        });
			@endif
		}, 2000);
		
	});
</script>

<?php
	session()->forget('notification-status');
	session()->forget('notification-msg');
?>


@endif

