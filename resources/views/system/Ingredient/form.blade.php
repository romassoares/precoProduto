@extends('adminlte::page')
@section('title', 'Formulário ingrediente')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">@if($result??'') Editar @else Cadastrar @endif ingrediente</div>
        <div class="card-body">
          @if($result??'')
          <form role="form" action="{{route('ingrediente.update',$result->id)}}" method="post" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            @else
            <form name="formIngredient" id="formIngredient" method="post" action="{{route('ingrediente.store')}}" enctype="multipart/form-data">
              @endif
              {!! csrf_field() !!}
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="description">Descrição</label>
                  <input type="text" name="description" id="description" class="form-control" placeholder="Descrição do ingrediente" value="{{isset($result->description)?$result->description:old('description')}}" />
                </div>
                <div class="form-group col-md-4">
                  <label for="und">Unidade de medida</label>
                  <input type="text" name="und" id="und" class="form-control" placeholder="Unidade de medida" value="{{isset($result->und)?$result->und:old('und')}}" />
                </div>
                <div class="form-group col-md-4">
                  <label for="price">preço</label>
                  <input type="text" name="price" id="price" class="form-control" placeholder="preço" value="{{isset($result->price)?$result->price:old('price')}}" />
                </div>
                <div class="form-group  col-md-4">
                  <label for="amount">quantidade</label>
                  <input type="text" name="amount" id="amount" class="form-control" placeholder="quantidade de ingrediente" value="{{isset($result->amount)?$result->amount:old('amount')}}">
                </div>
              </div>
              <button class="btn btn-{{($result??'')?'warning':'info'}}" type="submit">@if($result??'') Editar @else Cadastrar @endif</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection