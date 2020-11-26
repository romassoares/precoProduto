@extends('adminlte::page')
@section('title', 'Home')
@section('content_header')
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">precoProduto</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Vendas e Gastos</h3>
            </div>
            <div class="box-body">
              <div class="chart">
                  <canvas id="salesChart" style="height: 132px; width: 518px;" height="132" width="518"></canvas>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection