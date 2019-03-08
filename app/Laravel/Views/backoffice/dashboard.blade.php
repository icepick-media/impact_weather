@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
	<section class="content-header">
		<h1>Dashboard</h1>
	</section>
	<div class="content-wrapper">
		<div class="content-body">
			<div class="row">
				{{--------GOOGLE-MAP---------}}
				<div class="col-md-8 col-md-lg-12 col-xs-12">
					<div id="map" style="height: 400px; width: 100%;"></div>
				</div>
					{{-------------CARD-SECTION----------------}}
				<div class="col-md-4 col-md-lg-12 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon">
							<i class="icon-location3 success font-large-2 text-center"></i>
						</span>
						<div class="info-box-content">
							<span class="info-box-text">Active Stations</span>
							<small><a href="{{route('backoffice.station.index')}}">[Manage stations]</a></small>
							<h3 class="success">{{$stations->count()}}</h3>
						</div>
						<!-- /.info-box-content -->
					</div>
					<div class="info-box">
						<span class="info-box-icon"><i class="icon-user5 info font-large-2"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Today's Registrant</span>
							<h3 class="info">{{$customers->where('created_at','>=',$date_today)->count()}}</h3>
							{{--<span class="progress-description">--}}
								{{--50% Increase in 30 Days--}}
							{{--</span>--}}
						</div>
						<!-- /.info-box-content -->
					</div>
					<div class="info-box">
						<span class="info-box-icon"><i class="icon-user5 info font-large-2"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">All App Users</span>
							<h3 class="info">{{$customers->count()}}</h3>
							{{--<span class="progress-description">--}}
								{{--50% Increase in 30 Days--}}
							{{--</span>--}}
						</div>
						<!-- /.info-box-content -->
					</div>
					{{--<div class="card-group card-dashboard-right">--}}
						{{--<div class="card" style="font-size: 13px">--}}
							{{--<div class="card-body text-center">--}}
								{{--<div class="card-block">--}}
									 {{--<div class="media ml-0">--}}
										{{--<div class="  media-middle">--}}
											{{--<i class="icon-location3 success font-large-2 text-center"></i>--}}
										{{--</div>--}}
										{{--<div class="media-body text-xs-center">--}}
											{{--<span>Active Stations</span>--}}
											{{--<small><a href="{{route('backoffice.station.index')}}">[Manage stations]</a></small>--}}
										{{--</div>--}}
										{{--<div class="media-bottom">--}}
											{{--<h3 class="success">{{$stations->count()}}</h3>--}}
										{{--</div>--}}
									{{--</div>--}}
									{{-- <progress class="progress progress-sm progress-success mt-1 mb-0" value="80" max="100"></progress> --}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="card" style="font-size: 13px">--}}
							{{--<div class="card-body text-center">--}}
								{{--<div class="card-block">--}}
									{{--<div class="media ml-0">--}}
										{{--<div class="media-middle">--}}
											{{--<i class="icon-user5 info font-large-2"></i>--}}
										{{--</div>--}}
										{{--<div class="media-body text-xs-center">--}}
											{{--<span>Today's Registrant</span>--}}
										{{--</div>--}}
										{{--<div class="media-bottom">--}}
											{{--<h3 class="info">{{$customers->where('created_at','>=',$date_today)->count()}}</h3>--}}
										{{--</div>--}}
									{{--</div>--}}
									{{-- <progress class="progress progress-sm progress-info mt-1 mb-0" value="35" max="100"></progress> --}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="card" style="font-size: 13px">--}}
							{{--<div class="card-body text-center">--}}
								{{--<div class="card-block">--}}
									{{--<div class="media ml-0">--}}
										{{--<div class="media-middle">--}}
											{{--<i class="icon-user5 info font-large-2"></i>--}}
										{{--</div>--}}
										{{--<div class="media-body text-xs-center">--}}
											{{--<span>All App Users</span>--}}
										{{--</div>--}}
										{{--<div class="media-bottom">--}}
											{{--<h3 class="info">{{$customers->count()}}</h3>--}}
										{{--</div>--}}
									{{--</div>--}}
									{{-- <progress class="progress progress-sm progress-info mt-1 mb-0" value="35" max="100"></progress> --}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
			    </div>
				{{---------------CHART SECTION----------------}}

			</div>
			<div class="row">
				<div class="col-md-4 col-md-lg-12 col-xs-12 mt-1">
					<div class="box box-danger">
						<div class="box-body">
							<div class="donutchart" id="donutchart" width="334" height="180"></div>
						</div>
						<!-- /.box-body -->
					</div>
					{{--<div class="col-md-8 col-md-lg-8 col-xs-8">--}}
					{{--<div id="map" style="height: 400px; width: 100%;"></div>--}}
					{{--</div>--}}
				</div>
				<div class="col-md-4 col-md-lg-12 col-xs-12 mt-1">
					<div class="box box-danger">
						<div class="box-body">
							<div class="donutchart" id="donutchart1" width="334" height="180"></div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
				<div class="col-md-4 col-md-lg-12 col-xs-12 mt-1">
					<div class="box box-danger">
						<div class="box-body">
							<div class="donutchart" id="donutchart2" width="334" height="180"></div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
			</div>
			{{----------------TABLE-SECTION---------------}}
			<div class="row">
				<div class="col-md-12 col-md-lg-12 col-xs-12 pt-1">
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


				{{--------------TABLE-SECTION-2-----------}}
			</div>
			<div class="row">
				<div class="col-md-12 col-md-lg-12 col-xs-12">
					<div class="card">
			            <div class="card-header">
			                <h4 class="card-title">Registered Users</h4>
			            </div>
			            <div class="card-content">
			                <div class="table-responsive">
			                    <table class="table no-margin">
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
				{{--<div class="col-xl-4 col-lg-12 col-md-12 mt-1">--}}
					{{--<div class="box box-danger">--}}
						{{--<div class="box-body">--}}
							{{--<div id="donutchart2" style="width: 357px; height: 200px;"></div>--}}
						{{--</div>--}}
						{{--<!-- /.box-body -->--}}
					{{--</div>--}}
				{{--</div>--}}
			</div>

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


	  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
	  var pieChart       = new Chart(pieChartCanvas)
	  var PieData        = [
		  {
			  value    : 700,
			  color    : '#f56954',
			  highlight: '#f56954',
			  label    : 'Chrome'
		  },
		  {
			  value    : 500,
			  color    : '#00a65a',
			  highlight: '#00a65a',
			  label    : 'IE'
		  },
		  {
			  value    : 400,
			  color    : '#f39c12',
			  highlight: '#f39c12',
			  label    : 'FireFox'
		  },
		  {
			  value    : 600,
			  color    : '#00c0ef',
			  highlight: '#00c0ef',
			  label    : 'Safari'
		  },
		  {
			  value    : 300,
			  color    : '#3c8dbc',
			  highlight: '#3c8dbc',
			  label    : 'Opera'
		  },
		  {
			  value    : 100,
			  color    : '#d2d6de',
			  highlight: '#d2d6de',
			  label    : 'Navigator'
		  }
	  ]
	  var pieOptions     = {
		  //Boolean - Whether we should show a stroke on each segment
		  segmentShowStroke: true,
		  //String - The colour of each segment stroke
		  segmentStrokeColor: '#fff',
		  //Number - The width of each segment stroke
		  segmentStrokeWidth: 2,
		  //Number - The percentage of the chart that we cut out of the middle
		  percentageInnerCutout: 50, // This is 0 for Pie charts
		  //Number - Amount of animation steps
		  animationSteps: 100,
		  //String - Animation easing effect
		  animationEasing: 'easeOutBounce',
		  //Boolean - Whether we animate the rotation of the Doughnut
		  animateRotate: true,
		  //Boolean - Whether we animate scaling the Doughnut from the centre
		  animateScale: false,
		  //Boolean - whether to make the chart responsive to window resizing
		  responsive: true,
		  // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		  maintainAspectRatio: true,
		  //String - A legend template
		  {{--legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++)' + '{%><li><span style="background-color:<%=segments[i].fillColor%>">' + '</span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'--}}
	  }

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
  });
</script>
{{------------------CHART SCRIPT-------------------}}

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['Work',     8],
			['Sleep',    9]
		]);

		var options = {
			title: 'Harwest Window',
			pieHole: 0.4,
			colors: ['#FFC200', '#CCCCCC']
		};

		var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
		chart.draw(data, options);
	}
</script>
<script>
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['Work',     10],
			['Sleep',    7]
		]);

		var options = {
			title: 'Fertilizer Application',
			pieHole: 0.4,
			colors: ['#89C409', '#CCCCCC']
		};

		var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
		chart.draw(data, options);
	}
</script>
<script>
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['Work',     8],
			['Sleep',    7]
		]);

		var options = {
			title: 'Fertilizer Application',
			pieHole: 0.4,
			colors: ['#89C409', '#CCCCCC']
		};

		var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
		chart.draw(data, options);
	}
</script>

@stop