@extends('adminlte::page')
@section('title', 'Ingrediente')
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
              <h3 class="card-title">Ingredientes</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Descri.</th>
                    <th>Qnt</th>
                    <th>R$</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                @php $i = 0; @endphp
                  @foreach($result as $ingredient)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$ingredient->description}}</td>
                    <td>{{$ingredient->amount}}{{$ingredient->und}}</td>
                    <td>R$ {{$ingredient->getPrice()}}</td>
                    <td>
                      <div class="form-group">
                        <a href="{{route('ingrediente.show',$ingredient->id)}}" class="text-primary m-1"><i class="fas fa-eye"></i></a>
                        <a href="{{route('ingrediente.edit',$ingredient->id)}}" class="text-warning m-2"><i class="fas fa-edit"></i></a>
                        <a href="{{route('ingrediente.remove',$ingredient->id)}}" class="text-danger m-1"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            {{ $result->links() }}
            </div>
            <div class="card-footer">
              <a href="/ingrediente/novo"><button class="btn btn-primary"><i class="fas fa-plus"></i> Novo</button></a>
              <a href="/ingrediente/removidos" > <button class="btn btn-primary" > <i class="fas fa-archive" ></i> Arquivos Removidos</button> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection