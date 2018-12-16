@extends('adminlte::page')

@section('title', 'Remover Funcionário')

@section('content_header')
    <h1>Remover Funcionário</h1>
@stop

@section('content')
    <div class="container">
        <div class="col-md-5">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3>Deseja excluir esse funcinário?</h3>
                </div>
                <div class="box-body">
                    <div class="text-right">
                        <a href='{{ route('funcionarios.index') }}' class="btn btn-primary btn-action border">
                            <i class="fa fa-angle-left fa-lg"></i>          
                            &nbsp;Cancelar             
                        </a>
                        <a href='{{ route('funcionarios.delete', ['id'=>$funcionario->id]) }}' class="btn btn-danger btn-action">
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
                    <h3>Funcionário</h3>
                </div>
                <div class="box-body">
                    <div>
                        <h4>Nome: {{$funcionario->nome}} </h4>
                        <h4>Função: {{$funcao->nome}} </h4>
                        <h4>Nascimento: {{date('d/m/Y',  strtotime($funcionario->data_nascimento))}} </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop