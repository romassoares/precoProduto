@extends('adminlte::page')
@section('title', 'Ingredientes')
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
              <h3 class="card-title">Ingredientes excluídos</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Und</th>
                    <th>Qnt</th>
                    <th>Preço</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($result as $ingredient)
                  <tr>
                    <td>{{$ingredient->id}}</td>
                    <td>{{$ingredient->description}}</td>
                    <td>{{$ingredient->und}}</td>
                    <td>{{$ingredient->amount}}</td>
                    <td>R$ {{$ingredient->getPrice()}}</td>
                    <td>
                      <div class="form-group">
                        <a href="{{route('ingrediente.restory',$ingredient->id)}}" class="text-success m-1"><i class="fas fa-redo-alt"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <a href="{{route('ingrediente')}}"><button class="btn btn-secundary"><i class="fas fa-reply"></i> Voltar</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection