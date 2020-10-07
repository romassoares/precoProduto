@extends('adminlte::page')
@section('title', 'Formulário ingrediente')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">@if($result ??'') Editar @else Cadastrar @endif ingrediente</div>
        <div class="card-body">
          @if($result ??'')
          <form role="form" action="{{route('ingrediente.update',$result->id)}}" method="post" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            @else
            <form name="formIngredient" id="formIngredient" method="post" action="{{route('ingrediente.store')}}" enctype="multipart/form-data">
              @endif
              {!! csrf_field() !!}
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="description">Descrição</label>
                  <input type="text" name="description" id="description" class="form-control" placeholder="Descrição do ingrediente" value="{{isset($result->description)?$result->description:old('description')}}" />
                  @error('description')
                    <p class="text-danger">{{$message??''}}</p>
                  @enderror
                </div>
                <div class="form-group  col-md-6">
                  <label for="amount">quantidade</label>
                  <input type="text" name="amount" id="amount" class="form-control" placeholder="quantidade de ingrediente" value="{{isset($result->amount)?$result->amount:old('amount')}}">
                  @error('amount')
                    <p class="text-danger">{{$message??''}}</p>
                  @enderror
                </div>
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                  <label for="und">Unidade de Medida</label>
                  <select name="und" id="und" class="form-control">
                    <option {{ ($result->und ?? '' === 'kg') ? 'selected':''}} value="kg">Kg</option>
                    <option {{($result->und ?? '' === 'g') ? 'selected':''}} value="g">grama</option>
                    <option {{($result->und ?? '' === 'cm') ? 'selected':''}} value="cm">centimetro</option>
                    <option {{($result->und ?? '' === 'm') ? 'selected':''}} value="m">metro</option>
                    <option {{($result->und ?? '' === 'cm³') ? 'selected':''}} value="cm³">centimentro cubico</option>
                    <option {{($result->und ?? '' === 'cm²') ? 'selected':''}} value="cm²">centimetro quadrado</option>
                    <option {{($result->und ?? '' === 'l') ? 'selected':''}} value="l">litro</option>
                    <option {{($result->und ?? '' === 'f') ? 'selected':''}} value="f">fatia</option>
                    <option {{($result->und ?? '' === 'pct') ? 'selected':''}} value="pct">pacote</option>
                    <option {{($result->und ?? '' === 'und') ? 'selected':''}} value="und">unidade</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="price">preço</label>
                  <input type="text" name="price" id="price" class="form-control" placeholder="preço" value="{{isset($result->price)?$result->price:old('price')}}" />
                  @error('price')
                    <p class="text-danger">{{$message??''}}</p>
                  @enderror
                </div>
              </div>
              <button class="btn btn-{{($result ??'')?'warning':'info'}}" type="submit">@if($result??'') Editar @else Cadastrar @endif</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection