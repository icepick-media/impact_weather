<!-- BEGIN VENDOR JS-->
<script src="/backoffice/robust-assets/js/vendors.min.js"></script>
<!-- BEGIN PAGE VENDOR JS-->
<script src="/backoffice/robust-assets/js/plugins/extensions/toastr.min.js" type="text/javascript"></script>
@yield('vendor-js')
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="/backoffice/robust-assets/js/app.min.js"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->

<script type="text/javascript">
	$(function(){

		var li, a, href;
		var current_uri = '{{ Request::url() }}';
		
		$('.navigation-main').find('li').each(function() {

			li = $(this);

			a = li.children('a').first();

			if(!!a) {
				href = a.attr('href');

				if(!!href && href == current_uri ) {
					li.addClass('active');
				}

				if(!!href && li.hasClass('has-sub') && ~current_uri.indexOf(li.data('group')) ) {
					li.addClass('active open');
				}

			}
			
		});
	});
</script>