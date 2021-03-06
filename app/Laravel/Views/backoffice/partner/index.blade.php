@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Partner</li>
        </ol>
      </div>
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title mb-0">All Partner</h3>
        <p class="text-muted mb-0">Record data of all partners in your web application.</p>
      </div>
      <div class="content-header-right col-md-6 col-xs-12">
        <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right mt-1">
          <a href="{{ route('backoffice.partner.create') }}" class="btn btn-info"><i class="icon-plus"></i> Add New</a>
          <a href="{{ route('backoffice.partner.trash') }}" class="btn btn-info"><i class="icon-trash2"></i> Trash</a>
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
                          <th>Thumbnail</th>
                          <th>Name</th>
                          <th>Sorting</th>
                          <th>Last Modified</th>
                          <th width="100px"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($partners as $index => $partner)
                        <tr>
                          <td>{{ ++$index }}</td>
                          <td> @if($partner->filename) <img style="max-width: 50px; height: auto;" src="{{ $partner->directory . '/thumbnails/' . $partner->filename }}" alt="image"> @endif </td>
                          <td>{{ $partner->name }}</td>
                          <td>{{ $partner->sorting }}</td>
                          <td>{{ $partner->updated_at->format("F d, Y") }}</td>
                          <td>
                            <!-- Single Button Dropdown -->
                            <div class="btn-group dropup">
                                <button type="button" class="btn btn-secondary btn-min-height dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('backoffice.partner.edit', [$partner->id]) }}">Edit</a>
                                    <a class="dropdown-item btn-delete" data-url="{{ route('backoffice.partner.destroy', [$partner->id]) }}" href="#">Delete</a>
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
                          <th>Thumbnail</th>
                          <th>Content</th>
                          <th>Sorting</th>
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

    $('.datatable').delegate('.btn-delete','click', function(){
        var url = $(this).data('url');
        //Warning Message
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this record!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){   
            window.location.href = url;
        });
    });
  });
</script>
@stop