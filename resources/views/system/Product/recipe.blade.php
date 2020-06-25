@extends('adminlte::page')
@section('title', 'Ingrediente')
@section('content_header')
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quantidade de ingrediente</div>
                <div class="card-body">
                    <form role="form" action="{{route('produtoIngrediente.addQnt', $result->product_id)}}" method="post" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        {!! csrf_field() !!}
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="">Ingrediente</label><br />
                                <input type="hidden" name="ingredient" value="{{$ingredient->id}}">
                                {{$ingredient->description}}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="qnt">Quantidade de ingredient</label>
                                <input type="text" name="qnt" id="qnt">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection