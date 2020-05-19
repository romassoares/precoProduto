@extends('adminlte::page')
@section('title', 'Home')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Cadastrar Produto</div>
        <div class="card-body">
          <form name="formProduct" id="formProduct" method="POST" action="{{url('produto')}}">
            @csrf
            <div class="row">
              <div class="form-group col-md-4">
                <input type="text" name="description" id="description" class="form-control" placeholder="Descrição do produto">
              </div>
              <div class="form-group col-md-4">
                <input type="text" name="price" id="price" class="form-control" placeholder="preço">
              </div>
              <div class="form-group  col-md-4">
                <input type="text" name="amount" id="amount" class="form-control" placeholder="quantidade de produto">
              </div>
            </div>
            <button class="btn btn-info" type="submit">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection