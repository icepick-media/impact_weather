@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header1 row">
        <div class="content-header-left col-md-6 col-xs-12">
          <h3 class="content-header-title mb-0">Create User</h3>
          {{--<p class="text-muted mb-0">Add a new user to your web application.</p>--}}
          <div class="breadcrumb-wrapper col-xs-12 breadcrumb-top-dashboard">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('backoffice.user.index') }}">Users</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-xs-12">
          <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
            <a href="{{ route('backoffice.user.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
            <a href="{{ route('backoffice.user.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                <h4 class="card-title" id="horz-layout-basic">User Details</h4>
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
                        <label class="col-md-4 label-control" for="name">Name</label>
                        <div class="col-md-8">
                          <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                          @if($errors->has('name')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('name') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('email') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="email">Email</label>
                        <div class="col-md-8">
                          <input type="text" id="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                          @if($errors->has('email')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('email') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('description') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="description">Brief Description</label>
                        <div class="col-md-8">
                          <textarea id="description" name="description" rows="7" class="form-control" placeholder="Say something ...">{{ old('description') }}</textarea>
                          @if($errors->has('description')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('description') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('contact') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="contact">Contact Number</label>
                        <div class="col-md-8">
                          <input type="text" id="contact" class="form-control" placeholder="Contact Number" name="contact" value="{{ old('contact') }}">
                          @if($errors->has('contact')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('contact') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('address') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="address">Address</label>
                        <div class="col-md-8">
                          <textarea id="address" name="address" rows="7" class="form-control" placeholder="Your location ...">{{ old('address') }}</textarea>
                          @if($errors->has('address')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('address') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('gender') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="gender">Gender</label>
                        <div class="col-md-8">
                          {!! Form::select('gender', $genders, old('gender'), ['id' => "gender", 'class' => "form-control"]) !!}
                          @if($errors->has('gender')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('gender') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('birthdate') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="birthdate">Birthdate</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" id="birthdate" name="birthdate" value="{{ $errors->has('birthdate') ? '' : old('birthdate') }}" placeholder="Birthdate">
                          @if($errors->has('birthdate')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('birthdate') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('fb_id') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="fb_id">Facebook ID</label>
                        <div class="col-md-8">
                          <input type="text" id="fb_id" class="form-control" placeholder="Facebook ID" name="fb_id" value="{{ old('fb_id') }}">
                          @if($errors->has('fb_id')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('fb_id') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('password') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="password">Password</label>
                        <div class="col-md-8">
                          <input type="password" id="password" class="form-control" placeholder="New password" name="password" value="{{ old('password') }}">
                          @if($errors->has('password')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('password') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('password_confirmation') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="password_confirmation">Confirm Password</label>
                        <div class="col-md-8">
                          <input type="password" id="password_confirmation" class="form-control" placeholder="Re-enter new password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                          @if($errors->has('password_confirmation')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('password_confirmation') }}</small></p> @endif
                        </div>
                      </div>

                      <div class="form-group {{ $errors->has('allow_weather_station') ? "has-danger" : NULL }} row">
                        <label class="col-md-4 label-control" for="allow_weather_station">Weather Station</label>
                        <div class="col-md-8">
                          {!! Form::select('allow_weather_station', $allow_stations, old('allow_weather_station'), ['class' => "form-control"]) !!}
                          @if($errors->has('allow_weather_station')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('allow_weather_station') }}</small></p> @endif
                        </div>
                      </div>

                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-info btn-radius mr-1">
                        <i class="icon-check2"></i> Save
                      </button>
                      <a href="{{ route('backoffice.user.index') }}" class="btn btn-danger btn-trash">
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
<script src="/backoffice/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/pickers/daterange/daterangepicker.js" type="text/javascript"></script>
@stop

@section('page-scripts')
<script type="text/javascript">
  $(function(){
    $('#birthdate').daterangepicker({ 
      autoApply: true,
      autoUpdateInput: false,
      singleDatePicker: true,
      timePicker: false,
      locale: {
        format: 'YYYY-MM-DD'
      }
    }).on('apply.daterangepicker', function (ev, picker){
      $(this).val(picker.startDate.format("YYYY-MM-DD"));
    });
  });
</script>
@stop