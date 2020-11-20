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
                        <div class="col-md-4">
                            <div> <strong>Cliente</strong></div>
                            {{$sale->Client->name}}
                        </div>
                    <div class="row">
                        <div class="col-md-12">
                        <table class="table table">
                                <tr>
                                    <th>#</th>
                                    <th>Produto</th>
                                    <th>Qnt</th>
                                    <th>Preço</th>
                                    <th>Total</th>
                                </tr>
                                    @php 
                                    $i = 0;
                                    $t = 0;
                                    @endphp
                                @foreach($items as $item)
                                <tr>
                                    <td>{{$t++}}</td>
                                    <td>{{$item->Product->description}}</td>                                    
                                    <td>{{$item->amount}}</td>
                                    @php 
                                    $i += $item->amount*$item->price
                                    @endphp
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->amount*$item->price}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    R$ {{number_format($i,2,',','.')}}
                    </div>
                    <a href="{{route('venda.edit', $sale->id)}}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>Editar</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection