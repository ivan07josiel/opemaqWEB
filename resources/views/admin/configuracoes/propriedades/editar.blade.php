@extends('adminlte::page')

@section('title', 'Editar Propriedade')

@section('content_header')
    <h1>Editar Propriedade</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href=" {{route('propriedades.index')}} ">Propriedades</a></li>
        <li><a href="">Editar</a></li>
    </ol>
@stop


@section('content')
<div class="row">
<div class="col-md-12 ">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3>Dados da propriedade</h3>
        </div>
        <form id="formFunc" action=" {{route('propriedades.update')}} " method="POST" > 
            {{ csrf_field() }}   
            <input type="hidden" name="id" value="{{$propriedade->id}}">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6 {{ $errors->has('nome') ? 'has-error' : '' }}">
                        <label for="nome">Nome*</label>
                        <input type="text" class="form-control input-lg " value="{{$propriedade->nome}}" id="nome" name="nome" placeholder="Nome da propriedade">
                        @if ($errors->has('nome'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 {{ $errors->has('data') ? 'has-error' : '' }}">
                        <label for="data">Data*</label>
                        <input type="date" class="form-control input-lg " value="{{$propriedade->data}}" id="data" name="data">
                        @if ($errors->has('data'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 {{ $errors->has('valor') ? 'has-error' : '' }}">
                        <label for="valor">Valor</label>
                        <input type="number" class="form-control input-lg " value="{{$propriedade->valor}}" id="valor" name="valor">
                        @if ($errors->has('valor'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="form-group col-md-3 {{ $errors->has('tamanho') ? 'has-error' : '' }}">
                        <label for="tamanho">Tamaho da propriedade</label>
                        <input type="text" class="form-control input-lg " value="{{$propriedade->tamanho}}" id="tamanho" name="tamanho" placeholder="Insira o tamanho">
                        @if ($errors->has('tamanho'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 {{ $errors->has('percuso_manobra') ? 'has-error' : '' }}">
                        <label for="percuso_manobra">Percuso e manobra</label>
                        <select class="form-control input-lg " value="{{$propriedade->percuso_manobra}}" name="percuso_manobra" id="percurso_manobra">
                            <option value="1" {{ $propriedade->percurso_manobra == 1 ? 'selected' : '' }} >1</option>
                            <option value="2" {{ $propriedade->percurso_manobra == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $propriedade->percurso_manobra == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $propriedade->percurso_manobra == 4 ? 'selected' : '' }}>4</option>
                        </select>
                        <small class="text-muted form-text" id="percursoManobra" style="padding: 7px;">Tipo de percurso e manobra varia de 1 a 4</small>
                        @if ($errors->has('percuso_manobra'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 {{ $errors->has('relevo') ? 'has-error' : '' }}">
                        <label for="relevo">Relevo</label>
                        <select name="relevo" class="form-control input-lg " id="relevo">
                            <option	disabled selected>Selecione	o relevo</option>
                            <option	value="plano" {{ $propriedade->relevo == 'plano' ? 'selected' : '' }}>Plano</option>
                            <option	value="suave" {{ $propriedade->relevo == 'suave' ? 'selected' : '' }}>Suave ondulado</option>
                            <option value="ondulado" {{ $propriedade->relevo == 'ondulado' ? 'selected' : '' }}>Ondulado</option>
                            <option	value="forteOndulado" {{ $propriedade->relevo == 'forteOndulado' ? 'selected' : '' }}>Forte ondulado</option>
                            <option value="montanhoso" {{ $propriedade->relevo == 'montanhoso' ? 'selected' : '' }}>Montanhoso</option>
                            <option	value="escarpa" {{ $propriedade->relevo == 'escarpa' ? 'selected' : '' }}>Escarpa</option>
                        </select>
                        @if ($errors->has('relevo'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 {{ $errors->has('solo') ? 'has-error' : '' }}">
                        <label for="solo">Solo</label>
                        <select name="solo" class="form-control input-lg " id="solo">
                            <option	disabled selected>Selecione	o solo</option>
                            <option	value="arenoso" {{ $propriedade->solo == 'arenoso' ? 'selected' : '' }}>Arenoso</option>
                            <option	value="argiloso" {{ $propriedade->solo == 'argiloso' ? 'selected' : '' }}>Argiloso</option>
                            <option	value="arenoArg" {{ $propriedade->solo == 'arenoArg' ? 'selected' : '' }}>Areno Argiloso</option>
                            <option value="siltoso" {{ $propriedade->solo == 'siltoso' ? 'selected' : '' }}>Siltoso</option>
                            <option value="outro" {{ $propriedade->solo == 'outro' ? 'selected' : '' }}>Outro</option>
                        </select>
                        @if ($errors->has('solo'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-3 {{ $errors->has('declividade') ? 'has-error' : '' }}">
                        <label for="declividade">Declividade</label>
                        <select name="declividade" class="form-control input-lg " id="declividade">
                            <option	disabled selected>Selecione	a declividade</option>
                            <option	value="0-3" {{ $propriedade->declividade == '0-3' ? 'selected' : '' }}>0 - 3%</option>
                            <option	value="3-8" {{ $propriedade->declividade == '3-8' ? 'selected' : '' }}>3 - 8%</option>
                            <option value="8-13" {{ $propriedade->declividade == '8-13' ? 'selected' : '' }}>8 - 13%</option>
                            <option	value="13-20" {{ $propriedade->declividade == '13-20' ? 'selected' : '' }}>13 - 20%</option>
                            <option value="20-45" {{ $propriedade->declividade == '20-45' ? 'selected' : '' }}>20 - 45%</option>
                            <option	value="45-100" {{ $propriedade->declividade == '45-100' ? 'selected' : '' }}>45 - 100%</option>
                            <option	value=">100" {{ $propriedade->declividade == '>100' ? 'selected' : '' }}>Maior que 100%</option>
                        </select>
                        @if ($errors->has('declividade'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 {{ $errors->has('fertilidade') ? 'has-error' : '' }}">
                        <label for="fertilidade">Fertilidade</label>
                        <select name="fertilidade" class="form-control input-lg " id="fertilidade">
                            <option	disabled selected>Nível de fertilidade</option>
                            <option	value="baixa" {{ $propriedade->fertilidade == 'baixa' ? 'selected' : '' }}>Baixa</option>
                            <option	value="media" {{ $propriedade->fertilidade == 'media' ? 'selected' : '' }}>Média</option>
                            <option value="alta" {{ $propriedade->fertilidade == 'alta' ? 'selected' : '' }}>Alta</option>
                        </select>
                        @if ($errors->has('fertilidade'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                </div>
            </div> <!-- box-body -->

            <!-- Botoes -->
            <div class="box-footer">
                <a href=" {{ route('propriedades.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
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