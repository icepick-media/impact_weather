@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header1 row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">Add new Crop</h3>
        {{--<p class="text-muted mb-0">Add a new crop to your mobile application.</p>--}}
        <div class="breadcrumb-wrapper col-xs-12 breadcrumb-top-dashboard">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('backoffice.crop.index') }}">Crops</a></li>
            <li class="breadcrumb-item active">Add new</li>
          </ol>
        </div>
      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.crop.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.crop.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="horz-layout-basic">Crop Details</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                  </ul>
                </div>
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
                        <label class="col-md-2 label-control" for="name">Name (eg Corn)</label>
                        <div class="col-md-9">
                          <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                          @if($errors->has('name')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('name') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('code') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="code">Crop Code (eg. corn)</label>
                        <div class="col-md-9">
                          <input type="text" id="code" class="form-control" placeholder="code" name="code" value="{{ old('code') }}">
                          @if($errors->has('code')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('code') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('variety') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="variety">Crop Varieties</label>
                        <div class="col-md-9">
                          <input type="text" id="variety" class="form-control" placeholder="variety" name="variety" value="{{ old('variety') }}">
                          @if($errors->has('variety')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('variety') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('status') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="status">Allow to choose in app</label>
                        <div class="col-md-9">
                          {!! Form::select('status', $statuses, old('status'), ['class' => "form-control"]) !!}
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