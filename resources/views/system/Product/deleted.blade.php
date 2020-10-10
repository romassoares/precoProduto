@extends('adminlte::page')
@section('title', 'Produto')
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
              <h3 class="card-title">Produtos excluídos</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>nome</th>
                    <th>qnt</th>
                    <th>Valor</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($result as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->amount}}</td>
                    <td>R$ {{$product->getPrice()}}</td>
                    <td>
                      <div class="form-group">
                        <a href="{{route('produto.restory',$product->id)}}" class="text-success m-1"><i class="fas fa-redo-alt"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <a href="{{route('produto')}}"><button class="btn btn-secundary"><i class="fas fa-reply"></i> Voltar</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection