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
                <h3 class="box-title"> Record Data </h3>
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
<script src="http://maps.google.com/maps/api/js?key={{  env("GOOGLE_MAP_KEY") }}" type="text/javascript"></script>
<script type="text/javascript">
  $(function(){
      var locations = [
            @foreach($stations as $index => $station )
            ["{{"{$station->code} - {$station->name}"}} ",  {{$station->geo_lat}}, {{$station->geo_long}}, {{$station->id}}],
            @endforeach
          ];

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: new google.maps.LatLng({{$stations[0]->geo_lat}}, {{$stations[0]->geo_long}}),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });

          var infowindow = new google.maps.InfoWindow();

          var marker, i;

          for (i = 0; i < locations.length; i++) { 
            marker = new google.maps.Marker({
              position: new google.maps.LatLng(locations[i][1], locations[i][2]),
              map: map,
              icon : "http://static.metos.at/img/station-user.png"
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