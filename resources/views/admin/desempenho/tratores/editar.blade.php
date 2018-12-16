@extends('adminlte::page')

@section('title', 'Editar Trator/Implemento')

@section('content_header')
    <h1>Editar {{$trator->etrator ? 'Trator' : 'Implemento'}}</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href=" {{route('tratores.index')}} ">Tratores e Implementos</a></li>
        <li><a href="">Editar</a></li>
    </ol>
@stop


@section('content')
<div class="row">
<div class="col-md-12 ">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3>Dados do {{$trator->etrator ? 'Trator' : 'Implemento'}}</h3>
        </div>
        <form id="formFunc" action=" {{route('tratores.update')}} " method="POST" > 
            {{ csrf_field() }}   
            <input type="hidden" name="id" value="{{$trator->id}}">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-4 {{ $errors->has('apelido') ? 'has-error' : '' }}">
                        <label for="apelido">Apelido*</label>
                        <input type="text" class="form-control input-lg " value="{{$trator->apelido}}" id="apelido" name="apelido" placeholder="Nome da máquina">
                        @if ($errors->has('apelido'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->marca}}" id="marca" name="marca">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="marca">Modelo</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->modelo}}" id="modelo" name="modelo">
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="novo">TDP</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->tdp}}" id="tdp" name="tdp">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="novo">Tração</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->tracao}}" id="tracao" name="tracao">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="novo">Motor</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->motor}}" id="motor" name="motor">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="novo">Cilíndros</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->cilindro}}" id="cilindro" name="cilindro">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="novo">Sucata</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->sucata}}" id="sucata" name="sucata">
                    </div>
                </div>
            
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="novo">Hrs estima/ano</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->horas_estimadas}}" id="horas_estimadas" name="horas_estimadas">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="novo">Aspiração</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->aspiracao}}" id="aspiracao" name="aspiracao">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="novo">Potência</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->potencia}}" id="potencia" name="potencia">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="novo">Ano</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->ano}}" id="ano" name="ano">
                        <small class="text-muted form-text">(aaaa)</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="novo">Uso anual</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->uso_anual}}" id="uso_anual" name="uso_anual">
                        <small class="text-muted form-text">(horas)</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="novo">Hidráulico Dianteiro</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->hidraulico}}" id="hidraulico" name="hidraulico">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="novo">Cor</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->cor}}" id="cor" name="cor">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="novo">Novo</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->novo}}" id="novo" name="novo">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="vida_util">Vida útil</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->vida_util}}" id="vida_util" name="vida_util">
                        <small class="text-muted form-text">(horas)</small>
                    </div>
                </div>
            </div> <!-- box-body -->

            <!-- Botoes -->
            <div class="box-footer">
                <a href=" {{ route('tratores.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
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
</div>
@stop