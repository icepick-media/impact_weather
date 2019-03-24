@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> Trashed Advisory </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('backoffice.advisory.index') }}">Advisory</a></li>
      <li class="active">Trash</li>
    </ol>

    <div class="active-box">
      <div class="status">
        <a href="{{ route('backoffice.advisory.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
        <a href="{{ route('backoffice.advisory.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
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
                <table class="table table-striped table-bordered datatable">
                  <thead>
                    <tr>
                      <th width="25px">ID</th>
                      <th>Content</th>
                      <th>Deleted On</th>
                      <th width="100px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($images as $index => $image)
                    <tr>
                      <td>{{ ++$index }}</td>
                      <td title="{{ strip_tags($image->content) }}">{!! Str::limit(strip_tags($image->content), 45) ? : "<i>(Blank)</i>" !!}</td>
                      <td>{{ Carbon::parse($image->deleted_at)->format("F d, Y") }}</td>
                      <td>
                        <!-- Single Button Dropdown -->
                        <div class="btn-group dropup">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                              <button class="btn btn-warning btn-restore" data-url="{{ route('backoffice.advisory.recover', [$image->id]) }}">
                                Restore
                              </button>  
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
                      <th>Content</th>
                      <th>Deleted On</th>
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