@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> Farm Location </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Farm Location</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.station.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.station.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
      </div>
    </div>
  </section>
  
  <div class="content">
    <div class="row">
      <div class="col-lg-12 connectedSortable">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> Farms </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div id="map" style="height: 600px; width: 100%;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('vendor-css')
@stop

@section('page-styles')
@stop

@section('vendor-js')
@stop

@section('page-scripts')
<script>
	// Initialize and add the map
	function initMap() {
		var locations = [
			$stations = {!! str_replace("'", "\'", json_encode($stations)) !!}
    ];
				
		var center = {lat: 16.726095, lng: 120.835003};

		var infowindow =  new google.maps.InfoWindow({});
		var marker, count;
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 13,
			center: center
		});
		for (count = 0; count < locations[0].length; count++) {
			if(locations[0][count].farm_attached){
				var userFarms = locations[0][count].farm_attached;
				for(countMap=0; countMap < userFarms.length; countMap++){
					marker = new google.maps.Marker({
							position: new google.maps.LatLng(userFarms[countMap].farm_display.geo_lat, userFarms[countMap].farm_display.geo_long),
							map: map,
							title: locations[0][count].name
					});	

					google.maps.event.addListener(marker, 'click', (function (marker, count) {
						return function () {
							if(locations[0][count].farm_attached[countMap]){
								infowindow.setContent('<img src="'+locations[0][count].meteogram_image+'"/><br/> <strong>Farmer:</strong> '+locations[0][count].name+'<br/><strong>Farm:</strong> '+locations[0][count].farm_attached[countMap].name);
							} else {
								infowindow.setContent('<img src="'+locations[0][count].meteogram_image+'"/><br/> <strong>Farmer:</strong> '+locations[0][count].name);
							}
							infowindow.open(map, marker);
						}
					})(marker, count));
				}
			}
		}

		// Define the LatLng coordinates for the polygon's path.
		var triangleCoords = [
			{lat: 16.736945001761452, lng: 120.84009651491931},
			{lat: 16.741547846177642, lng: 120.84764961550525},
			{lat: 16.734972320112583, lng: 120.85503105471423},
			{lat: 16.72938294454453, lng: 120.8481645996361},
			{lat: 16.7326708323778, lng: 120.8394098694115},
		];

		// Construct the polygon.
		var bermudaTriangle = new google.maps.Polygon({
			paths: triangleCoords,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 1,
			fillColor: '#FF0000',
			fillOpacity: 0.35
		});
		bermudaTriangle.setMap(map);

		// var drawingManager = new google.maps.drawing.DrawingManager({
    //       drawingMode: google.maps.drawing.OverlayType.MARKER,
    //       drawingControl: true,
    //       drawingControlOptions: {
    //         position: google.maps.ControlPosition.TOP_CENTER,
    //         drawingModes: ['polygon']
    //       },
		// 			polygonOptions: {
		// 				fillColor: '#FF0000',
    //         strokeWeight: 1,
    //         clickable: false,
    //         zIndex: 1
		// 			},
    //       markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
    //     });
		// 	drawingManager.setMap(map);
		// 	google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygon) {
		// 		var paths = polygon.getPath();
		// 		var coordinates = [];
		// 		// Iterate over the vertices.
    //     for (var i =0; i < paths.getLength(); i++) {
    //       var xy = paths.getAt(i);
		// 			var positionMap = {lat: xy.lat(), lng: xy.lng()};
		// 			coordinates.push(positionMap);
    //     }
		// 		console.log(coordinates);
		// 	});


	}
</script>
<!-- <script src="http://maps.google.com/maps/api/js?key={{  env('GOOGLE_MAP_KEY') }}&callback=initMap" type="text/javascript"></script> -->
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCousCXpGocpQN0LuBCSzLCHUsMm2jDbP4&libraries=drawing&callback=initMap">   </script>
@stop