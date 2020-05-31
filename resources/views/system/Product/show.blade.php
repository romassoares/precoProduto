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
            <div class="col-md-6">
              <div> <strong>Descrição</strong></div>
              {{$result->description}}
            </div>
            <div class="col-md-3">
              <div><strong>Quantidade</strong></div>
              {{$result->amount}}{{$result->und}}
            </div>
            <div class="col-md-3">
              <div><strong>Preço</strong></div>
              R$ {{$result->getPrice()}}
            </div>
          </div>
          <a href="{{route('produto.edit', $result->id)}}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>Editar</button></a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">Ingredientes</div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Launch demo modal
        </button>
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
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($ingredients??'')
        <div class="row">
        @foreach($ingredients as $ingredient)
          <div class="form-group">
            <input type="checkbox" name="description" id="description" value="{{$ingredient->id}}"> 
            <label>{{$ingredient->description}}</label>
            <label>{{$ingredient->amount}}{{$ingredient->und}}</label>
            </div>
            @endforeach
          </div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection