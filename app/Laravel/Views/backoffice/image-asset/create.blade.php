@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('backoffice.image_asset.index') }}">Image Asset</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </div>
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">Create Image Asset</h3>
        <p class="text-muted mb-0">Add a new image to your image assets.</p>
      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.image_asset.create') }}" class="btn btn-info"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.image_asset.trash') }}" class="btn btn-info"><i class="icon-trash2"></i> Trash</a>
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
                <h4 class="card-title" id="horz-layout-basic">Image Asset Details</h4>
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

                      <div class="form-group {{ $errors->has('file') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="file">Thumbnail</label>
                        <div class="col-md-9">
                          <input type="file" id="file" name="file" class="form-control">
                          @if($errors->has('file')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('file') }}</small></p> @endif
                        </div>
                      </div>

                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary mr-1">
                        <i class="icon-check2"></i> Save
                      </button>
                      <a href="{{ route('backoffice.image_asset.index') }}" class="btn btn-default">
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
@stop