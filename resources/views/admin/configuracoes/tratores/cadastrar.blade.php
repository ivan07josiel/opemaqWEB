@extends('adminlte::page')

@section('title', 'Cadastro Tratores e Implementos')

@section('content_header')
    <h1>Novo Trator/Implemento</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href=" {{route('tratores.index')}} ">Tratores e Implementos</a></li>
        <li><a href="">Cadastrar</a></li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3>Dados Cadastrais</h3>
                <form id="formFunc" action=" {{route('tratores.store')}} " method="POST" > 
                    <label class="radio-inline"><input type="radio" value="1" name="etrator" checked>Trator</label>
                    <label class="radio-inline"><input type="radio" value="0" name="etrator">Implemento</label>
            </div>
                    {{ csrf_field() }}   
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-4 {{ $errors->has('apelido') ? 'has-error' : '' }}">
                                <label for="apelido">Apelido*</label>
                                <input type="text" class="form-control input-lg " id="apelido" name="apelido" placeholder="Nome da máquina">
                                @if ($errors->has('apelido'))
                                    <span class="help-block invalid-feedback">
                                        {{ $errors->first() }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="marca">Marca</label>
                                <input type="text" class="form-control input-lg" id="marca" name="marca">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="marca">Modelo</label>
                                <input type="text" class="form-control input-lg" id="modelo" name="modelo">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="tdp">TDP</label>
                                <select class="form-control input-lg" id="tdp" name="tdp">
                                    <option value="540" selected>540 rpm</option>
                                    <option value="1000">1000 rpm</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="novo">Tração</label>
                                <select class="form-control input-lg" id="tracao" name="tracao">
                                    <option value="4x2" selected>4x2</option>
                                    <option value="4x2tda">4x2 TDA</option>
                                    <option value="4x4">4x4</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="novo">Motor</label>
                                <input type="text" class="form-control input-lg" id="motor" name="motor">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="transmissao">Transmissão</label>
                                <input type="text" class="form-control input-lg" id="transmissao" name="transmissao">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="novo">Cilíndros</label>
                                <input type="text" class="form-control input-lg" id="cilindro" name="cilindro">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="novo">Sucata</label>
                                <input type="number" class="form-control input-lg" id="sucata" name="sucata" placeholder="Valor R$">
                            </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="novo">Hrs estima/ano</label>
                            <input type="text" class="form-control input-lg" id="horas_estimadas" name="horas_estimadas">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="novo">Aspiração</label>
                            <input type="text" class="form-control input-lg" id="aspiracao" name="aspiracao">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="novo">Potência (cv)</label>
                            <input type="text" class="form-control input-lg" id="potencia" name="potencia">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="lastro">Lastro (kgf)</label>
                            <input type="text" class="form-control input-lg" id="lastro" name="lastro">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="novo">Ano</label>
                            <input type="text" class="form-control input-lg" id="ano" name="ano">
                            <small class="text-muted form-text">(aaaa)</small>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="novo">Uso anual</label>
                            <input type="text" class="form-control input-lg" id="uso_anual" name="uso_anual">
                            <small class="text-muted form-text">(horas)</small>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="hidraulico">Hidráulico Dianteiro</label>
                            <select class="form-control input-lg" id="hidraulico" name="hidraulico">
                                <option value="sim">Sim</option>
                                <option value="nao" selected>Não</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="novo">Cor</label>
                            <input type="text" class="form-control input-lg" id="cor" name="cor">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="novo">Novo</label>
                            <input type="text" class="form-control input-lg" id="novo" name="novo">
                            <small class="text-muted form-text">Valor de fábrica em R$</small>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="vida_util">Vida útil</label>
                            <input type="text" class="form-control input-lg" id="vida_util" name="vida_util">
                            <small class="text-muted form-text">(anos)</small>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor">Valor Real</label>
                            <input type="number" class="form-control input-lg" id="valor" name="valor" placeholder="Valor R$">
                        </div>
                    </div>
                </div> <!-- box-body -->

                <!-- Botoes -->
                <div class="box-footer text-right">
                    <button type="submit" id="btn_cadastrar" class="btn btn-lg btn-primary">
                            <i class="fa fa-save"></i>          
                            &nbsp;Cadastrar
                    </button>    
                    <a href=" {{ route('tratores.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
                        <i class="fa fa-undo"></i>          
                        &nbsp;Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop