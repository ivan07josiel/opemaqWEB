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
                        <label for="tdp">TDP</label>
                        <select class="form-control input-lg" id="tdp" name="tdp">
                            <option value="540" {{ $trator->tdp == '540' ? 'selected' : '' }}>540 rpm</option>
                            <option value="1000" {{ $trator->tdp == '1000' ? 'selected' : '' }}>1000 rpm</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tracao">Tração</label>
                        <select class="form-control input-lg" id="tracao" name="tracao">
                            <option value="4x2" {{ $trator->tracao == '4x2' ? 'selected' : '' }}>4x2</option>
                            <option value="4x2tda" {{ $trator->tracao == '4x2tda' ? 'selected' : '' }}>4x2 TDA</option>
                            <option value="4x4" {{ $trator->tracao == '4x4' ? 'selected' : '' }}>4x4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="motor">Motor</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->motor}}" id="motor" name="motor">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="transmissao">Transmissão</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->transmissao}}" id="transmissao" name="transmissao">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cilindro">Cilíndros</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->cilindro}}" id="cilindro" name="cilindro">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="sucata">Sucata</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->sucata}}" id="sucata" name="sucata">
                    </div>
                </div>
            
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="horas_estimadas">Hrs estima/ano</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->horas_estimadas}}" id="horas_estimadas" name="horas_estimadas">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="aspiracao">Aspiração</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->aspiracao}}" id="aspiracao" name="aspiracao">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="potencia">Potência (cv)</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->potencia}}" id="potencia" name="potencia">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="lastro">Lastro (kgf)</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->lastro}}" id="lastro" name="lastro">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="ano">Ano</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->ano}}" id="ano" name="ano">
                        <small class="text-muted form-text">(aaaa)</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uso_anual">Uso anual</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->uso_anual}}" id="uso_anual" name="uso_anual">
                        <small class="text-muted form-text">(horas)</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="hidraulico">Hidráulico Dianteiro</label>
                        <select class="form-control input-lg" id="hidraulico" name="hidraulico">
                            <option value="sim" {{ $trator->hidraulico == 'sim' ? 'selected' : '' }}>Sim</option>
                            <option value="nao" {{ $trator->hidraulico == 'nao' ? 'selected' : '' }}>Não</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cor">Cor</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->cor}}" id="cor" name="cor">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="novo">Novo</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->novo}}" id="novo" name="novo">
                        <small class="text-muted form-text">Valor de fábrica em R$</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="vida_util">Vida útil</label>
                        <input type="text" class="form-control input-lg" value="{{$trator->vida_util}}" id="vida_util" name="vida_util">
                        <small class="text-muted form-text">(anos)</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="valor">Valor Real</label>
                        <input type="number" class="form-control input-lg" value="{{$trator->valor}}" id="valor" name="valor" placeholder="Valor R$">
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