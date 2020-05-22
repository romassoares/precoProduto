@extends('adminlte::page')
@section('title', 'Produto')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Produto</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div> <strong>Descrição</strong></div>
              {{$result->description}}
            </div>
            <div class="col-md-4">
              <div><strong>Quantidade</strong></div>
              {{$result->amount}}
            </div>
            <div class="col-md-4">
              <div><strong>Preço</strong></div>
              R$ {{$result->getPrice()}}
            </div>
          </div>
          <a href="{{route('produto.edit', $result->id)}}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>Editar</button></a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">Ingredientes</div>
        <div class="card-body">
          <div class="row">
            <div class="form-group">
              <table>
                <tr>
                  <th>*</th>
                  <th>Descrição</th>
                  <th>Qnt</th>
                  <th>R$ Gasto</th>
                </tr>
                @foreach($ingredients as $ingredient)
                <tr>
                  <th>{{$ingredient->id}}</th>
                  <th>{{$ingredient->description}}</th>
                  <th>{{$ingredient->qnt}}</th>
                  <th>{{$ingredient->getPriceSpent()}}</th>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection