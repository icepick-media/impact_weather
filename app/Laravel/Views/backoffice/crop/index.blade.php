@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> All Crops </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Crop</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.crop.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.crop.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                      <th width="25px">ID</th>
                      <th>Name</th>
                      <th>Variety</th>
                      <th>Allow in app</th>
                      <th>Last Modified</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($crops as $index => $crop)
                    <tr>
                      <td>{{ ++$index }}</td>
                      <td>{{ $crop->name }}</td>
                      <td>{{ $crop->variety }}</td>
                      <td>{{ $crop->status }}</td>
                      <td>{{ $crop->updated_at->format("F d, Y") }}</td>
                      <td>
                        <!-- Single Button Dropdown -->
                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-primary btn-min-height dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn btn-warning" href="{{ route('backoffice.crop.edit', [$crop->id]) }}">Edit</a>
                                <a class="dropdown-item btn-delete btn btn-danger" data-url="{{ route('backoffice.crop.destroy', [$crop->id]) }}" href="#">Delete</a>
                            </div>
                        </div>
                        <!-- /btn-group -->
                      </td>
                      @endforeach
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th width="25px">ID</th>
                      <th>Name</th>
                      <th>Variety</th>
                      <th>Allow in app</th>
                      <th>Last Modified</th>
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
<script>

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