@extends('adminlte::page')
@section('title', 'clientes')
@section('content_header')
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title">Clientes</h3>
                        </div>
                        <div class="col">
                            <form role="form" action="{{route('cliente.search')}}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="input-group">
                                    <input type="search" class="form-control" name="search" id="search">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Cidade</th>
                                <th>Bairro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @foreach($clients as $client)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->city}}</td>
                                <td>{{$client->district}}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{route('cliente.report',$client->id)}}" class="text-success m-1 p-2"><i class="fas fa-clipboard"></i></a>
                                        <a href="{{route('cliente.edit',$client->id)}}" class="text-warning m-1 p-2"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('cliente.remove',$client->id)}}" class="text-danger m-1 p-2"><i class="fas fa-trash"></i></a>
                                        <form role="form" action="{{route('venda.store')}}" method="post" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="client_id" id="client_id" value="{{$client->id}}">
                                            <button type="submit" class="form-control m-1"><i class="fas fa-shopping-cart"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="/cliente/novo">
                                <button class="btn btn-success"><i class="fas fa-plus"></i> Novo</button>
                            </a>
                        </div>
                        <div class="col-md-4">
                            {{ $clients->links() }}
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('cliente.archive')}}">
                                <button class="btn btn-danger"> <i class="fas fa-archive"></i> Arquivos Removidos
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection