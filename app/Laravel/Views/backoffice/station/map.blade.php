@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header1 row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">All Stations</h3>
        {{--<p class="text-muted mb-0">Record data of all stations in your mobile application.</p>--}}
      <div class="breadcrumb-wrapper col-xs-12 breadcrumb-top-dashboard">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Stations</li>
        </ol>
      </div>
      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.station.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.station.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
        </div>
      </div>
      <div class="content-header-lead col-xs-12 mt-1">
        <p class="lead">
          {{-- Page Lead Paragraph --}}
        </p>
      </div>
    </div>
    <div class="content-body">
      

      <!-- Bootstrap 3 table -->
      <section id="bootstrap3">
        <div class="row">
          <div class="col-xs-12">
            <div id="map" style="height: 600px; width: 100%;">
          </div>
        </div>
      </section>
      <!--/ Bootstrap 3 table -->
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