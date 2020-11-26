@extends('adminlte::page')
@section('title', 'Formulário produto')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">@if(isset($result)) Editar @else Cadastrar @endif Produto</div>
        <div class="card-body">
          @if(isset($result))
          <form role="form" action="{{route('produto.update',$result->id)}}" method="post" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            @else
            <form name="formProduct" id="formProduct" method="post" action="{{route('produto.store')}}" enctype="multipart/form-data">
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
                    <option {{(isset($result->und) === 'kg') ? 'selected':''}} value="kg">Kg</option>
                    <option {{(isset($result->und) === 'g') ? 'selected':''}} value="g">grama</option>
                    <option {{(isset($result->und) === 'cm') ? 'selected':''}} value="cm">centímetro</option>
                    <option {{(isset($result->und) === 'm') ? 'selected':''}} value="m">metro</option>
                    <option {{(isset($result->und) === 'cm³') ? 'selected':''}} value="cm³">centímentro cúbico</option>
                    <option {{(isset($result->und) === 'cm²') ? 'selected':''}} value="cm²">centímetro quadrado</option>
                    <option {{(isset($result->und) === 'l') ? 'selected':''}} value="l">litro</option>
                    <option {{(isset($result->und) === 'f') ? 'selected':''}} value="f">fatia</option>
                    <option {{(isset($result->und) === 'und') ? 'selected':''}} value="und">unidade</option>
                    <option {{(isset($result->und) === 'pct') ? 'selected':''}} value="pct">pacote</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="price">preço</label>
                  <input type="text" name="price" id="price" class="form-control" placeholder="0,00" value="{{isset($result->price)?$result->price:old('price')}}" />
                  @error('price')
                    <p class="text-danger">{{$message??''}}</p>
                  @enderror
                </div>
              </div>
              @if($result??'') 
                <button class="btn btn-{{($result??'')?'warning':'info'}}" type="submit">
                <i class="fas fa-edit"></i>
                  Editar 
                </button>
              @else 
                <button class="btn btn-{{($result??'')?'info':'success'}}" type="submit"><i class="fas fa-plus"></i>
                  Cadastrar 
                </button>
              @endif
            </form>
                <a href="{{route('produto')}}"><button class="btn btn-secundary"><i class="fas fa-reply"></i> Voltar</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
@if(session()->has('message'))
            <div class="alert {{session('alert') ?? 'alert-info'}}">
                {{ session('message') }}
            </div>
 @endif
@endsection