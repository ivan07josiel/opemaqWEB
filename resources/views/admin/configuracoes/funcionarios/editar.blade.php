@extends('adminlte::page')

@section('title', 'Editar Funcionário')

@section('content_header')
    <h1>Editar Funcionário</h1>
@stop


@section('content')
<div class="col-md-12 ">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3>Dados do Funcionário</h3>
        </div>
        <form id="formFunc" action=" {{route('funcionarios.update')}} " method="POST" > 
            {{ csrf_field() }}   
            <input type="hidden" name="id" value="{{$funcionario->id}}">
            <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-6 {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome Completo*</label>
                            <input type="text" class="form-control input-lg " value="{{$funcionario->nome}}" id="nome" name="nome" placeholder="Nome do funcionário">
                            @if ($errors->has('nome'))
                                <span class="help-block invalid-feedback">
                                    {{ $errors->first() }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="dataAdmissao">Data de admissão*</label>
                            <input type="date" class="form-control input-lg" value="{{$funcionario->data_admissao}}" id="dataAdmissao" name="data_admissao">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="dataNascimento">Data de nascimento*</label>
                            <input type="date" class="form-control input-lg" value="{{$funcionario->data_nascimento}}" id="dataNascimento" name="data_nascimento">
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <div class="form-group col-md-3">
                            <label for="fgts">FGTS</label>
                            <input type="text" class="form-control input-lg" value="{{$funcionario->fgts}}" id="fgts" name="fgts" placeholder="Insira o FGTS">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="insalubridade">Insalubridade</label>
                            <input type="text" class="form-control input-lg" value="{{$funcionario->insalubridade}}" id="insalubridade" name="insalubridade" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="periculosidade">Periculosidade</label>
                            <input type="text" class="form-control input-lg" value="{{$funcionario->periculosidade}}" id="periculosidade" name="periculosidade" placeholder="Nível de periculosidade">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inss">INSS</label>
                            <input type="text" class="form-control input-lg" value="{{$funcionario->inss}}" id="inss" name="inss" placeholder="Digite o número de INSS">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="agua">Água</label>
                            <input type="text" class="form-control input-lg" value="{{$funcionario->agua}}" id="agua" name="agua" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="luz">Luz</label>
                            <input type="text" class="form-control input-lg" value="{{$funcionario->luz}}" id="luz" name="luz" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="aluguel">Aluguel</label>
                            <input type="text" class="form-control input-lg" value="{{$funcionario->aluguel}}" id="aluguel" name="aluguel" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="encargos">Encargos</label>
                            <input type="text" class="form-control input-lg" value="{{$funcionario->encargos}}" id="encargos" name="encargos" placeholder="Digite o valor">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="funcao">Função</label>
                            <select name="funcao" class="form-control input-lg">
                                @foreach ($funcoes as $funcao)
                                    <option value="{{$funcao->id}}" {{$funcao->id == $funcionario->funcao ? 'selected' : ''}} > {{$funcao->nome}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="encargos">Salário</label>
                            <input type="number" class="form-control input-lg" value="{{$funcionario->salario}}" id="salario" name="salario" placeholder="Digite o valor">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="experiencia">Experiência</label>
                            <textarea type="text" id="experiencia" name="experiencia" class="md-textarea form-control input-lg" rows="3">{{$funcionario->experiencia}}</textarea>
                        </div>
                    </div>
            </div> <!-- box-body -->

            <!-- Botoes -->
            <div class="box-footer">
                <a href=" {{ route('funcionarios.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
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