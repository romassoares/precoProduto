@extends('adminlte::page')
@section('title', 'Produto')
@section('content_header')
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row col-md-12 pb-5">
                        <div class="p-2 col">
                            <div> <strong>Descrição</strong></div>
                            {{$result->description}}
                        </div>
                        <div class="p-2 col">
                            <div><strong>Quantidade</strong></div>
                            {{$result->amount}}{{$result->und}}
                        </div>
                        <div class="p-2 col">
                            <div><strong>Preço</strong></div>
                            R$ {{$result->price}}
                        </div>
                        <div class="p-3 col">
                            <a href="{{route('produto.edit', $result->id)}}">
                                <button type="button" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>Editar
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Qnt</th>
                                        <th>R$ Gasto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $totgast = 0;
                                    @endphp
                                    @foreach($valGasto as $val)
                                    <tr>
                                        @php
                                        $totgast += str_replace(array('.', ','), array('', '.'),$val->getValGasto());
                                        @endphp
                                        <td>{{$val->Ingredient->getDescription()}}</td>
                                        <td>{{$val->qnt}}{{$val->Ingredient->und?$val->Ingredient->und:''}}</td>
                                        <td>R$ {{$val->getValGasto()}}</td>
                                        <td>
                                            <div class="form-group">
                                                <a href="{{route('proIngQnt.qnt', [$val->product_id,$val->ingredient_id]) }}" class="text-warning m-1">
                                                    <i class="fas fa-edit"></i></a>
                                                <a href="{{route('produtoIngrediente.remove', [$val->product_id,$val->ingredient_id]) }}" class="text-danger m-1"><i class="fas fa-archive"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                        Add item à receita
                                    </button>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="p-3">
                                    R$ total receita
                                    <strong>
                                        R$ {{number_format($totgast,2,',','.')}}
                                    </strong>
                                </div>
                                <div class="p-3">
                                    R$ /UND
                                    @php
                                    $ValUnd = $totgast/$result->amount;
                                    @endphp
                                    <strong>
                                        R$ {{number_format($ValUnd,2,',','.')}}
                                    </strong>
                                </div>
                                <div class="p-3">
                                    Lucro/UND
                                    @php
                                    $lucro = str_replace(array('.', ','), array('', '.'),$result->price)-$ValUnd;
                                    @endphp
                                    <strong>
                                        R$ {{number_format($lucro,2,',','.')}}
                                    </strong>
                                </div>
                                <div class="p-3">
                                    lucro total
                                    @php
                                    $lucrototal = (str_replace(array('.', ','), array('', '.'),$result->price)*$result->amount)-$totgast;
                                    @endphp
                                    <strong>
                                        R$ {{number_format($lucrototal,2,',','.')}}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <div class="row">
                            <select name="ingredient" id="ingredient" class="form-control">
                                @foreach($ingredient as $i)
                                <option value="{{$i->id}}">{{$i->description}}</option>
                                @endforeach
                            </select>
                            <input id="amount" name="amount" type="text" class="form-control " />
                        </div>
                        <button type="submit" class="btn btn-primary">adcionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection