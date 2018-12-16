@extends('adminlte::page')

@section('title', 'Editar Funcionário')

@section('content_header')
    <h1>Editar Função</h1>
@stop


@section('content')
<div class="col-md-12 ">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3>Dados da função</h3>
        </div>
        <form id="formFunc" action=" {{route('funcoes.update')}} " method="POST" > 
            {{ csrf_field() }}   
            <input type="hidden" name="id" value="{{$funcao->id}}">
            <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-6 {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome*</label>
                            <input type="text" class="form-control input-lg " value="{{$funcao->nome}}" id="nome" name="nome" placeholder="Nome da função">
                            @if ($errors->has('nome'))
                                <span class="help-block invalid-feedback">
                                    {{ $errors->first() }}
                                </span>
                            @endif
                        </div>
            </div> <!-- box-body -->

            <!-- Botoes -->
            <div class="box-footer">
                <a href=" {{ route('funcoes.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
                        <i class="fa fa-angle-left fa-lg"></i>          
                        &nbsp;Cancelar
                </a>
                <button type="submit" id="btn_salvar" class="btn btn-lg btn-primary">
                        <i class="fa fa-save fa-lg"></i>          
                        &nbsp;Salvar
                </button>    
            </div>
        </form>
    </div>
</div>
@stop