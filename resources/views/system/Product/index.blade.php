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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Produtos</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>nome</th>
                    <th>qnt</th>
                    <th style="width: 40px">R$</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($result as $products)
                  <tr>
                    <td>{{$products->id}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->amount}}</td>
                    <td>{{$products->price}}</td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <a href="/produto/novo"><button class="btn btn-primary"><i class="fas fa-plus"></i> Novo</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection