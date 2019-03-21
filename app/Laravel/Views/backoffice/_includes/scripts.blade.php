<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/bower_components/raphael/raphael.min.js"></script>
<script src="/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/bower_components/moment/min/moment.min.js"></script>
<script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>

<script src="/dist/js/main.js"></script>

<script src="/dist/js/pages/dashboard.js"></script>

<script src="/dist/js/demo.js"></script>



<!-- SlimScroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>



<!-- jQuery Knob -->
<script src="/bower_components/jquery-knob/js/jquery.knob.js"></script>
<!-- Sparkline -->
<script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- page script -->

  <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 13, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>

    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCousCXpGocpQN0LuBCSzLCHUsMm2jDbP4&callback=initMap">   </script>

	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- <script src="/backoffice/robust-assets/js/vendors.min.js"></script> -->
<!-- BEGIN PAGE VENDOR JS-->
<!-- <script src="/backoffice/robust-assets/js/plugins/extensions/toastr.min.js" type="text/javascript"></script> -->
@yield('vendor-js')
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<!-- <script src="/backoffice/robust-assets/js/app.min.js"></script> -->
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->

<!-- <script type="text/javascript">
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
</script> -->