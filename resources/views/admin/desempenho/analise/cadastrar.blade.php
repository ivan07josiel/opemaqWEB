@extends('adminlte::page')

@section('css')
    <style>
    .select2-selection--multiple {
        min-height: 45px !important;
        text-align: center;
    }
    </style>
@endsection

@section('title', 'Cadastro Operação')

@section('content_header')
    <h1>Nova Operação Agrícola</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href=" {{route('analise.index')}} ">Análise Operacional</a></li>
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
            <form id="formFunc" action=" {{route('analise.store')}} " method="POST" > 
                {{ csrf_field() }}   
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-4 {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Operação Agrícola*</label>
                            <input type="text" class="form-control input-lg " id="nome" name="nome" placeholder="Nome da Operação">
                            @if ($errors->has('nome'))
                                <span class="help-block invalid-feedback">
                                    {{ $errors->first() }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_propriedade">Propriedade</label>
                            <select name="id_propriedade" id="id_propriedade" class="form-control input-lg">
                                @foreach ($propriedades as $propriedade)
                                    <option value="{{$propriedade->id}}"> {{$propriedade->nome}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="data_inicio">Data de Início*</label>
                            <input type="date" class="form-control input-lg" id="data_inicio" name="data_inicio">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data_fim">Data de Término*</label>
                            <input type="date" class="form-control input-lg" id="data_fim" name="data_fim">
                        </div>
                    </div>
                </div> <!-- box-body -->

                <!-- Botoes -->
                <div class="box-footer text-right">
                    <button type="submit" id="btn_cadastrar" class="btn btn-lg btn-primary">
                            <i class="fa fa-save"></i>          
                            &nbsp;Cadastrar
                    </button>    
                    <a href=" {{ route('analise.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
                        <i class="fa fa-undo"></i>          
                        &nbsp;Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection