@extends('adminlte::page')
@section('title', 'Venda')
@section('content_header')
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header col-12">
                    <div class="form-group col-6">
                        <h1>Nova venda</h1>
                        {{$sale->Client->name}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
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
                            @endphp
                            @foreach($items as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->product->description}}</td>
                                <td>{{$item->amount}}</td>
                                <td>R$ {{$item->getPrice()}}</td>
                                <td>R$ {{$item->getPriceTot()}}</td>
                                <td>
                                    <a href="{{route('venda.removeItem',[$sale->id,$item->product_id])}}" class="text-danger m-1"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                        adcionar produto
                                    </button>
                                </div>
                            </tr>
                        </table>
                    </div>
                    <form role="form" action="{{route('venda.addProduct',$sale->Client->id)}}" method="post" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        {!! csrf_field() !!}
                        <div class="row col-12">
                            <div class="form-group col-4 ">
                                <button type="submit" class="btn btn-primary  ">salvar</button>
                            </div>
                            <div class="form-group col-4">
                                <label for="discount">Desconto</label>
                                <input class="form-control" type="text" name="discount" id="discount" placeholder="Desconto" />
                            </div>
                            <div class="form-group col-4 text-right">
                                <h1 class="text-success">R$ {{$sale->getPrice()}}</h1>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- produtos -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Escolher Produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="form-group" id="item">
                    <form role="form" action="{{route('venda.addProduct', $sale->id)}}" method="post" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        {!! csrf_field() !!}
                        <div class="row col-md-12">
                            <div class="form-group">
                                <select class="form-control" name="product_id" id="product_id">
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">
                                        {{$product->description}}
                                    </option>
                                    @endforeach
                                </select>
                                <input class="form-control" name="amount" id="amount" placeholder="Qnt" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">adcionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection