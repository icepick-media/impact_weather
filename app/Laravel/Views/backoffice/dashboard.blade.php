@extends('backoffice._layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Dashboard </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
		
		<section class="col-lg-8 connectedSortable">
			<div class="box box-success">
				<div class="box-header with-border">
					<!-- <h3 class="box-title">Visitors Report</h3> -->
					<div id="map"></div>
				</div>
				<!-- /.box-header -->
				
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"> Today's Activity Report ({{Carbon::now()->format("M d Y")}}) </h3>
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
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"> Registered Users </h3>
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

		<section class="col-lg-4 connectedSortable">
			<div class="row">
				<div class="col-xs-12">

					<div class="dis-table">
						<div class="info-box dis-table-cell">
						<span class="info-box-icon"><i class="ion ion-ios-gear-outline"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">  <b> Active Stations </b></span>
							<span class="info-small"> <a href="{{route('backoffice.station.index')}}">[Manage stations]</a></span>
							<span class="info-box-number">{{$stations->count()}}</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->

					<div class="info-box dis-table-cell">
						<span class="info-box-icon"><i class="ion ion-ios-gear-outline"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">  <b> Today's Registrant </b></span>
							<span class="info-small"> </span>
							<span class="info-box-number">{{$customers->where('created_at','>=',$date_today)->count()}}</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->

					<div class="info-box dis-table-cell">
						<span class="info-box-icon"><i class="ion ion-ios-gear-outline"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">  <b> All App Users </b></span>
							<span class="info-small"></span>
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
				<div class="col-xs-12">
					<!-- jQuery Knob -->
					<div class="box box-solid">
						<div class="box-header">
							
							<h3 class="box-title">Harvest Window </h3>
							<h6 class="date"> Tuesday, 12 February 2019 </h6>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-ellipsis-h"></i>
								</button>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-xs-12 text-center">
										<div class="c100 p62 big">
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
							
							<h3 class="box-title">Harvest Window </h3>
							<h6 class="date"> Tuesday, 12 February 2019 </h6>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-ellipsis-h"></i>
								</button>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-xs-12 text-center">
									<div class="c100 p75 big green">
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
							
							<h3 class="box-title">Harvest Window </h3>
							<h6 class="date"> Tuesday, 12 February 2019 </h6>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-ellipsis-h"></i>
								</button>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-xs-12 text-center">
									<div class="c100 p50 big yellow">
											<span>50%</span>
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
				</div>
				<!-- /.col -->
			</div>  
		</section>
</div>
@stop


@section('vendor-css')
<!-- <link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css">
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/charts/morris.css">
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/extensions/unslider.css"> -->
@stop

@section('vendor-js')
<!-- <script src="/backoffice/robust-assets/js/plugins/extensions/jquery.knob.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/components/extensions/knob.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/raphael-min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/morris.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/jvector/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/jvector/jquery-jvectormap-world-mill.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/demo-data/jvector/visitor-data.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/chart.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/charts/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/extensions/unslider-min.js" type="text/javascript"></script> -->
@stop

@section('page-styles')
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/components/weather-icons/climacons.min.css">
@stop

@section('page-scripts')
<script>
$(document).ready( function () {
    $('#registeredUser').DataTable();
} );
</script>
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
          }})

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