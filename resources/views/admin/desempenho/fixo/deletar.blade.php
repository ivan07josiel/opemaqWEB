@extends('adminlte::page')

@section('title', 'Remover Operação')

@section('content_header')
    <h1>Remover Operação Agrícola</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href="{{ route('analise.index') }}">Análise Operacional</a></li>
        <li><a href="">Remover</a></li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="col-md-5">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3>Deseja excluir essa Operação Agrícola?</h3>
                </div>
                <div class="box-body">
                    <div class="text-right">
                        <a href='{{ route('analise.index') }}' class="btn btn-primary btn-action border">
                            <i class="fa fa-angle-left fa-lg"></i>          
                            &nbsp;Cancelar             
                        </a>
                        <a href='{{ route('analise.delete', ['id'=>$operacao->id]) }}' class="btn btn-danger btn-action">
                            <i class="fa fa-times fa-lg"></i>          
                            &nbsp;Excluir   
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3>Operação Agrícola</h3>
                </div>
                <div class="box-body">
                    <div>
                        <h4>Nome: {{$operacao->nome}} </h4>
                        <h4>Propriedade: {{$propriedade->nome}} </h4>
                        <h4>Data de Início: {{date('d/m/Y',  strtotime($operacao->data_inicio))}} </h4>
                        <h4>Data de Fim: {{date('d/m/Y',  strtotime($operacao->data_fim))}} </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop