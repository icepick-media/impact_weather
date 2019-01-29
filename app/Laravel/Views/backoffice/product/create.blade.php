@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('backoffice.product.index') }}">Product</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </div>
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">Create Product</h3>
        <p class="text-muted mb-0">Add a new product to your web application.</p>
      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.product.create') }}" class="btn btn-info"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.product.trash') }}" class="btn btn-info"><i class="icon-trash2"></i> Trash</a>
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
                <h4 class="card-title" id="horz-layout-basic">Product Details</h4>
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

                      <div class="form-group {{ $errors->has('title') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="title">Title</label>
                        <div class="col-md-9">
                          <input type="text" id="title" class="form-control" placeholder="Title" data-slug-input="#slug" name="title" value="{{ old('title') }}">
                          @if($errors->has('title')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('title') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('slug') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="slug">Slug</label>
                        <div class="col-md-9">
                          <input type="text" id="slug" class="form-control" placeholder="Slug" name="slug" value="{{ old('slug') }}">
                          @if($errors->has('slug')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('slug') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('file') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="file">Thumbnail</label>
                        <div class="col-md-9">
                          <input type="file" id="file" name="file" class="form-control">
                          @if($errors->has('file')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('file') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('icon_file') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="icon_file">Icon</label>
                        <div class="col-md-9">
                          <input type="file" id="icon_file" name="icon_file" class="form-control">
                          @if($errors->has('icon_file')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('icon_file') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('content') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="content">Content</label>
                        <div class="col-md-9">
                          <textarea name="content" id="content" class="summernote">{!! old('content') !!}</textarea>
                          @if($errors->has('content')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('content') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('tags') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="tags">Tags</label>
                        <div class="col-md-9">
                          <input type="text" id="tags" data-role="tagsinput" class="form-control" placeholder="Tags" name="tags" value="{{ old('tags') }}">
                          @if($errors->has('tags')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('tags') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('sorting') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="sorting">Sorting</label>
                        <div class="col-md-3">
                          <input type="number" id="sorting" class="form-control" placeholder="Sorting" name="sorting" value="{{ old('sorting') ? : $max_sorting }}">
                          @if($errors->has('sorting')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('sorting') }}</small></p> @endif
                        </div>
                      </div>

                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary mr-1">
                        <i class="icon-check2"></i> Save
                      </button>
                      <a href="{{ route('backoffice.product.index') }}" class="btn btn-default">
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
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/forms/tags/bootstrap-tagsinput.css">
@stop

@section('page-styles')
@stop

@section('vendor-js')
<script src="/backoffice/robust-assets/js/plugins/editors/summernote/summernote.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/forms/tags/bootstrap-tagsinput.min.js" type="text/javascript"></script>
@stop

@section('page-scripts')
<script type="text/javascript">

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
    $(".summernote").summernote({
      height: 300,
      placeholder: 'Some text ...',
    });

    $('input[data-slug-input]').on('input', function(){
      var input = $($(this).data('slug-input'));
      input.val($(this).slugify($(this).val()));
    });
  });
</script>
@stop