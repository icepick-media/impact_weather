<!-- script start from here -->
<script type="text/javascript" src="/frontend/js/jquery.js"></script>
<script type="text/javascript" src="/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/frontend/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/frontend/js/bootsnav.js"></script>
<script type="text/javascript" src="/frontend/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="/frontend/js/isotope.js"></script>
<script type="text/javascript" src="/frontend/js/stellar.js"></script>
<script type="text/javascript" src="/frontend/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/frontend/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/frontend/js/jquery.googlemap.js"></script>
<script type="text/javascript" src="/frontend/js/css3-animate-it.js"></script>
<script type="text/javascript" src="/frontend/js/jquery.scrollUp.js"></script>
<script type="text/javascript" src="/frontend/js/hero.js"></script>
<script type="text/javascript" src="/frontend/js/wow.min.js"></script>
<!-- Custom script for all pages --> 
<!-- Google Map Javascript Codes -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyABqK-5ngi3F1hrEsk7-mCcBPsjHM5_Gj0"></script>
<script src="/frontend/js/jquery.googlemap.js"></script>

<!-- Custom script for all pages --> 
<script type="text/javascript" src="/frontend/js/script.js"></script>

<!-- Google maps -->
<script type="text/javascript">
    $(window).load(function() {
        $("#map-canvas").googleMap({
            zoom:5, // Initial zoom level (optional)
            coords: [48.870356 ,2.322645], // Map center (optional)
            type: "ROADMAP", // Map type (optional)
            address: "Canal Saint-Martin, Paris, France", // Postale Address
            infoWindow: {
                content: '<p style="text-align:center;"><strong>Canal Saint-Martin,</strong><br> Paris, France</p>'
            }
        });
        // Marker 2
        $("#map-canvas").addMarker({
            coords: [48.870356 ,2.322645]
        });
        // Marker 3
        $("#map-canvas").addMarker({
            coords: [48.865358 ,2.348607]
        });
    });
</script>
<!-- Funfact START -->
<script type="text/javascript">
   $(document).ready(function($) {
        $('.start-count').each(function() {
                var $this   = $(this);
                $this.data('target', parseInt($this.html()));
                $this.data('counted', false);
                $this.html('0');
            });
            
            $(window).bind('scroll', function() {
                var speed = 3000;
                $('.start-count').each(function() {
                    var $this   = $(this);
                    if(!$this.data('counted') && $(window).scrollTop() + $(window).height() >= $this.offset().top) {
                        $this.data('counted', true);
                        $this.animate({dummy: 1}, {
                            duration: speed,
                            step:     function(now) {
                                var $this   = $(this);
                                var val     = Math.round($this.data('target') * now);
                                $this.html(val);
                                if(0 < $this.parent('.value').length) {
                                    $this.parent('.value').css('width', val + '%');
                                }
                            }
                        });
                    }
                });
            }).triggerHandler('scroll');
    });
</script>