{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Reporting Service')

@section('content_header')
    <h1>Restaurant Page<small>Reporting Service</small></h1>
@stop

@section('content')
    <div class="row">
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>Restaurant</h3>

            <p>Reports</p>
          </div>
          <div class="icon">
            <i class="fa fa-coffee"></i>
          </div>
          <a href="/" class="small-box-footer">
            <i class="fa fa-arrow-circle-left"></i> Go Back
          </a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Specific Report</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <form action="/restaurant/submit" method="POST">
                @csrf
              <div class="col-md-6">
                <input type="text" class="form-control" name="id" placeholder="Restaurant ID">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="tgl" placeholder="Date">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Restaurant Report</h3>
          </div>
          <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Restaurant ID</th>
                      <th>Menu ID</th>
                      <th>Total</th>
                      <th>Tanggal Transaksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Restaurant ID</th>
                      <th>Menu ID</th>
                      <th>Total</th>
                      <th>Tanggal Transaksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
        </div>
        <!-- /.box -->
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript">
      $(document).ready(function() {
        var table = $('#dataTable').DataTable({ 
          // Load data for the table's content from an Ajax source
          "ajax": {
            'url'   : "http://b8ab4382.ngrok.io/api/reports/restaurants/get",
            'type'  : 'GET',
            'crossDomain' : 'true',
          },
          "columns": [
              {data : "id_lap_rest"},
              {data : "id_rest"},
              {data : "menu_id"},
              {data : "total"},
              {data : "tgl_transaksi"}
          ],
          initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
        });
      });
    </script>
@stop