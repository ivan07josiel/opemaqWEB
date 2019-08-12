@extends('adminlte::page')

@section('title', 'Desempenho Fixo')

@section('content_header')
    <h1>Desempenho Fixo</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href="">Desempenho Fixo</a></li>
    </ol>
@stop

@section('content')
    <div class="col-xs-12">
        <div class="box box-danger">
          <div class="box-header">
            <a href="{{ route('fixo.cadastrar') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                Novo Desempenho Fixo
            </a>

            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Pesquisar">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            @include('admin.includes.alerts')
            <table class="table table-hover">
              <tbody>
                <tr>
                    <th>Trator/Implemento</th>
                    <th>Custo Fixo Total</th>
                    <th>Ações</th>
                </tr>
                
                @foreach ($desempenhos as $desempenho)    
                    <tr>
                        <td>{{$desempenho->trator}}</td>
                        <td>{{"R$" . number_format($desempenho->custoFixoTotal, 2, ',', '.')}}</td>
                        <td>
                            <a href='{{ route('planejamento.excluirView', ['id'=>$desempenho->id]) }}' class="btn btn-xs btn-danger btn-action" title="Excluir">
                                <i class="fa fa-trash"></i>                   
                            </a>
                            <a href='{{ route('planejamento.editarView', ['id'=>$desempenho->id]) }}' class="btn btn-xs btn-primary btn-action" title="Editar">
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
@stop