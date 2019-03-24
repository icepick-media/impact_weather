@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> All Stations </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Stations</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.station.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.station.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
      </div>
    </div>
  </section>
  
  <div class="content">
    <div class="row">
      <div class="col-lg-12 connectedSortable">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> Record Data </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table class="table table-striped table-bordered bootstrap-3 datatable">
                  <thead>
                    <tr>
                      <th>Name / Station ID</th>
                      <th>No. of Farms</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($stations as $index => $station)
                    <tr>
                      <td>
                        <div><b>{{ $station->name }}</b></div>
                        <div>Loc. : <a href="#">{{$station->geo_lat}}, {{$station->geo_long}}</a> </div>
                        <div><b>{{ $station->code }}</b> <small><a target="_blank" href="{{route('metos.weather',['json'])}}?station_id={{$station->code}}">[Update Forecast]</a></small></div>
                      </td>
                      @if($station->num_farm == "0")
                      <td>{{$station->num_farm}}</td>
                      @else
                      <td><a href="{{ route('backoffice.station.edit', [$station->id]) }}"><b>{{$station->num_farm}}</b></a></td>
                      @endif
                      <td>
                        <div><small><b>Last Modified  </b><br>{{ $station->updated_at->format("F d, Y h:i A") }}</small></div>
                        <div><small><b>Farthest Forecast Fetched</b><br>{{$station->last_date?Helper::date_format($station->last_date,"F d, Y h:i A") : "n/a"}}</small></div>
                      </td>
                      <td>
                        <!-- Single Button Dropdown -->
                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-primary btn-min-height dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn btn-primary" href="{{ route('backoffice.station.edit', [$station->id]) }}">View Station Profile</a>
                                <a target="_blank" class="dropdown-item btn btn-warning" href="{{route('metos.weather',['json'])}}?station_id={{$station->code}}">Update Forecast</a>
                                <a class="dropdown-item btn-delete btn btn-danger" data-url="{{ route('backoffice.station.destroy', [$station->id]) }}" href="#">Remove Station</a>
                            </div>
                        </div>
                        <!-- /btn-group -->
                      </td>
                      @endforeach
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Name / Station ID</th>
                      <th>No. of Farms</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
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
<script type="text/javascript">

$('.btn-delete').click(function(){
    var url = $(this).data('url');
    //Warning Message
    Swal.fire({
      title: 'Are you sure?',
      text: "You will not be able to recover this record!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        window.location.href = url;
      }
    });
});
</script>

<script type="text/javascript">
  $(function(){

    $.extend( $.fn.dataTable.defaults, {
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

    $('.table-responsive').on('shown.bs.dropdown', function (e) {
        var t = $(this), 
            m = $(e.target).find('.dropdown-menu'),
            tb = t.offset().top + t.height(),
            mb = m.offset().top + m.outerHeight(true),
            d = 20; // Space for shadow + scrollbar.   
        if (t[0].scrollWidth > t.innerWidth()) {
            if (mb + d > tb) {
                t.css('padding-bottom', ((mb + d) - tb)); 
            }
        } else {
            t.css('overflow', 'visible');
        }
    }).on('hidden.bs.dropdown', function () {
        $(this).css({'padding-bottom': '', 'overflow': ''});
    });

    $('.datatable').DataTable({
        "columnDefs": [{
          "targets": [ -1 ],
          "orderable": false,
        }]
    });
  });
</script>
@stop