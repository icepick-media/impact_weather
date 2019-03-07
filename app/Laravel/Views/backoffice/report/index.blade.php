@extends('backoffice._layouts.app')
@section('content')
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header1 row">
        <div class="content-header-left col-md-6 col-xs-12">
            <h3 class="content-header-title mb-0">All Reports</h3>
            {{--<p class="text-muted mb-0">Record data of all reports.</p>--}}
              <div class="breadcrumb-wrapper col-xs-12 breadcrumb-top-dashboard">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
                  <li class="breadcrumb-item active">Reports</li>
                </ol>
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
                          <th width="40%">Content</th>
                          <th>Reported By</th>
                          <th>Farm</th>
                          <th>Date Reported</th>

                          <!-- <th width="100px"></th> -->
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($reports as $index => $report)
                        <tr>
                          <td>
                            {{ $report->content }}
                            <div><small><a target="_blank" href="{{"{$report->directory}/resized/{$report->filename}"}}">[View Attachement]</a></small></div>

                          </td>
                          <td>
                            <a href="{{route('backoffice.user.edit',[$report->user_id])}}" target="_blank">{{ $report->user?$report->user->name:"n/a" }}</a>
                          </td>
                          <td>
                            @if($report->farm)
                            <a target="_blank" href="{{route('backoffice.user.farm',[$report->farm->user_id,$report->farm->id])}}">{{$report->farm->name}}</a>
                            @else
                            n/a
                            @endif
                          </td>
                          <td>{{ $report->created_at->format("F d, Y") }}</td>
                          {{--<td>
                            <div class="btn-group dropup">
                                <button type="button" class="btn btn-secondary btn-min-height dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('backoffice.report.show', [$report->id]) }}">View Report</a>
                                </div>
                            </div>
                            <!-- /btn-group -->
                          </td>--}}
                          @endforeach
                        </tr>
                      </tbody>
                    </table>  
                    {!!$reports->render()!!}
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
<style type="text/css">
  ul.pagination li {
      display: inline;
      font-size: 12px;
      font-weight: bold;
  }

  ul.pagination li a {

      color: black;
      padding: 8px 8px;
      text-decoration: none;
      transition: background-color .3s;
      border: 1px solid #ddd;
      margin: 4px;
  }

  ul.pagination li a.active {
      background-color: #4CAF50;
      padding: 8px 8px;
      margin: 4px;
      color: white;
      border: 1px solid #4CAF50;
  }

  ul.pagination li.active {
      /*background-color: #4CAF50;*/
      background-color: #687282;
      padding: 8px 8px;
      margin: 4px;
      color: white;
      border: 1px solid #4CAF50;
  }

  /*ul.pagination li a:hover:not(.active) {background-color: #ddd;}*/
  ul.pagination li a:hover {background-color: #999999;}

  ul.pagination li.disabled {
      /*background-color: #cccccc;*/
      color: #ddd;
      padding: 8px 8px;
      border: 1px solid #ddd;
      margin: 4px;
  }
</style>
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