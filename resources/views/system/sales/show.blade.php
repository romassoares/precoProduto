@extends('adminlte::page')
@section('title', 'Vendas')
@section('content_header')
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Vendas</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div> <strong>Cliente</strong></div>
                            {{$client->name}}
                        </div>
                        <div class="col-md-4">
                            <div><strong>Itens</strong></div>
                            {{$sale->getItens()}}
                        </div>
                    </div>
                    <a href="{{route('venda.edit', $result->id)}}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>Editar</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection