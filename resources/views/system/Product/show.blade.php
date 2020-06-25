@extends('adminlte::page')
@section('title', 'Produto')
@section('content_header')

<script>
    function habilitar(e) {
        const item = document.getElementById(e.target.name);
        item.setAttribute('ckecked', '')
    }
</script>

@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('error'))
            @include('components.toast', ['msg' => session('error') ])
            @endif
            <div class="card">
                <div class="card-header">Produto</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div> <strong>Descrição</strong></div>
                            {{$result->description}}
                        </div>
                        <div class="col-md-3">
                            <div><strong>Quantidade</strong></div>
                            {{$result->amount}}{{$result->und}}
                        </div>
                        <div class="col-md-3">
                            <div><strong>Preço</strong></div>
                            R$ {{$result->getPrice()}}
                        </div>
                    </div>
                    <a href="{{route('produto.edit', $result->id)}}">
                        <button type="button" class="btn btn-warning">
                            <i class="fas fa-edit"></i>Editar
                        </button>
                    </a>
                </div>
                <table class="table">
                    <tr>
                        <th colspan="4">Ingredientes</th>
                    </tr>
                    <tr>
                        <th>Descrição</th>
                        <th>Qnt</th>
                        <th>R$ Gasto</th>
                    </tr>
                    @foreach($valGasto as $val)
                    <tr>
                        <td>{{$val->ingredient->description}}</td>
                        <td>{{$val->getQnt()}}</td>
                        <td>R$ {{$val->getValGasto()}}</td>
                        <td><a href="{{route('proIngQnt.qnt', [$val->product_id,$val->ingredient_id]) }}">Editar qnt de ingrediente</a></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="colspan-4">
                            R$ {{$valGasto->getTotGasto()}}
                        </td>
                    </tr>
                    <tr>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                Add item à receita
                            </button>
                        </div>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Escolher Ingredientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="form-group" id="item">
                    <form role="form" action="{{route('produtoIngrediente.update', $result->id)}}" method="post" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        {!! csrf_field() !!}
                        @foreach($ingredient as $i)
                        <div class="row col-md-12">
                            <div class="form-group checkbox">
                                <label from="{{$i->id}}">
                                    <input id="ingredient_{{$i->id}}" name="ingredient_{{$i->id}}" type="checkbox" value="{{$i->id}}" onmousedown="habilitar(event)" /> <strong>{{$i->description}}</strong>
                                </label>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">adcionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection