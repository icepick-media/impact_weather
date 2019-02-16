@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
	<div class="content-wrapper">
		<div class="content-header row">
		</div>
		<div class="content-body"><!-- Analytics charts -->
			<div class="row">
				<div class="col-xl-4 col-lg-12 col-md-12">
			        <div class="card">
	                    <div class="card-body">
	                        <div class="card-block">
	                            <div class="media">
	                                <div class="media-body text-xs-left">
	                                    <h3 class="success">{{$stations->count()}}</h3>
	                                    <span>Active Stations</span>
	                                    <small><a href="{{route('backoffice.station.index')}}">[Manage stations]</a></small>
	                                </div>
	                                <div class="media-right media-middle">
	                                    <i class="icon-location3 success font-large-2 float-xs-right"></i>
	                                </div>
	                            </div>
	                            {{-- <progress class="progress progress-sm progress-success mt-1 mb-0" value="80" max="100"></progress> --}}
	                        </div>
	                    </div>
	                </div>
			        <div class="card">
			            <div class="card-body">
			                <div class="card-block">
			                    <div class="media">
			                        <div class="media-body text-xs-left">
			                            <h3 class="info">{{$customers->where('created_at','>=',$date_today)->count()}}</h3>
			                            <span>Today's Registrant</span>
			                        </div>
			                        <div class="media-right media-middle">
			                            <i class="icon-user5 info font-large-2 float-xs-right"></i>
			                        </div>
			                    </div>
			                    {{-- <progress class="progress progress-sm progress-info mt-1 mb-0" value="35" max="100"></progress> --}}
			                </div>
			            </div>
			        </div>
			        <div class="card">
			            <div class="card-body">
			                <div class="card-block">
			                    <div class="media">
			                        <div class="media-body text-xs-left">
			                            <h3 class="info">{{$customers->count()}}</h3>
			                            <span>All App Users</span>
			                        </div>
			                        <div class="media-right media-middle">
			                            <i class="icon-user5 info font-large-2 float-xs-right"></i>
			                        </div>
			                    </div>
			                    {{-- <progress class="progress progress-sm progress-info mt-1 mb-0" value="35" max="100"></progress> --}}
			                </div>
			            </div>
			        </div>
			    </div>
			    <div class="col-md-8 col-md-lg-8 col-xs-8">
			    	<div id="map" style="height: 400px; width: 100%;"></div>
			    </div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
			            <div class="card-header">
			                <h4 class="card-title">Today's Activity Report ({{Carbon::now()->format("M d Y")}})</h4>
			            </div>
			            <div class="card-content">
			                <div class="table-responsive">
			                    <table class="table table-hover mb-0">
			                        <thead>
			                            <tr>
			                                <th>User</th>
			                                <th>Farm</th>
			                                <th>Station ID</th>
			                                <th>Activity</th>
			                            </tr>
			                        </thead>
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
			            <div class="card-footer">
			            	<table class="table table-hovered table-striped">
			            		<tr>
			            			<td>Fertilizer</td>
			            			<td><b>{{$journal->where('title','Fertilizer')->count()}}</b></td>
			            			<td>Spray</td>
			            			<td><b>{{$journal->where('title','Spray')->count()}}</b></td>
			            			<td>Irrigation</td>
			            			<td><b>{{$journal->where('title','Irrigation')->count()}}</b></td>
			            		</tr>
			            	</table>
			            </div>
			        </div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
			            <div class="card-header">
			                <h4 class="card-title">Registered Users</h4>
			            </div>
			            <div class="card-content">
			                <div class="table-responsive">
			                    <table class="table table-hover mb-0">
			                        <thead>
			                            <tr>
			                                <th>Name</th>
			                                <th>No. of Farm</th>
			                                <th>Date Registered</th>
			                                <th>Last Login</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        	@foreach($customers as $index => $user)
			                            <tr>
			                                <td class="text-truncate"><span><a href="{{route('backoffice.user.edit',[$user->id])}}">{{$user->name}}</a></span>
		                                	<div><small>{{ $user->email }}</small></div>
		                                	<div><small>{{ $user->contact }}</small></div> 

			                                </td>
			                                <td class="text-truncate">
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
			                                <td class="text-truncate">{{$user->created_at->format("d M Y h:i A")}}</td>
			                                <td class="text-truncate">{{Helper::time_passed($user->last_activity)}}</td>
			                            </tr>
			                            @endforeach
			                        </tbody>
			                    </table>
			                </div>
			            </div>
			        </div>
				</div>
			</div>
			
			<!--/ Analytics charts -->
		</div>
	</div>
</div>
@stop


@section('vendor-css')
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css">
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/charts/morris.css">
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/extensions/unslider.css">
@stop

@section('vendor-js')
<script src="/backoffice/robust-assets/js/plugins/extensions/jquery.knob.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/components/extensions/knob.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/raphael-min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/morris.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/jvector/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/jvector/jquery-jvectormap-world-mill.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/demo-data/jvector/visitor-data.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/chart.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/extensions/unslider-min.js" type="text/javascript"></script>
@stop

@section('page-styles')
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/components/weather-icons/climacons.min.css">
@stop

@section('page-scripts')
<script src="/backoffice/robust-assets/js/components/pages/dashboard-analytics.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/components/pages/dashboard-project.js" type="text/javascript"></script>

<script src="http://maps.google.com/maps/api/js?key={{  env('GOOGLE_MAP_KEY') }}" type="text/javascript"></script>
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
          }
  });
</script>
@stop