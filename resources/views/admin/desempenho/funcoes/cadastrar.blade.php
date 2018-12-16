@extends('adminlte::page')

@section('title', 'Cadastro Função')

@section('content_header')
    <h1>Nova Função</h1>

    <ol class="breadcrumb">
            <li><a href="/">
                <i class="fa fa-home"></i>            
                Inicio
            </a></li>
            <li><a href=" {{route('funcoes.index')}} ">Funções</a></li>
            <li><a href="">Cadastrar</a></li>
        </ol>
@stop

@section('content')
    <div class="col-md-12 ">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3>Dados Cadastrais</h3>
            </div>
            <form id="formFunc" action=" {{route('funcoes.store')}} " method="POST" > 
                {{ csrf_field() }}   
                <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('nome') ? 'has-error' : '' }}">
                                <label for="nome">Nome*</label>
                                <input type="text" class="form-control input-lg " id="nome" name="nome" placeholder="Nome da função">
                                @if ($errors->has('nome'))
                                    <span class="help-block invalid-feedback">
                                        {{ $errors->first() }}
                                    </span>
                                @endif
                            </div>
                            
                </div> <!-- box-body -->

                <!-- Botoes -->
                <div class="box-footer text-right">
                    <button type="submit" id="btn_cadastrar" class="btn btn-lg btn-primary">
                            <i class="fa fa-save"></i>          
                            &nbsp;Cadastrar
                    </button>    
                    <a href=" {{ route('funcoes.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
                        <i class="fa fa-undo"></i>          
                        &nbsp;Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop