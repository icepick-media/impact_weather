@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> Edit {{ $activity->activity . " (" . $activity->farm_attached->name . ")" }} </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('backoffice.activity.index') }}"><i class="fa fa-dashboard"></i> Farm Activities</a></li>
      <li class="active">{{ $activity->activity . " (" . $activity->farm_attached->name . ")" }}</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.activity.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.activity.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                <h3 class="box-title"> Activity Details </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form class="form form-horizontal" method="post" enctype="multipart/form-data">

                <div class="form-body">

                  {{ csrf_field() }}

                  <div class="form-group {{ $errors->has('farm_id') ? 'has-danger' : NULL }} row">
                    <label class="col-md-2 label-control" for="farm_id">Farm</label>
                    <div class="col-md-9">
                      {!! Form::select('farm_id', $farms, old('farm_id', $activity->farm_id), ['class' => "form-control"]) !!}
                      @if($errors->has('farm_id')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('farm_id') }}</small></p> @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('crop_id') ? 'has-danger' : NULL }} row">
                    <label class="col-md-2 label-control" for="crop_id">Crops</label>
                    <div class="col-md-9">
                      {!! Form::select('crop_id', $crops, old('crop_id', $activity->crop_id), ['class' => "form-control"]) !!}
                      @if($errors->has('crop_id')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('crop_id') }}</small></p> @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('activity') ? "has-danger" : NULL }} row">
                    <label class="col-md-2 label-control" for="activity">Activity</label>
                    <div class="col-md-9">
                      <input type="text" id="activity" class="form-control" placeholder="Farm Activity" name="activity" value="{{ old('activity', $activity->activity) }}">
                      @if($errors->has('activity')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('activity') }}</small></p> @endif
                    </div>
                  </div>

                </div>

                  <div class="form-actions">
                    <button type="submit" class="btn btn-info btn-radius mr-1">
                      <i class="icon-check2"></i> Save
                    </button>
                    <a href="{{ route('backoffice.activity.index') }}" class="btn btn-danger btn-trash">
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