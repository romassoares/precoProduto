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
                    </div>
                    
                </div>

                <div class="card-body">
                    <form role="form" action="{{route('venda.addProduct',$client->id)}}" method="post" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        {!! csrf_field() !!}
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="">Cliente</label><br />
                                {{$client->name}}
                            </div>
                            <div class="form-group col-4">
                                <label for="discount">Desconto</label>
                                <input class="form-control" type="text" name="discount" id="discount" placeholder="Desconto" />
                            </div>
                            <div class="form-group col-4 text-right">
                        <h1 class="text-success">{{$sale->getPrice()}}</h1>
                    </div>
                        </div>
                        <div class="row">
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
                                    <td>{{$item->product->name}}</td>                                    
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->amount*$item->price}}</td>
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
                        <button type="submit" class="btn btn-primary">salvar</button>
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
                                <select name="product_id" id="product_id">
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">
                                        {{$product->description}}
                                    </option>
                                    @endforeach
                                </select>
                                <input name="amount" id="amount" placeholder="Qnt"/>
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