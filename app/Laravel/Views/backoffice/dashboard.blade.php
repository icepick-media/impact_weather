@extends('backoffice._layouts.app')
@section('content')
<div class="content-wrapper">

		<section class="content-header">
      <h1> Dashboard </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="/"> Home</a></li>
        <li>Dashboard</li>
      </ol>

      <div class="active-box">
        <div class="status">
          <h4>{{$stations->count()}}</h4>
          <h5>Active Stations</h5>
        </div>
        <div class="icon">
          <i class="fa fa-wifi"> </i>
        </div>
      </div>
    </section>

		<div class="content">
			<div class="row">
				<section class="col-lg-8">
					<div class="box">
						<div class="box-body">
						<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button> -->
							<div id="map"></div>
						</div>
						
					</div>

					<div class="row">
          <div class="col-md-12">
              <div class="box paddyGrowth">
                <ul class="paddylist">
                  <li>
                    <p>Transplantation 
                      stage
                    </p>
                    <img src="dist/img/01.jpg" alt="">
                  </li>
                  <li>
                    <p>
						Tillering stage
                    </p>
                    <img src="dist/img/02.jpg" alt="">
                  </li>
                  <li>
                    <p> 
						Stem elongation
                    </p>
                    <img src="dist/img/03.jpg" alt="">
                  </li>
                  <li>
                    <p>
						Panicle initiation
                    </p>
                    <img src="dist/img/04.jpg" alt="">
                  </li>
                  <li>
                    <p> Booting/heading stage
                    </p>
                    <img src="dist/img/05.jpg" alt="">
                  </li>
                  <li>
                    <p>
						Flowering stage
                    </p>
                    <img src="dist/img/06.jpg" alt="">
                  </li>
                  <li>
                    <p> 
						Milk stage
                    </p>
                    <img src="dist/img/07.jpg" alt="">
                  </li>
                  <li>
                    <p>
						Dough stage
                    </p>
                    <img src="dist/img/08.jpg" alt="">
                  </li>
                  <li>
                    <p>
						Mature stage
                    </p>
                    <img src="dist/img/09.jpg" alt="">
                  </li>
                </ul>

                <ul id="progress">
                  <li> Vegetative phase </li>
                  <li> Reproductive phase</li>
                  <li> Ripening Phase </li>
                </ul>
              </div>
          </div>
        </div>
		
					<div class="row">
						<div class="col-md-12">
							<div class="box box-solid">
								<div class="box-header with-border">
									<h3 class="box-title"> Today's Activity Report ({{Carbon::now()->format("M d Y")}}) </h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-ellipsis-h"></i>
										</button>
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body table-responsive">
									<table class="table table-bordered">
										<tr>
												<th>User</th>
												<th>Farm</th>
												<th>Station ID</th>
												<th>Activity</th>
										</tr>
										<tbody>
											@if(!$journal->isEmpty())
												@foreach($journal as $index => $activity)
												<tr>
													<td>
														@if($activity->farm)
														<a href="{{route('backoffice.user.edit',[$activity->farm->user_id])}}">{{$activity->farm?($activity->farm->owner?$activity->farm->owner->name:"n/a"):"n/a"}}</a>
														@else
														n/a
														@endif
													</td>
													<td>
														<div><small>{{Str::upper(($activity->farm?$activity->farm->name:"n/a") .": ".($activity->farm?$activity->farm->crop_display:"n/a"))}}</small></div>
														@if($activity->farm)
														<div><small><a href="{{route('backoffice.user.farm',[$activity->farm->user_id,$activity->farm->id])}}">[View Farm Profile]</a></small></div>
														@endif
													</td>
													<td>
														@if($activity->farm)
														<a target="_blank" href="{{route('backoffice.station.edit',[$activity->farm->station_id])}}"><b>{{$activity->farm->station->code}}</b></a>
														@else
														n/a
														@endif
													</td>
													<td>
														<div><b>{{$activity->title}}</b></div>
														@if($activity->brand)
														<div><small>Brand : {{$activity->brand}}</small></div>
														@endif
														<div><small>Qty : {{$activity->qty}}</small></div>
													</td>
												</tr>
												@endforeach
											@endif
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
		
					<div class="row">
						<div class="col-md-12">
							<div class="box box-solid">
								<div class="box-header with-border">
									<h3 class="box-title"> Registered Users </h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-ellipsis-h"></i>
										</button>
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body register table-responsive">
									<table class="table table-bordered" id="registeredUser">
										<thead>
											<tr>
												<th style="width: 25%">Name</th>
												<th style="width: 25%">No. of Farm</th>
												<th style="width: 25%">Date Registered</th>
												<th style="width: 25%">Last Login</th>
											</tr>
										</thead>
										<tbody>
											@foreach($customers as $index => $user)
												<tr>
													<td><span><a href="{{route('backoffice.user.edit',[$user->id])}}">{{$user->name}}</a></span>
													<div><small>{{ $user->email }}</small></div>
													<div><small>{{ $user->contact }}</small></div>
		
													</td>
													<td>
														<a href="{{route('backoffice.user.edit',[$user->id])}}">{{$user->num_farm}}</a>
													<div>
														<small>
															@if($user->station_attached)
															@foreach($user->station_attached as $index => $station)
															<a target="_blank" href="{{ route('backoffice.station.edit', [$station]) }}">
																<div>{{$index}}</div>
															</a>
															@endforeach
															@endif
														</small>
													</div>
													</td>
													<td>{{$user->created_at->format("d M Y h:i A")}}</td>
													<td>{{Helper::time_passed($user->last_activity)}}</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
		
							</div>
						</div>
					</div>
				</section>
		
				<section class="col-lg-4">
					<div class="row">

						<div class="col-xs-12">
							<div class="box dis-table connected">
								<div class="dis-table-cell">
									<span class="info-box-icon">
                    <img src="/dist/img/cs1.png">
                  </span>
									<div class="info-box-content">
										<span class="info-box-text">  <b> Critical Stations </b></span>
										<!-- <span class="info-small"> <a href="{{route('backoffice.station.index')}}">[Manage stations]</a></span> -->
										<span class="info-box-number">{{$stations->count()}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->

								<div class="dis-table-cell">
									<span class="info-box-icon">
                    <img src="/dist/img/bs2.png">
                  </span>
									<div class="info-box-content">
										<span class="info-box-text">  <b> Borderline Stations </b></span>
										<!-- <span class="info-small"> ---  </span> -->
										<span class="info-box-number">{{$customers->where('created_at','>=',$date_today)->count()}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->

								<div class="dis-table-cell">
									<span class="info-box-icon">
                    <img src="/dist/img/ns3.png">
                  </span>
									<div class="info-box-content">
										<span class="info-box-text">  <b> No Risk Stations </b></span>
										<!-- <span class="info-small"> --- </span> -->
										<span class="info-box-number"> {{$customers->count()}} </span>
									</div>
									<!-- /.info-box-content -->
								</div>  
							</div>

						</div>
						<!-- /.col -->

						<!-- /.col -->
					</div>

					<div class="row">
						<div class="col-xs-12 wrapper-info">
							<!-- jQuery Knob -->
							<div class="box box-solid">
								<div class="box-header">

									<h3 class="box-title">Intervention Advisory Compiled</h3>
									<h6 class="date"> Tuesday, 12 February 2019 </h6>

									<div class="box-tools pull-right">
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-ellipsis-h"></i>
										</button>
									</div>

									<div class="box-icon">
										<img src="/dist/img/list.png">
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<div class="row">
										<div class="col-xs-12 text-center">
												<div class="c100 p62 big citrus">
													<span>62%</span>
													<div class="slice">
															<div class="bar"></div>
															<div class="fill"></div>
													</div>
												</div>
										</div>

									</div>
									<!-- /.row -->

								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
								<!-- jQuery Knob -->
							<div class="box box-solid">
								<div class="box-header">

									<h3 class="box-title">Scheduled Management Complied </h3>
									<h6 class="date"> Tuesday, 12 February 2019 </h6>

									<div class="box-tools pull-right">
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-ellipsis-h"></i>
										</button>
									</div>

									<div class="box-icon">
										<img src="/dist/img/fartilizer.png">
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<div class="row">
										<div class="col-xs-12 text-center">
											<div class="c100 p75 big citrus">
													<span>75%</span>
													<div class="slice">
															<div class="bar"></div>
															<div class="fill"></div>
													</div>
												</div>
										</div>

									</div>
									<!-- /.row -->

								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
							<!-- jQuery Knob -->
							<div class="box box-solid">
								<div class="box-header">

									<h3 class="box-title">Farmer Queries Answered </h3>
									<h6 class="date"> Tuesday, 12 February 2019 </h6>

									<div class="box-tools pull-right">
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-ellipsis-h"></i>
										</button>
									</div>
									<div class="box-icon">
										<img src="/dist/img/search.png">
									</div>
								</div>
							
								<div class="box-body">
									<div class="row">
										<div class="col-xs-12 text-center">
											<div class="c100 p50 big citrus">
													<span>50%</span>
													<div class="slice">
															<div class="bar"></div>
															<div class="fill"></div>
													</div>
												</div>
										</div>

									</div>
							

								</div>
						
							</div>
					
						</div>
						<!-- /.col -->
					</div>
				</section>
			</div>
		</div>

		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-body riskData">
					<div class="box-border">
						<div class="listOfRisk">
							<h4> Disease Risk </h4>
							<ul>
								<li> Rice Blast <span class="red-alert"></span> </li>
								<li> Sheath Blight <span class="green-alert"></span> </li>
								<li> Bacterial Blight <span class="green-alert"></span> </li>
								<li> Brown Spot <span class="yellow-alert"></span> </li>
								<li> Red Stripe <span class="green-alert"></span> </li>
								<li> Bacterial Leaf Streak <span class="yellow-alert"></span> </li>
							</ul>	
						</div>
						<div class="listOfRisk">
						<h4> Pest Risk </h4>
							<ul>
								<li> BPH <span class="yellow-alert"></span> </li>
								<li> Rodents <span class="green-alert"></span> </li>
								<li> Apple Snail <span class="green-alert"></span> </li>
								<li> Grasshoppers <span class="red-alert"></span> </li>
								<li> Stem Borers <span class="green-alert"></span> </li>
								<li> Slender Rice Bugs <span class="yellow-alert"></span> </li>
							</ul>
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

@section('vendor-js')
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
								$('#myModal').modal('show');
								infowindow.setContent('<img src="'+locations[0][count].meteogram_image+'"/><br/> <strong>Farmer:</strong> '+locations[0][count].name+'<br/><strong>Farm:</strong> '+locations[0][count].farm_attached[countMap].name);
							} else {
								$('#myModal').modal('show');
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

@section('page-styles')
@stop

@section('page-scripts')
<script>
	$(document).ready( function () {
			$('#registeredUser').DataTable();
	} );
</script>
@stop

<!-- <script src="http://maps.google.com/maps/api/js?key={{  env('GOOGLE_MAP_KEY') }}" type="text/javascript"></script>
<script type="text/javascript">
  $(function(){
      	var locations = [
			$stations = {!! str_replace("'", "\'", json_encode($stations)) !!}
          ];
		  console.log(locations);

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
			center: new google.maps.LatLng(
				$stations.length > 0 ? $stations[0].geo_lat : 0, 
				$stations.length > 0 ? $stations[0].geo_long : 0
			),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });

          var infowindow = new google.maps.InfoWindow();

          var marker, i;

          for (i = 0; i < locations.length; i++) { 
            marker = new google.maps.Marker({
              position: new google.maps.LatLng(locations[i][1], locations[i][2]),
              map: map
              // icon : "http://static.metos.at/img/station-user.png"
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
              }
            })(marker, i));
          }})

</script> -->
