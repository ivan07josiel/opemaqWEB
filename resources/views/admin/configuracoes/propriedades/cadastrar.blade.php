@extends('adminlte::page')

@section('title', 'Cadastro Propriedade')

@section('content_header')
    <h1>Nova Propriedade</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href=" {{route('propriedades.index')}} ">Propriedades</a></li>
        <li><a href="">Cadastrar</a></li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3>Dados Cadastrais</h3>
            </div>
            <form id="formFunc" action=" {{route('propriedades.store')}} " method="POST" > 
                {{ csrf_field() }}   
                <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('nome') ? 'has-error' : '' }}">
                                <label for="nome">Nome*</label>
                                <input type="text" class="form-control input-lg " id="nome" name="nome" placeholder="Nome da propriedade">
                                @if ($errors->has('nome'))
                                    <span class="help-block invalid-feedback">
                                        {{ $errors->first() }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="data">Data*</label>
                                <input type="date" class="form-control input-lg" id="data" name="data">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="valor">Valor</label>
                                <input type="number" class="form-control input-lg" id="valor" name="valor">
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="form-group col-md-3">
                                <label for="fgts">Tamaho da propriedade</label>
                                <input type="text" class="form-control input-lg" id="tamanho" name="tamanho" placeholder="Insira o tamanho">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="percuso_manobra">Percuso e manobra</label>
                                <select class="form-control input-lg" name="percuso_manobra" id="percurso_manobra">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <small class="text-muted form-text" id="percursoManobra" style="padding: 7px;">Tipo de percurso e manobra varia de 1 a 4</small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="relevo">Relevo</label>
                                <select name="relevo" class="form-control input-lg" id="relevo">
                                    <option	disabled selected>Selecione	o relevo</option>
                                    <option	value="plano">Plano</option>
                                    <option	value="suave">Suave ondulado</option>
                                    <option value="ondulado">Ondulado</option>
                                    <option	value="forteOndulado">Forte ondulado</option>
                                    <option value="montanhoso">Montanhoso</option>
                                    <option	value="escarpa">Escarpa</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="solo">Solo</label>
                                <select name="solo" class="form-control input-lg" id="solo">
                                    <option	disabled selected>Selecione	o solo</option>
                                    <option	value="arenoso">Arenoso</option>
                                    <option	value="argiloso">Argiloso</option>
                                    <option	value="arenoArg">Areno Argiloso</option>
                                    <option value="siltoso">Siltoso</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="declividade">Declividade</label>
                                <select name="declividade" class="form-control input-lg" id="declividade">
                                    <option	disabled selected>Selecione	a declividade</option>
                                    <option	value="0-3">0 - 3%</option>
                                    <option	value="3-8">3 - 8%</option>
                                    <option value="8-13">8 - 13%</option>
                                    <option	value="13-20">13 - 20%</option>
                                    <option value="20-45">20 - 45%</option>
                                    <option	value="45-100">45 - 100%</option>
                                    <option	value=">100">Maior que 100%</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fertilidade">Fertilidade</label>
                                <select name="fertilidade" class="form-control input-lg" id="fertilidade">
                                    <option	disabled selected>Nível de fertilidade</option>
                                    <option	value="baixa">Baixa</option>
                                    <option	value="media">Média</option>
                                    <option value="alta">Alta</option>
                                </select>
                            </div>
                        </div>
                </div> <!-- box-body -->

                <!-- Botoes -->
                <div class="box-footer text-right">
                    <button type="submit" id="btn_cadastrar" class="btn btn-lg btn-primary">
                            <i class="fa fa-save"></i>          
                            &nbsp;Cadastrar
                    </button>    
                    <a href=" {{ route('propriedades.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
                        <i class="fa fa-undo"></i>          
                        &nbsp;Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop