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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Venda</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="4">Itens</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>cliente</th>
                                        <th>valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $sale)
                                    <tr>
                                        <td>{{$sale->id}}</td>
                                        <td>{{$sale->client->name}}</td>
                                        <td>{{$sale->getPrice()}}</td>
                                        <td>
                                            <div class="form-group">
                                                <a href="{{route('venda.show',$sale->id)}}" class="text-primary m-1"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('venda.edit',$sale->id)}}" class="text-warning m-2"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('venda.remove',$sale->id)}}" class="text-danger m-1"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                    Nova venda
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- clientes -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Escolher cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form role="form" action="{{route('venda.store')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                    <div class="form-group" id="item">
                        <div class="row col-md-12">
                            <div class="form-group">
                                <select name="client_id" id="client_id" class="form-control">
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">iniciar venda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    function selecionar(e) {
        const item = document.querySelector('#client_id');
        if (item != '') {
            window.location.href = '/venda/' + item.value + '/novo'
        }
    }
</script> -->
@endsection