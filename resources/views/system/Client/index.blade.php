@extends('adminlte::page')
@section('title', 'clientes')
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
                            <h3 class="card-title">clientes</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>nome</th>
                                        <th>cidade</th>
                                        <th>Bairro</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->city}}</td>
                                        <td>{{$client->district}}</td>
                                        <td>
                                            <div class="form-group">
                                                <a href="{{route('cliente.show',$client->id)}}" class="text-primary m-1"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('cliente.edit',$client->id)}}" class="text-warning m-2"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('cliente.remove',$client->id)}}" class="text-danger m-1"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $clients->links() }}
                        </div>
                        <div class="card-footer">
                            <a href="/cliente/novo">
                                <button class="btn btn-primary"><i class="fas fa-plus"></i> Novo</button>
                            </a>
                            <a href="{{route('cliente.archive')}}" >
                                <button class="btn btn-primary" > <i class="fas fa-archive" ></i> Arquivos Removidos
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
