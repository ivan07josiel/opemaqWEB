@extends('adminlte::page')

@section('title', 'Cadastro Funcionário')

@section('content_header')
    <h1>Novo Funcionário</h1>

    <ol class="breadcrumb">
            <li><a href="/">
                <i class="fa fa-home"></i>            
                Inicio
            </a></li>
            <li><a href=" {{route('funcionarios.index')}} ">Funcionários</a></li>
            <li><a href="">Cadastrar</a></li>
        </ol>
@stop

@section('content')
    <div class="col-md-12 ">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3>Dados Cadastrais</h3>
            </div>
            <form id="formFunc" action=" {{route('funcionarios.store')}} " method="POST" > 
                {{ csrf_field() }}   
                <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('nome') ? 'has-error' : '' }}">
                                <label for="nome">Nome Completo*</label>
                                <input type="text" class="form-control input-lg " id="nome" name="nome" placeholder="Nome do funcionário">
                                @if ($errors->has('nome'))
                                    <span class="help-block invalid-feedback">
                                        {{ $errors->first() }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dataAdmissao">Data de admissão*</label>
                                <input type="date" class="form-control input-lg" id="dataAdmissao" name="data_admissao">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dataNascimento">Data de nascimento*</label>
                                <input type="date" class="form-control input-lg" id="dataNascimento" name="data_nascimento">
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="form-group col-md-3">
                                <label for="fgts">FGTS</label>
                                <input type="text" class="form-control input-lg" id="fgts" name="fgts" placeholder="Insira o FGTS">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="insalubridade">Insalubridade</label>
                                <input type="text" class="form-control input-lg" id="insalubridade" name="insalubridade" placeholder="Digite o valor">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="periculosidade">Periculosidade</label>
                                <input type="text" class="form-control input-lg" id="periculosidade" name="periculosidade" placeholder="Nível de periculosidade">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inss">INSS</label>
                                <input type="text" class="form-control input-lg" id="inss" name="inss" placeholder="Digite o número de INSS">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="agua">Água</label>
                                <input type="number" class="form-control input-lg" id="agua" name="agua" placeholder="Digite o valor">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="luz">Luz</label>
                                <input type="number" class="form-control input-lg" id="luz" name="luz" placeholder="Digite o valor">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="aluguel">Aluguel</label>
                                <input type="number" class="form-control input-lg" id="aluguel" name="aluguel" placeholder="Digite o valor">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="encargos">Encargos</label>
                                <input type="number" class="form-control input-lg" id="encargos" name="encargos" placeholder="Digite o valor">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="funcao">
                                    Função&nbsp;<a title="Gerenciar Funções" href='{{ route('funcoes.index') }}' class="btn btn-xs btn-primary btn-action">
                                            <i class="fa fa-pencil fa-xs"></i>                 
                                        </a>
                                </label>
                                <select name="funcao" class="form-control input-lg">
                                    @foreach ($funcoes as $funcao)
                                        <option value=" {{$funcao->id}} "> {{$funcao->nome}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="encargos">Salário</label>
                                <input type="number" class="form-control input-lg" id="salario" name="salario" placeholder="Digite o valor">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="experiencia">Experiência</label>
                                <textarea type="text" id="experiencia" name="experiencia" class="md-textarea form-control input-lg" rows="3"></textarea>
                            </div>
                        </div>
                </div> <!-- box-body -->

                <!-- Botoes -->
                <div class="box-footer text-right">
                    <button type="submit" id="btn_cadastrar" class="btn btn-lg btn-primary">
                            <i class="fa fa-save"></i>          
                            &nbsp;Cadastrar
                    </button>    
                    <a href=" {{ route('funcionarios.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
                        <i class="fa fa-undo"></i>          
                        &nbsp;Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop