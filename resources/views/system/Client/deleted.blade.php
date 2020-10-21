@extends('adminlte::page')
@section('title', 'Clientes')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Clientes excluídos</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>nome</th>
                    <th>cidade</th>
                    <th>bairro</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($result as $client)
                  <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->city}}</td>
                    <td>{{$client->district}}</td>
                    <td>
                      <div class="form-group">
                        <a href="{{route('cliente.restory',$client->id)}}" class="text-success m-1"><i class="fas fa-redo-alt"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <a href="{{route('cliente')}}"><button class="btn btn-secundary"><i class="fas fa-reply"></i> Voltar</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection