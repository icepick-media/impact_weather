@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> Farm Profile </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('backoffice.user.index') }}">Users</a></li>
      <li><a href="{{ route('backoffice.user.edit',[$user->id]) }}">{{ $user->name }} Profile</a></li>
      <li class="active">{{Str::upper($farm->name .": ".$farm->crop_display)}}</li>
    </ol>
  </section>
    
  <div class="content">
    <div class="row">
      <div class="col-lg-12 connectedSortable">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> Edit Farm Profile </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <h4>Farm Name</h4>
                    <p>{{$farm->name}}</p>
                  </div>
                  <div class="col-md-6">
                    <h4>Crops Planted</h4>
                    <p>{{$farm->crop_display}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <h4>Station Attached</h4>
                    <p><a href="{{route('backoffice.station.edit',[$farm->station_id])}}">{{$farm->station?"{$farm->station->code} - {$farm->station->name}":"n/a"}}</a></p>
                    <div class="form-actions">
                      <a href="{{route('backoffice.user.edit_farm',[$user->id,$farm->id])}}" class="btn btn-primary mr-1">
                        <i class="icon-cog"></i> Assign Different Station
                      </a>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h4>Date Added</h4>
                    <p>{{$farm->created_at->format("d M Y h:i A")}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title"> Activity Report </h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered bootstrap-3 datatable">
                          <thead>
                            <tr>
                              <th width="50%">Activity</th>
                              <th>Date Added</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($activities as $index => $activity)
                            <tr>
                              <td>
                                <div><b>{{$activity->title}}</b></div>
                                @if($activity->brand)
                                <div><small>Brand : {{$activity->brand}}</small></div>
                                @endif
                                <div><small>Qty : {{$activity->qty}}</small></div>
                              </td>
                              <td>{{$activity->created_at->format("M d, Y")}}</td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="3">No activity report yet.</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title"> Advisory Notification </h3>
                        <span class="pull-right">
                          <a href="{{ route('backoffice.advisory.create') }}?uid={{$user->id}}&fid={{$farm->id}}" class="btn btn-primary mr-1">
                            <i class="icon-plus"></i> Send New Advisory
                          </a>
                        </span>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered bootstrap-3 datatable">
                          <thead>
                            <tr>
                              <th width="50%">Content</th>
                              <th>Date Sent</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($advisories as $index => $notification)
                            <tr>
                              <td>
                                <div>{{$notification->content}}</div>
                              </td>
                              <td>{{$notification->created_at->format("M d, Y")}}</td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="2">No advisory sent yet.</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <div id="map" style="height: 400px; width: 100%;"></div>
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
<script src="http://maps.google.com/maps/api/js?key={{  env("GOOGLE_MAP_KEY") }}" type="text/javascript"></script>
<script type="text/javascript">
  $(function(){
      var locations = [
            ["{{"{$farm->station->code} - {$farm->station->name}"}} - No. of Farms: {{$farm->station->num_farm}}",  {{$farm->station->geo_lat}}, {{$farm->station->geo_long}}, {{$farm->station->id}}],
          ];

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: new google.maps.LatLng(locations[0][1], locations[0][2]),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });



          var farm_map_coor = [
            @foreach($farm->map as $index => $point)
            {
              lat : {{$point->geo_lat}},lng : {{$point->geo_long}}
            },
            @endforeach
          ];

          // Construct the polygon.
          var farm_map = new google.maps.Polygon({
            paths: farm_map_coor,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35
          });
          farm_map.setMap(map);

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