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
                            {{$sale->Client->name}}
                        </div>
                        <div class="col-md-12">
                        <table class="table table">
                                <tr>
                                    <th>#</th>
                                    <th>Produto</th>
                                    <th>Qnt</th>
                                    <th>Preço</th>
                                    <th>Total</th>
                                </tr>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->Product->description}}</td>                                    
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->amount*$item->price}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <a href="{{route('venda.edit', $sale->id)}}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>Editar</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection