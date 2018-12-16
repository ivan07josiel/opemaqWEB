@extends('adminlte::page')

@section('title', 'Tratores e Implementos')

@section('content_header')
    <h1>Tratores e Implementos</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href="">Tratores e Implementos</a></li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-danger">
          <div class="box-header">
            <a href="{{ route('tratores.cadastrar') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                Novo Trator/Implemento
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
                    <th>Tipo</th>
                    <th>Apelido</th>
                    <th>Marca</th>
                    <th>Ações</th>
                </tr>
                
                @foreach ($tratores as $trator)    
                    <tr>
                        <td>{{$trator->etrator ? 'Trator' : 'Implemento'}}</td>
                        <td>{{$trator->apelido}}</td>
                        <td>{{$trator->marca}}</td>
                        <td>
                            <a href='{{ route('tratores.excluirView', ['id'=>$trator->id]) }}' class="btn btn-xs btn-danger btn-action" title="Excluir">
                                <i class="fa fa-trash"></i>                   
                            </a>
                            <a href='{{ route('tratores.editarView', ['id'=>$trator->id]) }}' class="btn btn-xs btn-primary btn-action" title="Editar">
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