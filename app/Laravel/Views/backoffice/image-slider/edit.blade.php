@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('backoffice.image_slider.index') }}">Image Slider</a></li>
          <li class="breadcrumb-item active">Image #{{ $image->id }}</li>
        </ol>
      </div>
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">Image #{{ $image->id }}</h3>
        <p class="text-muted mb-0">Edit image details.</p>
      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.image_slider.create') }}" class="btn btn-info"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.image_slider.trash') }}" class="btn btn-info"><i class="icon-trash2"></i> Trash</a>
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
                <h4 class="card-title" id="horz-layout-basic">Image Slider Details</h4>
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

                      @if($image->filename)
                      <div class="form-group row">
                        <label class="col-md-2 label-control" for="">Current Thumbnail</label>
                        <div class="col-xl-6 col-md-6 col-xs-12">
                          <div class="card box-shadow-1">
                            <div class="text-xs-center">
                                <div class="card-block">
                                    <img src="{{ $image->directory . "/resized/" . $image->filename }}" class="" style="width: 100%;" alt="{{ $image->filename }}">
                                </div>
                            </div>
                        </div>
                        </div>
                      </div>
                      @endif

                      <div class="form-group {{ $errors->has('file') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="file">Change Thumbnail</label>
                        <div class="col-md-9">
                          <input type="file" id="file" name="file" class="form-control">
                          @if($errors->has('file')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('file') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('content') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="content">Content</label>
                        <div class="col-md-9">
                          <textarea name="content" id="content" class="summernote">{!! old('content', $image->content) !!}</textarea>
                          @if($errors->has('content')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('content') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('sorting') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="sorting">Sorting</label>
                        <div class="col-md-3">
                          <input type="number" id="sorting" class="form-control" placeholder="Sorting" name="sorting" value="{{ old('sorting', $image->sorting) }}">
                          @if($errors->has('sorting')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('sorting') }}</small></p> @endif
                        </div>
                      </div>

                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary mr-1">
                        <i class="icon-check2"></i> Save
                      </button>
                      <a href="{{ route('backoffice.image_slider.index') }}" class="btn btn-default">
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