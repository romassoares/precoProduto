@extends('adminlte::page')
@section('title', 'Ingrediente')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Ingrediente</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div> <strong>Descrição</strong></div>
              {{$result->description}}
            </div>
            <div class="col-md-4">
              <div><strong>Und</strong></div>
              {{$result->und}}
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
          <a href="{{route('ingrediente.edit', $result->id)}}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>Editar</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection