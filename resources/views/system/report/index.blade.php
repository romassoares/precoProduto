@extends('adminlte::page')
@section('title', 'Vendas')
@section('content_header')
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Vendas totais</span>
                <span class="info-box-number">
                  R$ {{$total}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-line"></i> Relatório</h3>
                </div>
                <div class="card-body p-0">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="chart_div" style="width: 100%"></div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- clientes -->
<script>
    google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawCurveTypes);

function drawCurveTypes() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Data');
      data.addColumn('number', 'Vendas mensais');

      data.addRows([
        @foreach ($report as $data)
            [getMes({{intval(substr($data->data, -2))}}) +" - {{intval(substr($data->data, 0, 4))}}", {{$data->total}}],
        @endforeach
      ]);

      var options = {
        hAxis: {
          title: 'Data'
        },
        vAxis: {
          title: 'V a l o r'
        },
        series: {
          1: {curveType: 'function'}
        },
        width: '100%'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    function getMes(mes){
      switch (mes) {
    case 1:
        return "Jan.";
    case 2:
        return "Fev.";
    case 3:
        return "Mar.";
    case 4:
        return "Abr.";
    case 5:
        return "Maio";
    case 6:
        return "Jun.";
    case 7:
        return "Jul.";
    case 8:
        return "Ago.";
    case 9:
        return "Set.";
    case 10:
        return "Out.";
    case 11:
        return "Nov.";
    case 12:
        return "Dez.";
    default:
        return "Mês inexistente";
}
    }
</script>
@endsection