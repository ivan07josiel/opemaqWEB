@extends('adminlte::page')

@section('title', 'Remover Trator/Implemento')

@section('content_header')
    <h1>Remover {{$trator->etrator ? 'Trator' : 'Implemento'}}</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href="{{ route('tratores.index') }}">Tratores e Implementos</a></li>
        <li><a href="">Remover</a></li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="col-md-5">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3>Deseja excluir esse {{$trator->etrator ? 'Trator' : 'Implemento'}}?</h3>
                </div>
                <div class="box-body">
                    <div class="text-right">
                        <a href='{{ route('tratores.index') }}' class="btn btn-primary btn-action border">
                            <i class="fa fa-angle-left fa-lg"></i>          
                            &nbsp;Cancelar             
                        </a>
                        <a href='{{ route('tratores.delete', ['id'=>$trator->id]) }}' class="btn btn-danger btn-action">
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
                    <h3>{{$trator->etrator ? 'Trator' : 'Implemento'}}</h3>
                </div>
                <div class="box-body">
                    <div>
                        <h4>Apelido: {{$trator->apelido}} </h4>
                        <h4>Marca: {{$trator->marca}} </h4>
                        <h4>Ano: {{$trator->ano}} </h4>
                        <h4>Cor: {{$trator->cor}} </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop