@extends('adminlte::page')
@section('title', 'Clientes')
@section('content_header')
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('error'))
            @include('components.toast', ['msg' => session('error') ])
            @endif
            <div class="card">
                <div class="card-header">Cliente</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div> <strong>Nome</strong></div>
                            {{$client->name}}
                        </div>
                        <div class="col-md-3">
                            <div><strong>Endereço</strong></div>
                            {{$client->city}}
                        </div>
                        <div class="col-md-3">
                            <div><strong>Bairro</strong></div>
                            {{$client->district}}
                        </div>
                        <div class="col-md-3">
                            <div><strong>Rua</strong></div>
                            {{$client->street}}
                        </div>
                        <div class="col-md-3">
                            <div><strong>Nº</strong></div>
                            R$ {{$client->number}}
                        </div>
                        <div class="col-md-3">
                            <div><strong>Contato</strong></div>
                             {{$client->contact}}
                        </div>
                    </div>
                    <a href="{{route('cliente.edit', $client->id)}}">
                        <button type="button" class="btn btn-warning">
                            <i class="fas fa-edit"></i>Editar
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection