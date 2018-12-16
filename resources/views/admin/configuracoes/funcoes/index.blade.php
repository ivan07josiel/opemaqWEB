@extends('adminlte::page')

@section('title', 'Funções')

@section('content_header')
    <h1>Funções</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href="">Funções</a></li>
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

    <div class="col-xs-6">
        <div class="box box-danger">
          <div class="box-header">
            <a href="{{ route('funcoes.cadastrar') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                Nova Função
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
                    <th>Ações</th>
                </tr>
                
                @foreach ($funcoes as $funcao)    
                    <tr>
                        <td>{{$funcao->nome}}</td>
                        <td>
                            <a href='{{ route('funcoes.excluirView', ['id'=>$funcao->id]) }}' class="btn btn-xs btn-danger btn-action">
                                <i class="fa fa-trash"></i>                   
                            </a>
                            <a href='{{ route('funcoes.editarView', ['id'=>$funcao->id]) }}' class="btn btn-xs btn-primary btn-action">
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