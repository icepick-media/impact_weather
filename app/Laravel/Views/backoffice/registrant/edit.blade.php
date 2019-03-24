@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> Edit {{ $registrant->name . " (" . $registrant->contact_number . ")" }} </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('backoffice.registrant.index') }}"><i class="fa fa-dashboard"></i> Registrant Contact</a></li>
      <li class="active">{{ $registrant->name . " (" . $registrant->contact_number . ")" }}</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.registrant.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.registrant.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                <h3 class="box-title"> Registrant Contact Details </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form class="form form-horizontal" method="post" enctype="multipart/form-data">

                  <div class="form-body">

                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : NULL }} row">
                      <label class="col-md-2 label-control" for="name">Name</label>
                      <div class="col-md-9">
                        <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ old('name', $registrant->name) }}">
                        @if($errors->has('name')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('name') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('contact_number') ? 'has-danger' : NULL }} row">
                      <label class="col-md-2 label-control" for="contact_number">Contact Number</label>
                      <div class="col-md-9">
                        <input type="text" id="contact_number" class="form-control" placeholder="contact_number" name="contact_number" value="{{ old('contact_number',$registrant->contact_number) }}">
                        @if($errors->has('contact_number')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('contact_number') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('status') ? 'has-danger' : NULL }} row">
                      <label class="col-md-2 label-control" for="status">Allow to use app</label>
                      <div class="col-md-9">
                        {!! Form::select('status', $statuses, old('status',$registrant->status), ['class' => "form-control"]) !!}
                        @if($errors->has('status')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('status') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('allow_weather_station') ? 'has-danger' : NULL }} row">
                      <label class="col-md-2 label-control" for="allow_weather_station">Weather Station</label>
                      <div class="col-md-9">
                        {!! Form::select('allow_weather_station', $allow_stations, old('allow_weather_station',$registrant->allow_weather_station), ['class' => "form-control"]) !!}
                        @if($errors->has('allow_weather_station')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('allow_weather_station') }}</small></p> @endif
                      </div>
                    </div>

                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn btn-info btn-radius mr-1">
                      <i class="icon-check2"></i> Save
                    </button>
                    <a href="{{ route('backoffice.registrant.index') }}" class="btn btn-danger btn-trash">
                      <i class="icon-cross2"></i> Cancel
                    </a>
                  </div>
                  </form>
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
<script type="text/javascript">

  $('.disableSubmitOnEnter').keypress(function(e){
      if ( e.which == 13 ) return false;
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