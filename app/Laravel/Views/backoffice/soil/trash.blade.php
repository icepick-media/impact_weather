@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> Trashed Soils </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('backoffice.soil.index') }}"><i class="fa fa-dashboard"></i> Soils</a></li>
      <li class="active">Create</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.soil.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.soil.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                <h3 class="box-title"> Trashed Data </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table class="table table-striped table-bordered datatable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Variety</th>
                      <th>Deleted On</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($soils as $index => $soil)
                      <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $soil->name }}</td>
                        <td>{{ $soil->code }}</td>
                        <td>{{ $soil->variety }}</td>
                        <td>{{ Carbon::parse($soil->deleted_at)->format("F d, Y") }}</td>
                        <td>
                          <!-- Single Button Dropdown -->
                          <div class="btn-group dropup">
                              <button type="button" class="btn btn-primary btn-min-height dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                              <div class="dropdown-menu">
                                  {{-- <a class="dropdown-item" href="{{ route('backoffice.soil.edit', [$soil->id]) }}">Edit</a> --}}
                                  <a class="dropdown-item btn btn-warning btn-restore" data-url="{{ route('backoffice.soil.recover', [$soil->id]) }}" href="#">Restore</a>
                              </div>
                          </div>
                          <!-- /btn-group -->
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Variety</th>
                      <th>Deleted On</th>
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

$('.btn-restore').click(function(){
    var url = $(this).data('url');
    //Warning Message
    Swal.fire({
      title: 'Are you sure?',
      text: "You are about to restore this record, this action can't be undone.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, restore this record!'
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