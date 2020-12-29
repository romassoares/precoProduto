@extends('adminlte::page')
@section('title', 'removidos')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Vendas excluídas</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Preço</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($result as $sale)
              <tr>
                <td>{{$sale->id}}</td>
                <td>{{$sale->client->name}}</td>
                <td>{{$sale->getPrice()}}</td>
                <td>
                  <div class="form-group">
                    <a href="{{route('venda.restory',$sale->id)}}" class="text-success m-1"><i class="fas fa-redo-alt"></i></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <a href="{{route('venda')}}"><button class="btn btn-secundary"><i class="fas fa-reply"></i> Voltar</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection