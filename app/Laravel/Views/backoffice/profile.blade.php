@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header1 row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">Edit Profile</h3>
        {{--<p class="text-muted mb-0">Edit your account details</p>--}}
      <div class="breadcrumb-wrapper col-xs-12 breadcrumb-top-dashboard">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
      </div>

      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          {{-- <a href="#" class="btn btn-outline-primary"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.imageslider.trash') }}" class="btn btn-outline-info"><i class="icon-trash2"></i> Trash</a> --}}
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
                <h4 class="card-title" id="horz-layout-basic">Profile Info</h4>
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
                 <form class="form form-horizontal" action="{{ route('backoffice.profile.update_profile') }}" method="post" enctype="multipart/form-data">

                  <div class="form-body">

                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="name">Name</label>
                      <div class="col-md-9">
                        <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ old('name', $user->name) }}">
                        @if($errors->has('name')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('name') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="email">Email</label>
                      <div class="col-md-9">
                        <input type="text" id="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
                        @if($errors->has('email')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('email') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="description">Brief Description</label>
                      <div class="col-md-9">
                        <textarea id="description" name="description" rows="7" class="form-control" placeholder="Say something ...">{{ old('desription', $user->description) }}</textarea>
                        @if($errors->has('description')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('description') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('gender') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="gender">Gender</label>
                      <div class="col-md-9">
                        {!! Form::select('gender', $genders, old('gender', $user->gender), ['id' => "gender", 'class' => "form-control"]) !!}
                        @if($errors->has('gender')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('gender') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('birthdate') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="birthdate">Birthdate</label>
                      <div class="col-md-9">
                      <input type="text" class="form-control" id="birthdate" name="birthdate" value="{{ $errors->has('birthdate') ? '' : old('birthdate', $user->birthdate) }}" placeholder="Birthdate">
                        @if($errors->has('birthdate')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('birthdate') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? "has-danger" : NULL }} row">
                      <label class="col-md-2 label-control" for="password">Current Password</label>
                      <div class="col-md-9">
                        <input type="password" id="password" class="form-control" placeholder="For security purposes, provide your password" name="password" value="{{ old('password') }}">
                        @if($errors->has('password')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('password') }}</small></p> @endif
                      </div>
                    </div>

                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn btn-info btn-radius mr-1">
                      <i class="icon-check2"></i> Save
                    </button>
                    <a href="{{ route('backoffice.index') }}" class="btn btn-danger btn-trash">
                        <i class="icon-cross2"></i> Cancel
                      </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" id="horz-layout-basic">Change Password</h4>
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
               <form class="form form-horizontal" action="{{ route('backoffice.profile.update_password') }}" method="post" enctype="multipart/form-data">

                <div class="form-body">

                  {{ csrf_field() }}

                  <div class="form-group {{ $errors->has('current_password') ? "has-danger" : NULL }} row">
                    <label class="col-md-2 label-control" for="current_password">Current Password</label>
                    <div class="col-md-9">
                      <input type="password" id="current_password" class="form-control" placeholder="Enter your current password" name="current_password" value="{{ old('current_password') }}">
                      @if($errors->has('current_password')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('current_password') }}</small></p> @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('new_password') ? "has-danger" : NULL }} row">
                    <label class="col-md-2 label-control" for="new_password">New Password</label>
                    <div class="col-md-9">
                      <input type="password" id="new_password" class="form-control" placeholder="New password" name="new_password" value="{{ old('new_password') }}">
                      @if($errors->has('new_password')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('new_password') }}</small></p> @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('new_password_confirmation') ? "has-danger" : NULL }} row">
                    <label class="col-md-2 label-control" for="new_password_confirmation">Confirm New Password</label>
                    <div class="col-md-9">
                      <input type="password" id="new_password_confirmation" class="form-control" placeholder="Re-enter new password" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}">
                      @if($errors->has('new_password_confirmation')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('new_password_confirmation') }}</small></p> @endif
                    </div>
                  </div>

                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-info btn-radius mr-1">
                    <i class="icon-check2"></i> Save
                  </button>
                  <a href="{{ route('backoffice.index') }}" class="btn btn-danger btn-trash">
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