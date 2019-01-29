@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('backoffice.team.index') }}">Team</a></li>
          <li class="breadcrumb-item active">{{ $member->name }}</li>
        </ol>
      </div>
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">{{ $member->name }}</h3>
        <p class="text-muted mb-0">Edit team member details.</p>
      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.team.create') }}" class="btn btn-info"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.team.trash') }}" class="btn btn-info"><i class="icon-trash2"></i> Trash</a>
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
                <h4 class="card-title" id="horz-layout-basic">Team Member Details</h4>
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
                        <label class="col-md-2 label-control" for="name">Name</label>
                        <div class="col-md-9">
                          <input type="text" id="name" class="form-control" placeholder="Name" data-slug-input="#slug" name="name" value="{{ old('name', $member->name) }}">
                          @if($errors->has('name')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('name') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('slug') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="slug">Slug</label>
                        <div class="col-md-9">
                          <input type="text" id="slug" class="form-control" placeholder="Slug" name="slug" value="{{ old('slug', $member->slug) }}">
                          @if($errors->has('slug')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('slug') }}</small></p> @endif
                        </div>
                      </div>

                      @if($member->filename)
                      <div class="form-group row">
                        <label class="col-md-2 label-control" for="">Current Thumbnail</label>
                        <div class="col-xl-6 col-md-6 col-xs-12">
                          <div class="card box-shadow-1">
                            <div class="text-xs-center">
                                <div class="card-block">
                                    <img src="{{ $member->directory . "/resized/" . $member->filename }}" class="" style="width: 100%;" alt="{{ $member->title }}">
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

                      <div class="form-group {{ $errors->has('position') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="position">Position</label>
                        <div class="col-md-9">
                          <input type="text" id="position" class="form-control" placeholder="Position" name="position" value="{{ old('position', $member->position) }}">
                          @if($errors->has('position')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('position') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('description') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="description">Description</label>
                        <div class="col-md-9">
                          <textarea name="description" id="description" class="form-control" placeholder="Description" rows="7">{{ old('description', $member->description) }}</textarea>
                          @if($errors->has('description')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('description') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('facebook') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="facebook">Facebook</label>
                        <div class="col-md-9">
                          <input type="text" id="facebook" class="form-control" placeholder="Facebook" name="facebook" value="{{ old('facebook', $member->facebook) }}">
                          @if($errors->has('facebook')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('facebook') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('twitter') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="twitter">Twitter</label>
                        <div class="col-md-9">
                          <input type="text" id="twitter" class="form-control" placeholder="Twitter" name="twitter" value="{{ old('twitter', $member->twitter) }}">
                          @if($errors->has('twitter')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('twitter') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('linked_in') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="linked_in">Linked In</label>
                        <div class="col-md-9">
                          <input type="text" id="linked_in" class="form-control" placeholder="Linked In" name="linked_in" value="{{ old('linked_in', $member->linked_in) }}">
                          @if($errors->has('linked_in')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('linked_in') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('sorting') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="sorting">Sorting</label>
                        <div class="col-md-3">
                          <input type="number" id="sorting" class="form-control" placeholder="Sorting" name="sorting" value="{{ old('sorting', $member->sorting) }}">
                          @if($errors->has('sorting')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('sorting') }}</small></p> @endif
                        </div>
                      </div>

                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary mr-1">
                        <i class="icon-check2"></i> Save
                      </button>
                      <a href="{{ route('backoffice.team.index') }}" class="btn btn-default">
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