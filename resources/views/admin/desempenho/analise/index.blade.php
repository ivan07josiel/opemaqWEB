@extends('adminlte::page')

@section('title', 'Análise Operacional')

@section('css')
    <!-- Fullcalendar CSS -->
    <link href="{{ asset('vendor/adminlte/vendor/fullcalendar/css/fullcalendar.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('vendor/adminlte/vendor/fullcalendar/css/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />
    @endsection
    
@section('js')
    <!-- Fullcalendar JS -->
    <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/js/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/fullcalendar/js/fullcalendar.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
            });
        });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['timeline'], 'language': 'pt-br'});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var container = document.getElementById('timeline');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({ type: 'string', id: 'Gober' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });
        dataTable.addRows([
            @foreach($operacoes as $operacao)
            [ '{{$operacao->nome}}', new Date({{str_replace("-", ",", $operacao->data_inicio)}}), new Date({{str_replace("-", ",", $operacao->data_fim)}}) ],
            @endforeach
        ]);
        
        var options = {
            title: "Teste"
        };
        chart.draw(dataTable);
    }
    </script>
@endsection

@section('content_header')
    <h1>Análise Operacional</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Início
        </a></li>
        <li><a href="">Análise Operacional</a></li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-danger">
          <div class="box-header">
            <a href="{{ route('analise.cadastrar') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                Nova Operação Agrícola
            </a>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            @include('admin.includes.alerts')
            <table class="table table-hover">
              <tbody>
                <tr>
                    <th>Operação</th>
                    <th>Propriedade</th>
                    <th>Início</th>
                    <th>Fim</th>
                </tr>
                
                @foreach ($operacoes as $operacao)    
                    <tr>
                        <td>{{$operacao->nome}}</td>
                        <td>{{$operacao->propriedade}}</td>
                        <td>{{date('d/m/Y',  strtotime($operacao->data_inicio))}}</td>
                        <td>{{date('d/m/Y',  strtotime($operacao->data_fim))}}</td>
                        <td>
                            <a href='{{ route('analise.excluirView', ['id'=>$operacao->id]) }}' class="btn btn-xs btn-danger btn-action" title="Excluir">
                                <i class="fa fa-trash"></i>                   
                            </a>
                            <a href='{{ route('analise.editarView', ['id'=>$operacao->id]) }}' class="btn btn-xs btn-primary btn-action" title="Editar">
                                <i class="fa fa-pencil"></i>                 
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

      <div class="col-xs-12" hidden>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cronograma - Linha temporal das operações</h3>
                
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="timeline" style="height: 180px;"></div>
                </div>
              <!-- /.box-body -->
            </div>    
      </div>

      <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
      </div>
</div>
@stop

