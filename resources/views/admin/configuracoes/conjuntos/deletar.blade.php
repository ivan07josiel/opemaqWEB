@extends('adminlte::page')

@section('title', 'Remover Conjunto')

@section('content_header')
    <h1>Remover Conjunto Mecanizado</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href="{{ route('conjuntos.index') }}">Conjuntos Mecanizados</a></li>
        <li><a href="">Remover</a></li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="col-md-5">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3>Deseja excluir esse Conjunto Mecanizado?</h3>
                </div>
                <div class="box-body">
                    <div class="text-right">
                        <a href='{{ route('conjuntos.index') }}' class="btn btn-primary btn-action border">
                            <i class="fa fa-angle-left fa-lg"></i>          
                            &nbsp;Cancelar             
                        </a>
                        <a href='{{ route('conjuntos.delete', ['id'=>$conjunto->id]) }}' class="btn btn-danger btn-action">
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
                    <h3>Conjunto Mecanizado</h3>
                </div>
                <div class="box-body">
                    <div>
                        <h4>Apelido: {{$conjunto->apelido}} </h4>
                        <h4>Trator: {{$conjunto->trator}} </h4>
                        <h4>Implemento: {{$conjunto->implemento}} </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop