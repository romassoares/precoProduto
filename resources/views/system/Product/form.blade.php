@extends('adminlte::page')
@section('title', 'Formulário produto')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">@if($result??'') Editar @else Cadastrar @endif Produto</div>
        <div class="card-body">
          @if($result??'')
          <form role="form" action="{{route('produto.update',$result->id)}}" method="post" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            @else
            <form name="formProduct" id="formProduct" method="post" action="{{route('produto.store')}}" enctype="multipart/form-data">
              @endif
              {!! csrf_field() !!}
              <div class="row">
                <div class="form-group col-md-4">
                  <input type="text" name="description" id="description" class="form-control" placeholder="Descrição do produto" value="{{isset($result->description)?$result->description:old('description')}}" />
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="price" id="price" class="form-control" placeholder="preço" value="{{isset($result->price)?$result->price:old('price')}}" />
                </div>
                <div class="form-group  col-md-4">
                  <input type="text" name="amount" id="amount" class="form-control" placeholder="quantidade de produto" value="{{isset($result->amount)?$result->amount:old('amount')}}">
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