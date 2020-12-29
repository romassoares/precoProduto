@extends('adminlte::page')
@section('title', 'Produto')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Produtos</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-condensed">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Qnt</th>
                <th>R$</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 0; @endphp
              @foreach($result as $product)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->getAmount()}}{{$product->und}}</td>
                <td>R$ {{$product->getPrice()}}</td>
                <td>
                  <div class="form-group">
                    <a href="{{route('produto.show',$product->id)}}" class="text-primary m-1"><i class="fas fa-eye"></i></a>
                    <a href="{{route('produto.edit',$product->id)}}" class="text-warning m-1"><i class="fas fa-edit"></i></a>
                    <a href="{{route('produto.remove',$product->id)}}" class="text-danger m-1"><i class="fas fa-archive"></i></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-md-4">
              <a href="/produto/novo"><button class="btn btn-success"><i class="fas fa-plus"></i> Novo</button></a>
            </div>
            <div class="col-md-4">
              {{ $result->links() }}
            </div>
            <div class="col-md-4">
              <a href="{{route('produto.archive')}}"> <button class="btn btn-danger"> <i class="fas fa-archive"></i> Arquivos Removidos</button> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection