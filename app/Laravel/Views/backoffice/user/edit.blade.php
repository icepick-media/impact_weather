@extends('backoffice._layouts.app')
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1> Edit {{ $user->name }} </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('backoffice.user.index') }}">Users</a></li>
      <li class="active">Edit {{ $user->name }}</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.advisory.create') }}?uid={{$user->id}}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Send New Advisory</a>
      </div>
    </div>
  </section>
    
  <div class="content">
    <div class="row">
      <div class="col-lg-6 connectedSortable">
        <div class="row">
          <div class="col-md-12">
            @if(Input::get('update_profile','no') == "yes")
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> {{ $user->name }} </h3>
                </div>
                
                <div class="box-body">
                  <div class="form-body">
                    <form class="form form-horizontal" action="{{ route('backoffice.user.update_profile', [$user->id]) }}" method="post" enctype="multipart/form-data">

                      <div class="form-body">

                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="name">Name</label>
                          <div class="col-md-8">
                            <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ old('name', $user->name) }}">
                            @if($errors->has('name')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('name') }}</small></p> @endif
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="email">Email</label>
                          <div class="col-md-8">
                            <input type="text" id="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
                            @if($errors->has('email')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('email') }}</small></p> @endif
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="description">Brief Description</label>
                          <div class="col-md-8">
                            <textarea id="description" name="description" rows="7" class="form-control" placeholder="Say something ...">{{ old('description', $user->description) }}</textarea>
                            @if($errors->has('description')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('description') }}</small></p> @endif
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('contact') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="contact">Contact Number</label>
                          <div class="col-md-8">
                            <input type="text" id="contact" class="form-control" placeholder="Contact Number" name="contact" value="{{ old('contact', $user->contact) }}">
                            @if($errors->has('contact')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('contact') }}</small></p> @endif
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('address') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="address">Address</label>
                          <div class="col-md-8">
                            <textarea id="address" name="address" rows="7" class="form-control" placeholder="Your location ...">{{ old('address', $user->address) }}</textarea>
                            @if($errors->has('address')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('address') }}</small></p> @endif
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('gender') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="gender">Gender</label>
                          <div class="col-md-8">
                            {!! Form::select('gender', $genders, old('gender', $user->gender), ['id' => "gender", 'class' => "form-control"]) !!}
                            @if($errors->has('gender')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('gender') }}</small></p> @endif
                          </div>
                        </div>

                        <div class="form-group {{ $errors->has('birthdate') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="birthdate">Birthdate</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="birthdate" name="birthdate" value="{{ $errors->has('birthdate') ? '' : old('birthdate', $user->birthdate) }}" placeholder="Birthdate">
                            @if($errors->has('birthdate')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('birthdate') }}</small></p> @endif
                          </div>
                        </div>

                        {{--<div class="form-group {{ $errors->has('fb_id') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="fb_id">Facebook ID</label>
                          <div class="col-md-8">
                            <input type="text" id="fb_id" class="form-control" placeholder="Facebook ID" name="fb_id" value="{{ old('fb_id', $user->fb_id) }}">
                            @if($errors->has('fb_id')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('fb_id') }}</small></p> @endif
                          </div>
                        </div>--}}

                        <div class="form-group {{ $errors->has('allow_weather_station') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="allow_weather_station">Weather Station</label>
                          <div class="col-md-8">
                            {!! Form::select('allow_weather_station', $allow_stations, old('allow_weather_station',$user->allow_weather_station), ['class' => "form-control"]) !!}
                            @if($errors->has('allow_weather_station')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('allow_weather_station') }}</small></p> @endif
                          </div>
                        </div>

                        {{-- <div class="form-group {{ $errors->has('password') ? "has-danger" : NULL }} row">
                          <label class="col-md-4 label-control" for="password">Current Password</label>
                          <div class="col-md-8">
                            <input type="password" id="password" class="form-control" placeholder="For security purposes, provide your password" name="password" value="{{ old('password') }}">
                            @if($errors->has('password')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('password') }}</small></p> @endif
                          </div>
                        </div> --}}

                      </div>

                      <div class="form-actions">
                        <button type="submit" class="btn btn-info btn-radius mr-1">
                          <i class="icon-check2"></i> Update Profile
                        </button>
                        <a href="{{ route('backoffice.user.edit',[$user->id]) }}" class="btn btn-danger btn-trash">
                          <i class="icon-cross2"></i> Cancel
                        </a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @if(Auth::user()->type == "super_user")
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title"> Reset Password </h3>
                  </div>
                  
                  <div class="box-body">
                    <div class="form-body">
                      <form class="form form-horizontal" action="{{ route('backoffice.user.update_password', [$user->id]) }}" method="post" enctype="multipart/form-data">

                        <div class="form-body">

                          {{ csrf_field() }}

                          <div class="form-group {{ $errors->has('new_password') ? "has-danger" : NULL }} row">
                            <label class="col-md-4 label-control" for="new_password">New Password</label>
                            <div class="col-md-8">
                              <input type="password" id="new_password" class="form-control" placeholder="New password" name="new_password" value="{{ old('new_password') }}">
                              @if($errors->has('new_password')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('new_password') }}</small></p> @endif
                            </div>
                          </div>

                          <div class="form-group {{ $errors->has('new_password_confirmation') ? "has-danger" : NULL }} row">
                            <label class="col-md-4 label-control" for="new_password_confirmation">Confirm New Password</label>
                            <div class="col-md-8">
                              <input type="password" id="new_password_confirmation" class="form-control" placeholder="Re-enter new password" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}">
                              @if($errors->has('new_password_confirmation')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('new_password_confirmation') }}</small></p> @endif
                            </div>
                          </div>

                        </div>

                        <div class="form-actions">
                          <button type="submit" class="btn btn-primary mr-1">
                            <i class="icon-check2"></i> Update Password
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              @endif
            @else
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> {{ $user->name }} </h3>
                </div>
                
                <div class="box-body">
                    <div class="form-body">
                      <h3>Basic Information</h3>
                      <h5>Name</h5>
                      <p>{{$user->name}}</p>

                      <hr>
                      <h3>Contact Information</h3>
                      <h5>Email Address</h5>
                      <p>{{$user->email}}</p>

                      <h5>Phone Number</h5>
                      <p>{{$user->contact}}</p>
                      <div class="form-actions">
                        <a href="{{route('backoffice.user.edit',[$user->id])}}?update_profile=yes" class="btn btn-primary mr-1">
                          <i class="icon-cog"></i> Edit Profile
                        </a>
                      </div>
                    </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>

      <div class="col-lg-6 connectedSortable">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> Farm geolocation </h3>
              </div>
              
              <div class="box-body">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12 connectedSortable">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> Farms </h3>
              </div>
              
              <div class="box-body">
                <table class="table table-striped table-bordered bootstrap-3 datatable">
                  <thead>
                    <tr>
                      <th>Farm</th>
                      <th>Crops & Variety</th>
                      <th>Date Added</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($user->farms as $index => $farm)
                    <tr>
                      <td>
                        <div>
                          <small>
                            {{Str::upper($farm->name)}}
                          </small>
                        </div>
                      </td>
                      <!-- <td><a href="{{route('backoffice.station.edit',[$farm->station_id])}}">{{$farm->station?$farm->station->code:"n/a"}}</a></td> -->
                      <td>
                        <div>
                          <small>
                            [{{Str::upper($farm->crop_display)}}]
                          </small>
                        </div>
                      </td>
                      <td>{{$farm->created_at->format("M d, Y")}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3">No record found.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> Recent Activity Report </h3>
              </div>
              
              <div class="box-body table-responsive">
                <table class="table table-striped table-bordered bootstrap-3 datatable">
                  <thead>
                    <tr>
                      <th>Farm/Crop - Variety</th>
                      <th width="50%">Activity</th>
                      <th>Date Added</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($last_activty as $index => $activity)
                    <tr>
                      <td><small>{{Str::upper(($activity->farm?$activity->farm->name:"n/a") .": ".($activity->farm?$activity->farm->crop_display:"n/a"))}} [<a href="{{route('backoffice.user.farm',[$user->id,$activity->farm_id])}}">View All Activity</a>]</small></td>
                      <td>
                        <div><b>{{$activity->title}}</b></div>
                        @if($activity->brand)
                        <div><small>Brand : {{$activity->brand}}</small></div>
                        @endif
                        <div><small>Qty : {{$activity->qty}}</small></div>
                      </td>
                      <td>{{$activity->created_at->format("M d, Y")}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3">No activity report yet.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
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
@stop