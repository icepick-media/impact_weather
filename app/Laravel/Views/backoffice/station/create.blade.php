@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header1 row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">Create Station</h3>
        {{--<p class="text-muted mb-0">Add a new station to your mobile application.</p>--}}
      <div class="breadcrumb-wrapper col-xs-12 breadcrumb-top-dashboard">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('backoffice.station.index') }}">Station</a></li>
          <li class="breadcrumb-item active">Create</li>
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
      <section id="horizontal-form-layouts">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="horz-layout-basic">Station Details</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              </div>
              <div class="card-body collapse in">
                <div class="card-block">
                  <div class="card-text">
                    {{--  <p>This is where you enter the details of your page. Make sure to enter the data asked for each field. All fields marked with <code>*</code> are required.</p> --}}
                  </div>
                  <form class="form form-horizontal" method="post" enctype="multipart/form-data">

                    <div class="form-body">

                      {{ csrf_field() }}

                      <div class="form-group {{ $errors->has('name') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="name">Name</label>
                        <div class="col-md-9">
                          <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                          @if($errors->has('name')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('name') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('code') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="code">Code</label>
                        <div class="col-md-9">
                          <input type="text" id="code" class="form-control" placeholder="Code" name="code" value="{{ old('code') }}">
                          @if($errors->has('code')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('code') }}</small></p> @endif
                        </div>
                      </div>

                      <!-- <div class="form-group {{ $errors->has('public_key') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="public_key">Public Key (Metos)</label>
                        <div class="col-md-9">
                          <input type="text" id="public_key" class="form-control" placeholder="Public Key" name="public_key" value="{{ old('public_key') }}">
                          @if($errors->has('public_key')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('public_key') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('private_key') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="private_key">Private Key (Metos)</label>
                        <div class="col-md-9">
                          <input type="text" id="private_key" class="form-control" placeholder="Private Key" name="private_key" value="{{ old('private_key') }}">
                          @if($errors->has('private_key')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('private_key') }}</small></p> @endif
                        </div>
                      </div> -->

                      <div class="form-group {{ $errors->has('status') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="status">Status</label>
                        <div class="col-md-9">
                          {!! Form::select('status', $statuses, old('status'), ['id' => "status", 'class' => "form-control"]) !!}
                          @if($errors->has('status')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('status') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('geo_lat') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="geo_lat">Geo Latitude</label>
                        <div class="col-md-9">
                          <input type="text" id="geo_lat" class="form-control" placeholder="Geo Latitude" name="geo_lat" id="geo_lat" value="{{ old('geo_lat') }}">
                          @if($errors->has('geo_lat')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('geo_lat') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('geo_long') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="geo_long">Geo Longitude</label>
                        <div class="col-md-9">
                          <input type="text" id="geo_long" class="form-control" placeholder="Geo Longitude" name="geo_long" id="geo_long" value="{{ old('geo_long') }}">
                          @if($errors->has('geo_long')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('geo_long') }}</small></p> @endif
                        </div>
                      </div>

                      {{-- <div class="form-group {{ $errors->has('device_type') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="device_type">Type</label>
                        <div class="col-md-9">
                          {!! Form::select('device_type', $device_types, old('device_type'), ['id' => "device_type", 'class' => "form-control"]) !!}
                          @if($errors->has('device_type')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('device_type') }}</small></p> @endif
                        </div>
                      </div> --}}

                      <div class="form-group row">
                        <label class="col-md-2 label-control" for="device_type">Geo-location</label>
                        <div class="col-md-9">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="icon-search"></i></span>
                            <input type="text" id="map-address" class="form-control disableSubmitOnEnter" placeholder="Search Location" name="map_address">
                          </div>
                          {{-- <input type="hidden" name="geo_lat" id="geo_lat"> --}}
                          {{-- <input type="hidden" name="geo_long" id="geo_long"> --}}
                          <input type="hidden" name="street_address" id="street_address">
                          <input type="hidden" name="city" id="city">
                          <input type="hidden" name="state" id="state">
                          <input type="hidden" name="country" id="country">
                          <div id="map" style="width: 100%; height: 300px;"></div>
                        </div>
                      </div>

                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-info btn-radius mr-1">
                        <i class="icon-check2"></i> Save
                      </button>
                      <a href="{{ route('backoffice.station.index') }}" class="btn btn-danger btn-trash">
                        <i class="icon-cross2"></i> Cancel
                      </a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- // Basic form layout section end -->
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
<script type="text/javascript" src='http://maps.google.com/maps/api/js?libraries=places&key={{  env("GOOGLE_MAP_KEY") }}'></script>
<script src="/backoffice/robust-assets/js/plugins/locationpicker/locationpicker.jquery.js"></script>
<script type="text/javascript">

  $('.disableSubmitOnEnter').keypress(function(e){
      if ( e.which == 13 ) return false;
  });

  function updateControls(addressComponents) {
      $('#street_address').val(addressComponents.addressLine1);
      $('#city').val(addressComponents.city);
      $('#state').val(addressComponents.stateOrProvince);
      $('#country').val(addressComponents.country);
  }

  $('#map').locationpicker({
    location: {
        latitude: {{ old('geo_lat', 14.5995) }},
        longitude: {{ old('geo_long', 120.9842) }}
    },
    radius: 50,
    inputBinding : {
      locationNameInput: $('#map-address'),
      latitudeInput: $('#geo_lat'),
      longitudeInput: $('#geo_long'),
    },
    enableAutocomplete: true,
    autocompleteOptions: {
        // types: ['(cities)'],
        componentRestrictions: {country: 'ph'}
    },
    onchanged: function (currentLocation, radius, isMarkerDropped) {
        var addressComponents = $(this).locationpicker('map').location.addressComponents;
        updateControls(addressComponents);
    },
    oninitialized: function(component) {
        var addressComponents = $(component).locationpicker('map').location.addressComponents;
        updateControls(addressComponents);
    }
  });

  $.fn.slugify = function(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
    var to   = "aaaaaeeeeeiiiiooooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
      str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
      .replace(/\s+/g, '-') // collapse whitespace and replace by -
      .replace(/-+/g, '-'); // collapse dashes

    return str;
  }

  $(function(){
    $('input[data-slug-input]').on('input', function(){
      var input = $($(this).data('slug-input'));
      input.val($(this).slugify($(this).val()));
    });
  });
  
</script>
@stop