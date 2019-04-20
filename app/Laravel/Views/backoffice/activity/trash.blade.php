@extends('backoffice._layouts.app')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1> Trashed Activities </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('backoffice.activity.index') }}">Farm Activities</a></li>
      <li class="active">Trash</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.activity.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.activity.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                <h3 class="box-title"> Recover Data </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table class="table table-striped table-bordered bootstrap-3 datatable">
                  <thead>
                    <tr>
                      <th>Farm Name</th>
                      <th>Crop</th>
                      <th>Variety</th>
                      <th>Activity</th>
                      <th>Last Modified</th>
                      <th width="100px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($activities as $index => $activity)
                      <tr>
                        <td>{{ $activity->farm_attached->name }}</td>
                        <td>{{ $activity->crop_attached->name }}</td>
                        <td>{{ $activity->crop_attached->variety }}</td>
                        <td>{{ $activity->activity }}</td>
                        <td>{{ $activity->updated_at->format("F d, Y") }}</td>
                        <td>
                          <!-- Single Button Dropdown -->
                          <div class="btn-group dropup">
                              <button type="button" class="btn btn-primary btn-min-height dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item btn btn-warning" href="{{ route('backoffice.activity.edit', [$activity->id]) }}">Edit</a>
                                  <a class="dropdown-item btn-delete btn btn-primary" data-url="{{ route('backoffice.activity.recover', [$activity->id]) }}" href="{{ route('backoffice.activity.recover', [$activity->id]) }}">Restore</a>
                              </div>
                          </div>
                          <!-- /btn-group -->
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Farm Name</th>
                      <th>Crop</th>
                      <th>Variety</th>
                      <th>Activity</th>
                      <th>Last Modified</th>
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
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/extensions/sweetalert.css">
<link rel="stylesheet" type="text/css" href="/backoffice/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css">
@stop

@section('page-styles')
@stop

@section('vendor-js')
<script src="/backoffice/robust-assets/js/plugins/extensions/sweetalert.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/backoffice/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
@stop

@section('page-scripts')
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

    $('.datatable').delegate('.btn-restore','click', function(){
        var url = $(this).data('url');
        //Warning Message
        swal({   
            title: "Are you sure?",   
            text: "You are about to restore this record, this action can't be undone.",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, restore this record!",   
            closeOnConfirm: false 
        }, function(){   
            window.location.href = url;
        });
    });
  });
</script>



@stop