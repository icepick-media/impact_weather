@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> Edit {{ $crop->name . " (" . $crop->code . ")" }} </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('backoffice.crop.index') }}"><i class="fa fa-dashboard"></i> Crops</a></li>
      <li class="active">{{ $crop->name . " (" . $crop->code . ")" }}</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.crop.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.crop.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                <h3 class="box-title"> Crop Details </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form class="form form-horizontal" method="post" enctype="multipart/form-data">

                  <div class="form-body">

                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="name">Name (eg Corn)</label>
                      <div class="col-md-9">
                        <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ old('name',$crop->name) }}">
                        @if($errors->has('name')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('name') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('code') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="code">Crop Code (eg. corn)</label>
                      <div class="col-md-9">
                        <input type="text" id="code" class="form-control" placeholder="code" name="code" value="{{ old('code',$crop->code) }}">
                        @if($errors->has('code')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('code') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('variety') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="variety">Crop Varieties</label>
                      <div class="col-md-9">
                        <input type="text" id="variety" class="form-control" placeholder="variety" name="variety" value="{{ old('variety',$crop->variety) }}">
                        @if($errors->has('variety')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('variety') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('status') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="status">Allow to choose in app</label>
                      <div class="col-md-9">
                        {!! Form::select('status', $statuses, old('status',$crop->status), ['class' => "form-control"]) !!}
                        @if($errors->has('status')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('status') }}</small></p> @endif
                      </div>
                    </div>

                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn btn-info btn-radius mr-1">
                      <i class="icon-check2"></i> Save
                    </button>
                    <a href="{{ route('backoffice.crop.index') }}" class="btn btn-danger btn-trash">
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