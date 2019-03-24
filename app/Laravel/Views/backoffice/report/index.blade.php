@extends('backoffice._layouts.app')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <h1> All Reports </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('backoffice.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Reports</li>
    </ol>
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
                            <button type="button" class="btn btn-primary btn-min-height dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn btn-danger" href="{{ route('backoffice.report.show', [$report->id]) }}">View Report</a>
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
  </div>
</div>
@stop

@section('vendor-css')
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
  });
</script>
@stop