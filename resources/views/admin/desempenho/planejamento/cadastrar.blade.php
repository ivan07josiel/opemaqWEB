@extends('adminlte::page')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    .select2-selection--multiple {
        min-height: 45px !important;
        text-align: center;
    }

    input[data-readonly] {
        pointer-events: none;
    }
    </style>
@endsection

@section('title', 'Cadastro Planejamento')

@section('content_header')
    <h1>Novo Planejamento</h1>

    <ol class="breadcrumb">
            <li><a href="/">
                <i class="fa fa-home"></i>            
                Inicio
            </a></li>
            <li><a href=" {{route('planejamento.index')}} ">Planejamentos</a></li>
            <li><a href="">Cadastrar</a></li>
        </ol>
@stop

@section('content')
    <div class="col-md-12 ">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3>Dados Cadastrais</h3>
            </div>
            <form id="formFunc" action=" {{route('planejamento.store')}} " method="POST" > 
                {{ csrf_field() }}   
                <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-4 {{ $errors->has('nome') ? 'has-error' : '' }}">
                                <label for="nome">Nome do Planejamento</label>
                                <input type="text" class="form-control input-lg " required id="nome" name="nome" placeholder="Nome">
                                @if ($errors->has('nome'))
                                    <span class="help-block invalid-feedback">
                                        {{ $errors->first() }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_operacao">Operação</label>
                                <select name="id_operacao" id="id_operacao" required class="form-control input-lg">
                                    @foreach ($operacoes as $operacao)
                                        <option value="{{$operacao->id}}"> {{$operacao->nome}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Conjuntos Mecanizados Cadastrados</label>
                                <select name="conjuntos[]" class="form-control select2" required multiple="" data-placeholder="Selecione o(s) conjunto(s)" style="width: 100%; height: 100%;">
                                    @foreach ($conjuntos as $conjunto)
                                        <option value="{{$conjunto->id}}">{{$conjunto->apelido}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <h4 class="form-group col-md-12">Estimativa de Tempo Disponível - TD (horas)</h4>

                            <div class="form-group col-md-2">
                                <label for="td">TD</label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-lg td" id="td" name="td" readonly>
                                    <div class="input-group-btn">
                                        <p class="btn ml-5">=</p>
                                    </div>
                                </div>
                                <small class="text-muted form-text" style="padding: 7px;">Tempo Disponível</small>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="nt">Nt</label>
                                <input type="number" class="form-control input-lg tdValidation" min="0" step="1" required id="nt" name="nt" placeholder="Dias">
                                <small class="text-muted form-text" style="padding: 7px;">N° dias de operações</small>                                
                            </div>
                            <div class="form-group col-md-2">
                                <label for="ndf">Ndf</label>
                                <input type="number" class="form-control input-lg tdValidation" min="0" step="1" required id="ndf" name="ndf" placeholder="Dias">
                                <small class="text-muted form-text" style="padding: 7px;">N° domingos e feriados</small>                                                                
                            </div>
                            <div class="form-group col-md-2">
                                <label for="nimp">Nimp</label>
                                <input type="number" class="form-control input-lg tdValidation " min="0" step="1" required id="nimp" name="nimp" placeholder="Dias">
                                <small class="text-muted form-text" style="padding: 7px;">Dias improprios para o trabalho</small>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="jt">Jt</label>
                                <input type="number" class="form-control input-lg tdValidation " min="0" step="1" required id="jt" name="jt" placeholder="Horas">
                                <small class="text-muted form-text" style="padding: 7px;">Jornada de trabalho</small>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="eg">Eg</label>
                                <input type="text" class="form-control input-lg tdValidation " min="0" step="1" required id="eg" name="eg" placeholder="Valor">
                                <small class="text-muted form-text" style="padding: 7px;">Eficiência gerencial</small>
                            </div>
                        </div>
                        
                        <div class="row">
                            <h4 class="form-group col-md-12">Estimativa do Ritmo Operacional - RO (ha/h)</h4>
                            <div class="form-group col-md-2">
                                <label for="ro">RO</label>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg ro" id="ro" name="ro" readonly>
                                    <div class="input-group-btn">
                                        <p class="btn ml-5">=</p>
                                    </div>
                                </div>
                                <small class="text-muted form-text" style="padding: 7px;">Ritmo Operacional</small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="at">At</label>
                                <input type="number" class="form-control input-lg roValidation" min="0" required id="at" name="at" placeholder="ha">
                                <small class="text-muted form-text" style="padding: 7px;">Área a ser trabalhada</small>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="td1">TD</label>
                                <input type="number" class="form-control input-lg td roValidation" disabled id="td1" name="td1">
                            </div>
                        </div>
                        
                        <div class="row">
                                <h4 class="form-group col-md-12">Capacidade de Campo Teórica - CcT (ha/h)</h4>
                                <div class="form-group col-md-2">
                                    <label for="cct">CcT</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg cct" id="cct" name="cct" readonly>
                                        <div class="input-group-btn">
                                            <p class="btn ml-5">=</p>
                                        </div>
                                    </div>
                                </div>                            
                            <div class="form-group col-md-2">
                                <label for="l">L</label>
                            <input type="number" class="form-control input-lg l cctValidation" required min="0" value="{{$largura}}" id="l" name="l" readonly>
                                <small class="text-muted form-text" style="padding: 7px;">Largura de trabalho</small>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="v">V(km/h)</label>
                                <input type="number" class="form-control input-lg cctValidation" required min="0" id="vcct" name="vcct" placeholder="km">
                                <small class="text-muted form-text" style="padding: 7px;">Velocidade (km/h)</small>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for="numpcct">N° Passadas</label>
                                <input type="number" class="form-control input-lg cctValidation" required min="0" step="1" id="numpcct" name="numpcct" placeholder="Valor">
                                <small class="text-muted form-text" style="padding: 7px;">Número de Passadas</small>
                            </div>
                        </div>
                        
                        <div class="row">
                                <h4 class="form-group col-md-12">Capacidade de Campo Efetiva - CcE (ha/h)</h4>
                                <div class="form-group col-md-2">
                                    <label for="cce">CcE</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg cce" id="cce" name="cce" readonly>
                                        <div class="input-group-btn">
                                            <p class="btn ml-5">=</p>
                                        </div>
                                    </div>
                                </div>                            
                            <div class="form-group col-md-2">
                                <label for="lcce">L</label>
                                <input type="number" class="form-control input-lg l" required min="0" value="{{$largura}}" id="lcce" name="lcce" disabled>
                                <small class="text-muted form-text" style="padding: 7px;">Largura de trabalho</small>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="vcce">V(km/h)</label>
                                <input type="number" class="form-control input-lg cceValidation" required min="0" id="vcce" name="vcce" placeholder="km">
                                <small class="text-muted form-text" style="padding: 7px;">Velocidade (km/h)</small>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for="numpcce">N° Passadas</label> 
                                <input type="number" class="form-control input-lg cceValidation" required min="0" step="1" id="numpcce" name="numpcce" placeholder="Valor">
                                <small class="text-muted form-text" style="padding: 7px;">Número de Passadas</small>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for="ec">Ec</label>
                                <input type="number" class="form-control input-lg cceValidation" required min="0" step="1" id="eccce" name="eccce" placeholder="Valor">
                                <small class="text-muted form-text" style="padding: 7px;">Eficiência de campo</small>
                            </div>
                        </div>

                        <div class="row">
                                <h4 class="form-group col-md-12">Tempo de Máquina ou Tempo total de campo</h4>
                                <div class="form-group col-md-2">
                                    <label for="tm">TM</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg tm" id="tm" name="tm" readonly>
                                        <div class="input-group-btn">
                                            <p class="btn ml-5">=</p>
                                        </div>
                                    </div>
                                </div>                            
                            <div class="form-group col-md-2">
                                <label for="tp">TP</label>
                                <input type="number" class="form-control input-lg tmValidation" required min="0" id="tp" name="tp">
                                <small class="text-muted form-text" style="padding: 7px;">Tempo de Produção</small>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="ti">TI</label>
                                <input type="number" class="form-control input-lg tmValidation" required min="0" id="ti" name="ti" placeholder="">
                                <small class="text-muted form-text" style="padding: 7px;">Tempo de Interrupção</small>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for="tpr">Tpr</label>
                                <input type="number" class="form-control input-lg tmValidation" required min="0" id="tpr" name="tpr" placeholder="">
                                <small class="text-muted form-text" style="padding: 7px;">Tempo de preparo</small>
                            </div>
                        </div>

                        <div class="row">
                                <h4 class="form-group col-md-12">Capacidade de Campo Operacional</h4>
                                <div class="form-group col-md-2">
                                    <label for="cco">CcO</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg cco" id="cco" name="cco" readonly>
                                        <div class="input-group-btn">
                                            <p class="btn ml-5">=</p>
                                        </div>
                                    </div>
                                </div>                            
                            <div class="form-group col-md-2">
                                <label for="atot">Atot</label>
                                <input type="number" class="form-control input-lg ccoValidation" required min="0" id="atot" name="atot">
                                <small class="text-muted form-text" style="padding: 7px;">Área total(ha)</small>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="tm2">TM</label>
                                <input type="number" class="form-control input-lg tm ccoValidation" id="tm2" name="tm2" disabled>
                                <small class="text-muted form-text" style="padding: 7px;">Tempo de Máquina</small>
                            </div>
                        </div>

                        <div class="row">
                                <h4 class="form-group col-md-12">Eficiência de Campo</h4>
                                <div class="form-group col-md-2">
                                    <label for="efc">Ec</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg" required id="efc" name="efc" data-readonly>
                                        <div class="input-group-btn">
                                            <p class="btn ml-5">=</p>
                                        </div>
                                    </div>
                                </div>                            
                            <div class="form-group col-md-2">
                                <label for="tpro">Tpro</label>
                                <input type="number" class="form-control input-lg efcValidation" required min="0" id="tpro" name="tpro" placeholder="horas">
                                <small class="text-muted form-text" style="padding: 7px;">Tempo Produtivo</small>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="timp">Timp</label>
                                <input type="number" class="form-control input-lg efcValidation" required min="0" id="timp" name="timp" placeholder="horas">
                                <small class="text-muted form-text" style="padding: 7px;">Tempo Improdutivo</small>
                            </div>
                            
                            <div class="form-group col-md-2" style="margin-top: 30px">
                                <button type="button" class="btn" id="btnec">Calcular</button>
                            </div>
                        </div>

                        <div class="row">
                                <h4 class="form-group col-md-12">Número de Conjuntos</h4>
                                <div class="form-group col-md-2">
                                    <label for="nc">Nc</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg" required id="nc" name="nc" data-readonly>
                                        <div class="input-group-btn">
                                            <p class="btn ml-5">=</p>
                                        </div>
                                    </div>
                                </div>                            
                            <div class="form-group col-md-2">
                                <label for="ro1">RO</label>
                                <input type="number" class="form-control input-lg ro nc" id="ro1" name="ro1" disabled>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="cco1">CcO</label>
                                <input type="number" class="form-control input-lg cco nc" id="cco1" name="cco1" placeholder="" disabled>
                            </div>
                            
                            <div class="form-group col-md-2" style="margin-top: 30px">
                                <button type="button" class="btn" id="btnnc">Calcular</button>
                            </div>
                        </div>
                        
                </div> <!-- box-body -->

                <!-- Botoes -->
                <div class="box-footer text-right">
                    <button type="submit" id="btn_cadastrar" class="btn btn-lg btn-primary">
                            <i class="fa fa-save"></i>          
                            &nbsp;Cadastrar
                    </button>    
                    <a href=" {{ route('planejamento.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
                        <i class="fa fa-undo"></i>          
                        &nbsp;Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/adminlte/vendor/js/scripts.js') }}"></script>
@endsection