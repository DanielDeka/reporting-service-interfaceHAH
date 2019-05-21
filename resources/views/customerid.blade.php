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
        <div class="small-box bg-green">
          <div class="inner">
            <h3>Customer</h3>

            <p>Reports</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="/" class="small-box-footer">
            <i class="fa fa-arrow-circle-left"></i> Go Back
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Specific Report</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <form action="/customer/submit" method="POST">
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
      @if($data == null)
      <h3> Data is Empty!</h3>
      @endif
      @foreach($data as $data)
      <div class="col-md-4">
        <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-yellow">
            <div class="widget-user-image">
              
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">Customer #{{$data->id_cust}}</h3>
            <h5 class="widget-user-desc">The Lorem Ipsum Customer!</h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a href="#">Tanggal <span class="pull-right badge bg-blue">{{$data->tgl_transaksi}}</span></a></li>
              <li><a href="#">Menu <span class="pull-right badge bg-aqua">{{$data->menu_id}}</span></a></li>
              <li><a href="#">Total <span class="pull-right badge bg-green">{{$data->total}}</span></a></li>
              <li><a href="#">ID Laporan <span class="pull-right badge bg-red">{{$data->id_lap_cust}}</span></a></li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop