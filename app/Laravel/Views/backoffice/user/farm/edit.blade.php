@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> Farm Profile </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('backoffice.user.index') }}">Users</a></li>
      <li><a href="{{ route('backoffice.user.edit',[$user->id]) }}">{{ $user->name }} Profile</a></li>
      <li class="active">{{Str::upper($farm->name .": ".$farm->crop_display)}}</li>
    </ol>
  </section>
    
  <div class="content">
    <div class="row">
      <div class="col-lg-12 connectedSortable">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> Edit Farm Profile </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form class="form form-horizontal" action="" method="post" enctype="multipart/form-data">

                  <div class="form-body">

                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? "has-danger" : NULL }} row">
                      <label class="col-md-4 label-control" for="name">Farm Name</label>
                      <div class="col-md-8">
                        <input type="text" id="name" class="form-control" placeholder="New Farm Name" name="name" value="{{ old('name',$farm->name) }}">
                        @if($errors->has('name')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('name') }}</small></p> @endif
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('station_id') ? "has-danger" : NULL }} row">
                      <label class="col-md-4 label-control" for="station_id">Station Attached</label>
                      <div class="col-md-8">
                        <select name="station_id" id="station_id" class="form-control">
                          @foreach($stations as $index => $station)
                          <option value="{{$station}}" {{$station == $farm->station_id ? 'selected="selected"' : NULL}}>{{$index}}</option>
                          @endforeach
                        </select>
                        @if($errors->has('station_id')) <p class="text-xs-left"><small class="danger text-muted">{{ $errors->first('station_id') }}</small></p> @endif
                      </div>
                    </div>

                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary mr-1">
                      <i class="icon-check2"></i> Save Changes
                    </button>
                    <a href="{{ route('backoffice.user.farm',[$user->id,$farm->id]) }}" class="btn btn-default">
                      <i class="icon-cross2"></i> Cancel
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
@stop