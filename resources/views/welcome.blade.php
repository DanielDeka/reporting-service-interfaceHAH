{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Reporting Service')

@section('content_header')
    <h1>Dashboard<small>Reporting Service</small></h1>
@stop

@section('content')
    <div class="row">
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
                <a href="/restaurant" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
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
                <a href="/customer" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop