@extends('adminlte::page')

@section('title', 'Propriedades')

@section('content_header')
    <h1>Propriedades</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href="">Propriedades</a></li>
    </ol>
@stop

@section('content')
    @if (session('status'))
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body…</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <script>$('modal-default').modal('show');</script>
    @endif

    <div class="row">
    <div class="col-xs-12">
        <div class="box box-danger">
          <div class="box-header">
            <a href="{{ route('propriedades.cadastrar') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                Nova Propriedade
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
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Tamanho</th>
                    <th>Ações</th>
                </tr>
                
                @foreach ($propriedades as $propriedade)    
                    <tr>
                        <td>{{$propriedade->nome}}</td>
                        <td>{{"R$" . number_format($propriedade->valor, 2, '.', ',')}}</td>
                        <td>{{$propriedade->tamanho}}</td>
                        <td>
                            <a href='{{ route('propriedades.excluirView', ['id'=>$propriedade->id]) }}' class="btn btn-xs btn-danger btn-action" title="Excluir">
                                <i class="fa fa-trash"></i>                   
                            </a>
                            <a href='{{ route('propriedades.editarView', ['id'=>$propriedade->id]) }}' class="btn btn-xs btn-primary btn-action" title="Editar">
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
    </div>
@stop