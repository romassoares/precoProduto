@extends('adminlte::page')
@section('title', 'Produto')
@section('content_header')

<script>
    function habilitar(e) {
        console.log(e.target.name);
        const item = document.getElementById(e.target.name);
        item.setAttribute('ckecked', '')
    }
</script>

@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                    <a href="{{route('produto.edit', $result->id)}}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>Editar</button></a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Ingredientes</div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Receita
                </button>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <th>*</th>
                                    <th>Descrição</th>
                                    <th>Qnt</th>
                                    <th>R$ Gasto</th>
                                </tr>
                            </table>
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
                    <form role="form" action="{{route('produtoIngrediente.store')}}" method="post" enctype="multipart/form-data">
                        @foreach($ingredients as $ingredient)
                        {!! csrf_field() !!}
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label from="ingredient_{{$ingredient->id}}">
                                    <input id="ingredient_{{$ingredient->id}}" name="ingredient_{{$ingredient->id}}" type="checkbox" value="{{$ingredient->id}}" onmousedown="habilitar(event)" /><strong>{{$ingredient->description}}</strong>
                                </label>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">adcionar</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
@endsection