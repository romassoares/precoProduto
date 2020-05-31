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
                  <input type="text" name="description" id="description" class="form-control" placeholder="Descrição do produto" value="{{isset($result->description)?$result->description:old('description')}}" />
                </div>
                <div class="form-group  col-md-6">
                  <label for="amount">Quantidade</label>
                  <input type="text" name="amount" id="amount" class="form-control" placeholder="quantidade de produto" value="{{isset($result->amount)?$result->amount:old('amount')}}">
                </div>
                </div>
                <div class="row">
					<div class="form-group col-md-6">
						<label for="und">Unidade de Medida</label>
						<select name="und" id="und" class="form-control">
							<option {{isset($result->und)=== 'kg'?'selected':''}} value="kg">Kg</option>
							<option {{isset($result->und)=== 'g'?'selected':''}} value="g">grama</option>
							<option {{isset($result->und)=== 'cm'?'selected':''}} value="cm">centimetro</option>
							<option {{isset($result->und)=== 'm'?'selected':''}} value="m">metro</option>
							<option {{isset($result->und)=== 'cm³'?'selected':''}} value="cm³">centimentro cubico</option>
							<option {{isset($result->und)=== 'cm²'?'selected':''}} value="cm²">centimetro quadrado</option>
							<option {{isset($result->und)=== 'l'?'selected':''}} value="l">litro</option>
							<option {{isset($result->und)=== 'f'?'selected':''}} value="f">fatia</option>
							<option {{isset($result->und)=== 'und'?'selected':''}} value="und">unidade</option>
						</select>
					</div>
                <div class="form-group col-md-6">
                <label for="price">Preço</label>
                  <input type="text" name="price" id="price" class="form-control" placeholder="preço" value="{{isset($result->price)?$result->price:old('price')}}" />
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