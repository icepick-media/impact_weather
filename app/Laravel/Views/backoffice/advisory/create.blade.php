@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header1 row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">Create Advisory</h3>
        {{--<p class="text-muted mb-0">Add new advisory.</p>--}}
        <div class="breadcrumb-wrapper col-xs-12 breadcrumb-top-dashboard">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('backoffice.advisory.index') }}">Advisory</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>

      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.advisory.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.advisory.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                <h4 class="card-title" id="horz-layout-basic">Advisory Details</h4>
              </div>
              <div class="card-body collapse in">
                <div class="card-block">
                  <div class="card-text">
                    {{--  <p>This is where you enter the details of your page. Make sure to enter the data asked for each field. All fields marked with <code>*</code> are required.</p> --}}
                  </div>
                  <form class="form form-horizontal" method="post" enctype="multipart/form-data">

                    <div class="form-body">

                      {{ csrf_field() }}

                      <div class="form-group {{ $errors->has('user_id') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="user_id">Adviced User</label>
                        <div class="col-md-9">
                          {!! Form::select('user_id', $users, old('user_id',Input::get('uid')), ['class' => "form-control"]) !!}
                          @if($errors->has('user_id')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('user_id') }}</small></p> @endif
                        </div>
                      </div>

                      @if(Input::has('uid'))
                      <div class="form-group {{ $errors->has('farm_id') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="farm_id">Specific Farm</label>
                        <div class="col-md-9">
                          {!! Form::select('farm_id', $farms, old('farm_id',Input::get('fid')), ['class' => "form-control"]) !!}
                          @if($errors->has('farm_id')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('farm_id') }}</small></p> @endif
                        </div>
                      </div>
                      @endif

                      <div class="form-group {{ $errors->has('content') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="content">Advisory Content</label>
                        <div class="col-md-9">
                          <textarea type="text" id="content" cols="30" rows="5" class="form-control" placeholder="content" name="content" style="width: 100%">{{ old('content')}}</textarea>
                          @if($errors->has('content')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('content') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('status') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="status">Status</label>
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
                      <a href="{{ route('backoffice.advisory.index') }}" class="btn btn-danger btn-trash">
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
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/editors/summernote.css">
@stop

@section('page-styles')
@stop

@section('vendor-js')
<script src="/backoffice/robust-assets/js/plugins/editors/summernote/summernote.js" type="text/javascript"></script>
@stop

@section('page-scripts')
<script type="text/javascript">
  $(function(){
    $(".summernote").summernote({
      height: 200,
      placeholder: 'Some text ...',
      toolbar: [
        ['paragraph_style', ['style']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['misc', ['fullscreen', 'codeview']],
      ]
    });
  });
</script>
@stop