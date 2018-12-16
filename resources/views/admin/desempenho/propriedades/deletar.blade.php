@extends('adminlte::page')

@section('title', 'Remover Propriedade')

@section('content_header')
    <h1>Remover Propriedade</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href="{{ route('propriedades.index') }}">Propriedades</a></li>
        <li><a href="">Remover</a></li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="col-md-5">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3>Deseja excluir essa propriedade?</h3>
                </div>
                <div class="box-body">
                    <div class="text-right">
                        <a href='{{ route('propriedades.index') }}' class="btn btn-primary btn-action border">
                            <i class="fa fa-angle-left fa-lg"></i>          
                            &nbsp;Cancelar             
                        </a>
                        <a href='{{ route('propriedades.delete', ['id'=>$propriedade->id]) }}' class="btn btn-danger btn-action">
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
                    <h3>Propriedade</h3>
                </div>
                <div class="box-body">
                    <div>
                        <h4>Nome: {{$propriedade->nome}} </h4>
                        <h4>Data: {{date("d/m/Y", strtotime($propriedade->data))}} </h4>
                        <h4>Valor: R${{number_format($propriedade->valor, 2, '.', ';')}} </h4>
                        <h4>Tamanho: {{$propriedade->tamanho}} </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop