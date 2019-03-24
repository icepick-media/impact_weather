@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> All Users </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Users</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.user.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.user.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                      <!-- <th width="25px">ID</th> -->
                      <th>Name</th>
                      <th>Email / Contact Number</th>
                      <th>No. of Farms</th>
                      <th>Date Registered</th>
                      <th>Last Login</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                      <td>
                        <div><a href="{{route('backoffice.user.edit',[$user->id])}}"><b>{{ $user->name }}</b></a></div>
                        <div>{{ $user->username }}</div>
                      </td>
                      <td>
                        <div><small>{{ $user->email }}</small></div>
                        <div><small>{{ $user->contact }}</small></div> 
                      </td>
                      @if($user->num_farm > 0)
                      <td class="text-center"><a href="{{route('backoffice.user.edit',[$user->id])}}"><b>{{ $user->num_farm }}</b></a>
                      <div>
                        <small>
                          @if($user->station_attached)
                          @foreach($user->station_attached as $index => $station)
                          <a target="_blank" href="{{ route('backoffice.station.edit', [$station]) }}">
                            <div>{{$index}}</div><br>
                          </a>
                          @endforeach
                          @endif
                        </small>
                      </div>
                      </td>
                      @else
                      <td>{{ $user->num_farm }}</td>
                      @endif
                      <!-- <td>{{ $user->allow_weather_station }}</td> -->
                      <td><small>{{ $user->date_format($user->last_activity,"M d, Y") }}</small></td>

                      <td><small>{{ $user->created_at->format("M d, Y") }}</small></td>
                      <td>
                        <!-- Single Button Dropdown -->
                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">

                                <a target="_blank" class="dropdown-item btn btn-primary" href="{{ route('backoffice.advisory.create') }}?uid={{$user->id}}">Send Advisory</a>
                                <a class="dropdown-item btn btn-warning" href="{{ route('backoffice.user.edit', [$user->id]) }}">View Profile</a>

                                <a class="dropdown-item btn-delete btn btn-danger" data-url="{{ route('backoffice.user.destroy', [$user->id]) }}" href="#">Delete Account</a>
                            </div>
                        </div>
                        <!-- /btn-group -->
                      </td>
                      @endforeach
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <!-- <th width="25px">ID</th> -->
                      <th>Name</th>
                      <th>Email / Contact Number</th>
                      <th>No. of Farms</th>
                      <th>Date Registered</th>
                      <th>Last Login</th>
                      <th width="100px"></th>
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