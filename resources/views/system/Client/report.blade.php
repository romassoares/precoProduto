@extends('adminlte::page')
@section('title', 'Relatório')
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
                             {{$client->number}}
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
                    <a href="{{route('cliente')}}"><button class="btn btn-secundary"><i class="fas fa-reply"></i> Voltar</button></a>
                </div>
            </div>
            <div class="row p-0">
                @php
                $tot = 0;
                @endphp
                    @foreach($sales as $sale)
                    <a href="{{route('venda.show',$sale->id)}}">
                        <div class="card m-2">
                            <div class="card-body">
                                <div>
                                    {{$sale->created_at->format('d-M-Y')}} - R$ {{$sale->getPrice()}}
                                    @php
                                        $tot += floatval($sale->price)
                                    @endphp
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach
                </div>
                TOTAL DAS COMPRAS  <strong> R$ {{number_format($tot,2,',','.')}}</strong>
        </div>
    </div>
</div>
@endsection