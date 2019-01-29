@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('backoffice.recommendation.index') }}">Recommendations</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </div>
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">Create Recommendation</h3>
        <p class="text-muted mb-0">Add a new recommendation to your web application.</p>
      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.recommendation.create') }}" class="btn btn-info"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.recommendation.trash') }}" class="btn btn-info"><i class="icon-trash2"></i> Trash</a>
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
                <h4 class="card-title" id="horz-layout-basic">Recommendation Details</h4>
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
                        <label class="col-md-2 label-control" for="title">Type</label>
                        <div class="col-md-9">
                          {!! Form::select('type', $types, old('type'), ['id' => "type", 'class' => "form-control"]) !!}
                          @if($errors->has('title')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('title') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('title') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="title">Title</label>
                        <div class="col-md-9">
                          <input type="text" id="title" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}">
                          @if($errors->has('title')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('title') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('content') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="content">Content</label>
                        <div class="col-md-9">
                          <textarea name="content" id="content" class="form-control" rows="7">{{ old('content') }}</textarea>
                          @if($errors->has('content')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('content') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('criteria') ? "has-danger" : NULL }} row">
                        <label class="col-md-2 label-control" for="criteria">Criteria</label>
                        <div class="col-md-9">

                          <div class="row">
                            <div class="col-md-6">
                              <fieldset>
                                  <label>Temperature (°C)</label>
                                  <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Min" name="temp_min" value="{{ old('temp_min') }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Max" name="temp_max" value="{{ old('temp_max') }}">
                                      </div>
                                    </div>
                                  </div>
                              </fieldset>
                              <fieldset>
                                  <label>Relative Humidity (%)</label>
                                  <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Min" name="humidity_min" value="{{ old('humidity_min') }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Max" name="humidity_max" value="{{ old('humidity_max') }}">
                                      </div>
                                    </div>
                                  </div>
                              </fieldset>
                              <fieldset>
                                  <label>Wind Speed (km/h)</label>
                                  <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Min" name="wind_speed_min" value="{{ old('wind_speed_min') }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Max" name="wind_speed_max" value="{{ old('wind_speed_max') }}">
                                      </div>
                                    </div>
                                  </div>
                              </fieldset>
                            </div>

                            <div class="col-md-6">
                              <fieldset>
                                  <label>Probability of Precipitation (%)</label>
                                  <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Min" name="prob_of_precip_min" value="{{ old('prob_of_precip_min') }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Max" name="prob_of_precip_max" value="{{ old('prob_of_precip_max') }}">
                                      </div>
                                    </div>
                                  </div>
                              </fieldset>
                              <fieldset>
                                  <label>Precipitation (mm)</label>
                                  <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Min" name="precipitation_min" value="{{ old('precipitation_min') }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Max" name="precipitation_max" value="{{ old('precipitation_max') }}">
                                      </div>
                                    </div>
                                  </div>
                              </fieldset>
                            </div>
                          </div>
                          
                          @if($errors->has('criteria')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('criteria') }}</small></p> @endif
                        </div>
                      </div>

                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary mr-1">
                        <i class="icon-check2"></i> Save
                      </button>
                      <a href="{{ route('backoffice.recommendation.index') }}" class="btn btn-default">
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