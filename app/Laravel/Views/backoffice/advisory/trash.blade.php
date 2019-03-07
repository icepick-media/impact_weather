@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header1 row">
        <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">Trashed Advisory</h3>
        {{--<p class="text-muted mb-0">Record advisory.</p>--}}
          <div class="breadcrumb-wrapper col-xs-12 breadcrumb-top-dashboard">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('backoffice.advisory.index') }}">Advisory</a></li>
                  <li class="breadcrumb-item active">Trash</li>
              </ol>
          </div>
      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.advisory.create') }}" class="btn btn-info btn-radius"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.advisory.trash') }}" class="btn btn-danger btn-trash"><i class="icon-trash2"></i> Trash</a>
        </div>
      </div>
      <div class="content-header-lead col-xs-12 mt-1">
        <p class="lead">
          {{-- Page Lead Paragraph --}}
        </p>
      </div>
    </div>
    <div class="content-body">
      <!-- Bootstrap 3 table -->
      <section id="bootstrap3">
        <div class="row">
          <div class="col-xs-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Record Data</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    {{-- <li><a data-action="close"><i class="icon-cross2"></i></a></li> --}}
                  </ul>
                </div>
              </div>
              <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                  <p class="card-text">
                    {{-- DataTables can integrate seamlessly with Bootstrap 3 using Bootstrap's table styling options to present an interface with a uniform design, based on Bootstrap, for your site / app. --}}
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered bootstrap-3 datatable">
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
                                <button type="button" class="btn btn-secondary btn-min-height dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                <div class="dropdown-menu">
                                    {{-- <a class="dropdown-item" href="{{ route('backoffice.advisory.edit', [$image->id]) }}">Edit</a> --}}
                                    <a class="dropdown-item btn-restore" data-url="{{ route('backoffice.advisory.recover', [$image->id]) }}" href="#">Restore</a>
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
      </section>
      <!--/ Bootstrap 3 table -->
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