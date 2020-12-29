@extends('adminlte::page')
@section('title', 'Vendas')
@section('content_header')
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{$sale->Client->name}}</h3>
                            <h6 class="text-muted">{{$sale->created_at}}</h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table">
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Qnt</th>
                                    <th>R$ UND</th>
                                    <th>Total</th>
                                </tr>
                                @php
                                $t = 0;
                                @endphp
                                @foreach($items as $item)
                                <tr>
                                    <td>{{$t++}}</td>
                                    <td>{{$item->product->description}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>R$ {{$item->getPrice()}}</td>
                                    <td>R$ {{$item->getPriceTot()}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        R$ {{$sale->getPrice()}}
                    </div>
                    <a href="{{route('venda.edit', $sale->id)}}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>Continuar Venda</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection